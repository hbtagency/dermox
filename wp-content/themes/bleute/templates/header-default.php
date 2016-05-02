<header class="header-default">
    <div class="menu-main">
      <div class="menu-top">
        <div class="container">
            <div class="top-menu-contact">
                <span itemprop="telephone">
                    <a href="tel:+1300337669">1300DERMOX | 1300 337 669</a>
                </span>
            </div>
          <div class="menu-login">
            <?php
              include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
              if ( is_plugin_active( 'beautheme-bleute/beautheme_init.php' ) ) {
                wp_nav_menu(array(
                    'menu'          => 'small-menu',
                    'menu_class'    => 'small-nav',
                    'menu_id'       => 'small-navigation',
                    'container'     => '',
                ));
              }
            ?>
              
              <div class="cart" style="margin-right:20px;">
                
                <a href="<?php echo get_permalink(929); ?>">Member Enquiries</a>

              <?php
                  //if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
              ?>
                <!--
                <a href="<?php //echo esc_url(WC()->cart->get_cart_url()); ?>"><?php //esc_html_e('My cart', 'bleute'); ?> <span>( <?php  //printf(__('%s','bleute' ), WC()->cart->cart_contents_count); ?> )</span></a>
                -->    
              <?php //} ?>
            </div>
              
            <div class="cart">
                
                <?php if(is_user_logged_in()): ?>
                    <a href="<?php echo wp_logout_url('$index.php'); ?>">Logout</a>
                <?php endif; ?>
                    

                <?php
                    //if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                ?>
                    
                <!--
                <a href="<?php //echo esc_url(WC()->cart->get_cart_url()); ?>"><?php //esc_html_e('My cart', 'bleute'); ?> <span>( <?php  //printf(__('%s','bleute' ), WC()->cart->cart_contents_count); ?> )</span></a>
                -->    
              <?php //} ?>
            </div>  
          </div>
        </div>
      </div>
      <div class="menu-bottom">
        <div class="container">
          <div class="spa-logo">
            <div class="img-logo">
              <?php
                if (bleute_GetOption('bleute-logo')!= NULL) {
                    $store_logo_img = bleute_GetOption('bleute-logo');
                    $store_logo = $store_logo_img['url'];
                }else{
                    $store_logo = get_template_directory_uri().'/asset/images/logo-blue.png';
                }

                if ($store_logo!='') {
              ?>
              <a href="<?php echo esc_url(home_url( '/' ));?>"><img src="<?php echo esc_url($store_logo);?>" alt="Logo"></a>
              <?php } ?>
            </div>
          </div>
          <div id="main-nav">
            <?php
              bleute_main_menu('main-menu');
            ?>
            <div class="search-header-right">
              <a href="#" data-toggle="modal" data-target="#mySearch"><i class="fa fa-search"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
      if (function_exists('is_woocommerce')) {
        if (!is_single() && is_page() && !is_woocommerce() && !is_cart()) {
    ?>
      <div class="slider-header">
        <?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>
        <?php 
          $slide_id = get_post_meta( get_the_ID(), '_beautheme_slide_custom', TRUE );
          if ($slide_id != '-1' || $slide_id !='') {
            if ( is_plugin_active( 'masterslider/masterslider.php' ) ) {
              echo do_shortcode( '[masterslider id="'.$slide_id.'"]' ); 
            }
          }
        ?>
      </div>

      <div class="to-bottom">
        <a href="#" class="bt-bottom"><i class="fa fa-angle-down"></i></a>
      </div>
    <?php } 
      }
    ?>
</header> 