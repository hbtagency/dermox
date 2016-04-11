<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <!--[if lt IE 9]>
        <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/asset/js/html5.js"></script>
    <![endif]-->
    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
<?php wp_head();?>
</head>
<body <?php body_class(); ?>>
<div id="bleute-mobile-menu">
    <button>
        <i></i>
        <i></i>
        <i></i>
    </button>
    <?php wp_nav_menu( array( // show menu mobile
            'theme_location' => 'mobile-menu',
            'container' => 'nav',
            'container_class' => 'mobile-menu'
     ) ); ?>
</div>
<?php
if (!is_404()) {
    $header_setting = '';
    $header_page_setting = get_post_meta( get_the_ID(), '_beautheme_custom_header', TRUE );

    if (bleute_GetOption('header-type')!= NULL) {
        $header_setting =  bleute_GetOption('header-type');
    }
    if ($header_page_setting) {
        $header_setting = $header_page_setting;
    }
    if (!$header_setting) {
        $header_setting = 'none-slide';
    }
    if(is_search() == 'true'){
        $header_setting = 'none-slide';
    }   
    get_template_part('templates/header', $header_setting);

?>
<?php }?>
<div id="mySearch" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <button type="button" class="btn btn-default" data-dismiss="modal"><?php esc_html_e('Close','bleute')?></button>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <form action="<?php echo esc_url(home_url( '/' ));?>" method="get" class="book-search-head">
            <i class="icon-search"></i>
            <input type="text" name="s" value="" placeholder="<?php esc_html_e('What are you looking for?', 'bleute'); ?>">
            <input type="hidden" name="post_type" />
        </form>
      </div>
    </div>
  </div>
</div>