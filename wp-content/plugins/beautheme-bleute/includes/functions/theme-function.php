<?php
//Remove comment field url email
if(!function_exists('remove_comment_fields')){
    function remove_comment_fields($fields) {
        unset($fields['url']);
        return $fields;
    }
    add_filter('comment_form_default_fields','remove_comment_fields');
}

//Function convert
function convertDate($date, $get){
    switch ($get) {
        case 'd':
            $date = substr($date,3,2);
            break;
        case 'D':
            $date = substr($date,3,2);
        case 'm':
            $date = substr($date,0,2);
           break;
        case 'M':
            $date = date('F', mktime(0, 0, 0, substr($date,0,2), 10));;
           break;
        case 'y':
            $date = substr($date,6,4);
           break;
        case 'Y':
            $date = substr($date,6,4);
           break;
    }
    return $date;
}

function getDateFormat($datecv, $format, $space="/"){
    $dateShow ="";
    $date  = conVertDate($datecv,'d');
    $month = conVertDate($datecv,'m');
    $year  = conVertDate($datecv,'Y');
    switch ($format) {
        case 'd/m/y':
            $dateShow = $date.$space.$month.$space.$year;
            break;
        case 'y/m/d':
            $dateShow = $year.$space.$month.$space.$date;
            break;
        case 'y/d/m':
            $dateShow = $year.$space.$date.$space.$month;
            break;
        case 'm/d/y':
            $dateShow = $month.$space.$date.$space.$year;
            break;
        default:
            $dateShow = $date.'/'.$month.'/'.$year;
            break;
    }
    return $dateShow;
}

function get_excerpt_by_id($post_id){
    $the_post = get_post($post_id); //Gets post ID
    $the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
    $excerpt_length = 35; //Sets excerpt length by word count
    $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
    $words = explode(' ', $the_excerpt, $excerpt_length + 1);

    if(count($words) > $excerpt_length) :
        array_pop($words);
        array_push($words, '...');
        $the_excerpt = implode(' ', $words);
    endif;

    $the_excerpt = '<p>' . $the_excerpt . '</p>';

    return $the_excerpt;
}


//Check extension
function findExtension ($filename)
{
    $filename = strtolower($filename) ;
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    // var_dump($ext);
    return $ext;
}

 //Return Attactment ID
 function beau_get_attachment_id_from_url( $attachment_url = '' ) {
    global $wpdb;
    $attachment_id = false;
    if ( '' == $attachment_url )
        return;
    $upload_dir_paths = wp_upload_dir();
    if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
        $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
        $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
        $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
    }
    return $attachment_id;
}


function beau_get_category_product(){
    $terms = get_terms('product_cat', array('hide_empty' => 0,'orderby' => 'date','order' => 'DESC'));
    $category_product['Select...'] = 'Select';
    $category_product['All'] = 'All';
    if (is_array($terms)) {
        foreach ($terms as $term) {
            $category_product[$term->name] = $term->name;
        }
    }
    return $category_product;
}

// breadcrumb
function beau_the_breadcrumb() {
    global $post;
    if (!is_home()) {
        echo '<li><a href="';
        echo home_url();
        echo '">';
        echo 'Home';
        echo '</a></li>';
        if (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = '<li class="active"><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li>';
                }
                printf('%s',$output);
                echo '<strong title="'.$title.'"> '.$title.'</strong>';
            } 
            else{
                $cat_name = get_the_category();
                if(get_the_title()!='')
                {
                  echo '<li class="category-detail active"> <a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></li>';
                }
                
            }
        }
        elseif (is_single()) {
            $post = get_queried_object();
            $postType = get_post_type_object(get_post_type($post));
            $postype_name = $postType->labels->singular_name;
            $title = get_the_title();
            $post_id = get_the_ID();
            $category_detail=get_the_category($post_id);
            $category_id = '';
            foreach($category_detail as $cd){
                $category_name = $cd->cat_name;
                $category_id = get_cat_ID($category_name);
            }
            $category_link = get_category_link( $category_id );
            if ($postype_name == 'Post') {
                echo '<li class="category-detail"> <a href="'.$category_link.'" title="'.$category_name.'">'.$category_name.'</a></li>';
                $postype_name = $title;
            }
            if ($postype_name == 'Service') {
                echo '<li class="category-detail"> <a href="'.get_permalink().'" title="'.$postype_name.'">'.$postype_name.'</a></li>';
                $postype_name = $title;
            }
            if ($postType && $postype_name != 'Post') {
                echo '<li class="category-detail active"> <a href="'.get_permalink().'" title="'.$postype_name.'">'.$postype_name.'</a></li>';
            }
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    
}

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    function woocommerce_quantity_input() {
        global $product;
        $defaults = array(
            'input_name'    => 'quantity',
            'input_value'   => '1',
            'max_value'     => apply_filters( 'woocommerce_quantity_input_max', '', $product ),
            'min_value'     => apply_filters( 'woocommerce_quantity_input_min', '', $product ),
            'step'      => apply_filters( 'woocommerce_quantity_input_step', '1', $product ),
            'style'     => apply_filters( 'woocommerce_quantity_style', 'float:left; margin-right:10px;', $product )
        );
        if ( ! empty( $defaults['min_value'] ) )
            $min = $defaults['min_value'];
        else $min = 1;
        if ( ! empty( $defaults['max_value'] ) )
            $max = $defaults['max_value'];
        else $max = 20;
        if ( ! empty( $defaults['step'] ) )
            $step = $defaults['step'];
        else $step = 1;
        $options = '';
        for ( $count = $min; $count <= $max; $count = $count+$step ) {
            $options .= '<option value="' . $count . '">' . $count . '</option>';
        }
        echo '<label>'.esc_html__('Quantity :','bleute').'</label><div class="select-style" style="' . $defaults['style'] . '"><select name="' . esc_attr( $defaults['input_name'] ) . '" title="' . _x( 'Qty', 'Product quantity input tooltip', 'bleute' ) . '" class="qty">' . $options . '</select></div>';
    }
}
 ?>