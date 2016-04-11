<?php
function bleute_latest_tweets_render( $count, $rts= true, $ats= true, $pop = 0, $screen_name='' ){
    try {
        if( ! function_exists('twitter_api_get') ){
            if (file_exists(BEAU_PLUGIN_DIR.'/libs/wp-twitter-api/twitter-api.php')) {
                require_once (BEAU_PLUGIN_DIR.'/libs/wp-twitter-api/twitter-api.php');
            }
            twitter_api_load_textdomain();
        }
        // caching full data set, not just twitter api caching
        // caching is disabled by default in debug mode, but still filtered.
        $cachettl = (int) apply_filters('latest_tweets_cache_seconds', WP_DEBUG ? 0 : 300 );
        if( $cachettl ){
            $arguments = func_get_args();
            $cachekey = 'latest_tweets_'.implode('_', $arguments );
            if( ! function_exists('_twitter_api_cache_get') ){
                twitter_api_include('core');
            }
            if( $rendered = _twitter_api_cache_get($cachekey) ){
                return $rendered;
            }
        }
        // Check configuration before use
        if( ! twitter_api_configured() ){
            throw new Exception( __('Plugin not fully configured','beautheme') );
        }
        // Build API params for "statuses/user_timeline" // https://dev.twitter.com/docs/api/1.1/get/statuses/user_timeline
        $trim_user = false;
        $include_rts = ! empty($rts);
        $exclude_replies = empty($ats);
        $params = compact('exclude_replies','include_rts','trim_user','screen_name');
        // Stripping tweets means we may get less than $count tweets.
        // we'll keep going until we get the amount we need, but may as well get more each time.
        if( $exclude_replies || ! $include_rts || $pop ){
            $params['count'] = 100;
        }
        else {
            $params['count'] = max( $count, 2 );
        }
        // pull tweets until we either have enough, or there are no more
        $tweets = array();
        while( $batch = twitter_api_get('statuses/user_timeline', $params ) ){
            $max_id = null;
            foreach( $batch as $tweet ){
                if( isset($params['max_id']) && $tweet['id_str'] === $params['max_id'] ){
                    // previous max included in results, even though docs say it won't be
                    continue;
                }
                $max_id = $tweet['id_str'];
                if( ! $include_rts && preg_match('/^(?:RT|MT)[ :\-]*@/i', $tweet['text']) ){
                    // skipping manual RT
                    continue;
                }
                if( $pop > ( $tweet['retweet_count'] + $tweet['favorite_count'] ) ){
                    // skipping tweets not deemed popular enough
                    continue;
                }
                $tweets[] = $tweet;
            }
            if( isset($tweets[$count]) ){
                $tweets = array_slice( $tweets, 0, $count );
                break;
            }
            if( ! $max_id ){
                // infinite loop would occur if user had only tweeted once, ever.
                break;
            }
            $params['max_id'] = $max_id;
        }
        // Fix Wordpress's broken timezone implementation
        $os_timezone = date_default_timezone_get() or $os_timezone = 'UTC';
        $wp_timezone = get_option('timezone_string') or $wp_timezone = $os_timezone;
        if( $os_timezone !== $wp_timezone ){
            date_default_timezone_set( $wp_timezone );
        }
        // Let theme disable or override emoji rendering
        $emoji_callback = apply_filters('latest_tweets_emoji_callback', 'twitter_api_replace_emoji_callback' );
        // render each tweet as a block of html for the widget list items
        $rendered = array();
        foreach( $tweets as $tweet ){
            extract( $tweet );
            $handle = $user['screen_name'] or $handle = $screen_name;
            $link = esc_html( 'http://twitter.com/'.$handle.'/status/'.$id_str);
            // render nice datetime, unless theme overrides with filter
            $date = apply_filters( 'latest_tweets_render_date', $created_at );
            if( $date === $created_at ){
                function_exists('twitter_api_relative_date') or twitter_api_include('utils');
                $time = strtotime( $created_at );
                $date = esc_html( twitter_api_relative_date($time) );
                $date = '<time datetime="'.date_i18n( 'Y-m-d H:i:sO', $time ).'">'.$date.'</time>';
            }
            // handle original retweet text as RT may be truncated
            if( $include_rts && isset($retweeted_status) && preg_match('/^RT\s+@[a-z0-9_]{1,15}[\s:]+/i', $text, $prefix ) ){
                $text = $prefix[0].$retweeted_status['text'];
                unset($retweeted_status);
            }
            // render and linkify tweet, unless theme overrides with filter
            $html = apply_filters('latest_tweets_render_text', $text );
            if( $html === $text ){
                if( ! function_exists('twitter_api_html') ){
                    twitter_api_include('utils');
                }
                // htmlify tweet, using entities if we can
                if( isset($entities) && is_array($entities) ){
                    $html = twitter_api_html_with_entities( $text, $entities );
                    unset($entities);
                }
                else {
                    $html = twitter_api_html( $text );
                }
                // render emoji, unless filtered out
                if( $emoji_callback ){
                    $html = twitter_api_replace_emoji( $html, $emoji_callback );
                }
                // strip characters that will choke mysql cache.
                if( $cachettl && ! TWITTER_CACHE_APC ){
                    $html = twitter_api_strip_quadruple_bytes( $html );
                }
            }
            // piece together the whole tweet, allowing override
            $final = apply_filters('latest_tweets_render_tweet', $html, $date, $link, $tweet );
            if( $final === $html ){
                $final = '<p class="tweet-text message">'.$html.'</p><div class="clearfix"></div>'.
                         '<p class="tweet-details time-up">'.$date.'</p>';
            }
            $rendered[] = $final;
        }
        // cache rendered tweets
        if( $cachettl ){
            _twitter_api_cache_set( $cachekey, $rendered, $cachettl );
        }
        // put altered timezone back
        if( $os_timezone !== $wp_timezone ){
            date_default_timezone_set( $os_timezone );
        }
        return $rendered;
    }
    catch( Exception $Ex ){
        return array( '<p class="tweet-text"><strong>Error:</strong> '.esc_html($Ex->getMessage()).'</p>' );
    }
}

if( is_admin() ){
    if( ! function_exists('twitter_api_get') ){
        require_once BEAU_PLUGIN_DIR.'/libs/wp-twitter-api/twitter-api.php';
    }
    // extra visibility of API settings link
    function latest_tweets_plugin_row_meta( $links, $file ){
        if( false !== strpos($file,'/twitter-api.php') ){
            $links[] = '<a href="options-general.php?page=twitter-api-admin"><strong>'.esc_attr__('Connect to Twitter','beautheme').'</strong></a>';
        }
        return $links;
    }
    add_action('plugin_row_meta', 'latest_tweets_plugin_row_meta', 10, 2 );
}

?>