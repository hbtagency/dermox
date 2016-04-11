<header class="tranfarent blue">
    <div class="menu-main">
      <div class="menu-top">
        <div class="container">
          <div class="shipping">
            <?php 
              if (bleute_GetOption('title-free-ship')!= NULL) {
                  print(bleute_GetOption('title-free-ship'));
              }
            ?>
            <span>
              <?php 
                if (bleute_GetOption('text-free-ship')!= NULL) {
                  print(bleute_GetOption('text-free-ship'));
                }
              ?>
            </span>
          </div>
          <div class="menu-login">
            <?php
              include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
              if ( is_plugin_active( 'beautheme-bleute/beautheme_init.php' ) ) {
                wp_nav_menu(array(
                    'menu'          => 'small-menu',
                    'menu_class'    => 'small-nav hidden-xs',
                    'menu_id'       => 'small-navigation',
                    'container'     => '',
                ));
              }
            ?>
            <div class="cart">
              <?php
                  if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
              ?>
                <a href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>"><span>( <?php  printf(__('%s','bleute' ), WC()->cart->cart_contents_count); ?> ) <?php esc_html_e('Item (s)', 'bleute'); ?></span></a>
              <?php } ?>
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
                    $store_logo = bleute_GetOption('bleute-logo')['url'];
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
</header> 