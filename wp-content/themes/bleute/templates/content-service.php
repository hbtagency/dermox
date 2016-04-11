<?php while ( have_posts() ) : the_post();?>
<?php 
  $post_id = get_the_ID();
  $post = get_queried_object();
  $postType = get_post_type_object(get_post_type($post));
  $category_name = $postType->labels->singular_name;
?>
<section class="menu-breadcrumb">
    <div class="container">
      <div class="breadcrumb">
        <ul>
          <?php if (function_exists('beau_the_breadcrumb')) beau_the_breadcrumb(); ?>
        </ul>
      </div>
    </div>
</section>
<?php 
    $page_id = get_the_ID();
    $description_post = get_field('descripiton_post',$post_id); 

    $experts_avatar = get_post_meta( get_the_ID(),'_beautheme_service_img_details', TRUE);
    $expertsAvatar_ID  = beau_get_attachment_id_from_url($experts_avatar);
    $experts_avatar    = wp_get_attachment_image( $expertsAvatar_ID,'bleute-service-detail');

    $description_service = get_post_meta( get_the_ID(),'_beautheme_service_description', TRUE);
    $link_book = get_post_meta( get_the_ID(),'_beautheme_service_url', TRUE);
  ?>
<section>
    <div class="container">
      <div class="content">
        <div class="title"><?php print($category_name); ?></div>
        <div class="description"><?php print($description_post); ?></div>
      </div>
    </div>
  </section>
  
  <section>
    <div class="row">
      <div class="banner-details-service">
        <div class="img-banner">
          <?php if ($experts_avatar) {
            print($experts_avatar );
          }
          else{
            echo '<img src="http://placehold.it/1920x600" alt="No service feature images">';
          }
          ?>

        </div>
        <div class="content-banner-service">
          <div class="title-service"><?php the_title(); ?></div>
          <?php 
            if (isset($description_service)) {
          ?>
          <div class="description-service"><?php print($description_service); ?></div>
          <?php } ?>
          <?php 
            if ($link_book !='') {
          ?>
          <a href="<?php print($link_book); ?>" class="button"><?php esc_html_e('Book now','bleute'); ?></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <?php 
    $description_service_content  = get_field('field_content_description',$post_id); 
    $title_left  = get_field('field_title_content_left',$post_id);
    $content_left  = get_field('field_content_left',$post_id);
    $title_right  = get_field('field_title_content_right',$post_id);
    $content_right  = get_field('field_content_right',$post_id);

    $image_left  = get_field('field_image_left',$post_id);
    $experts_img_left  = beau_get_attachment_id_from_url($image_left);
    $experts_left = wp_get_attachment_image( $experts_img_left,'full');

    $image_right  = get_field('field_image_right',$post_id);
    $experts_img_right  = beau_get_attachment_id_from_url($image_right);
    $experts_right = wp_get_attachment_image( $experts_img_right,'full');
  ?>
  <section class="row-details-service">
    <div class="container">
      <div class="row content-details-service">
        <?php 
            if ($description_service_content !='') {
        ?>
        <div class="row content-top">
          <div class="wow bounceInUp col-lg-6 col-md-6 col-sm-6 col-xs-12" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="title"><?php esc_html_e('description','bleute'); ?> </br> <?php the_title(); ?> </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="content">
              <?php print($description_service_content); ?>
            </div>
          </div>
        </div>
        <?php } ?>
        <div class="expert">
          <div class="wow bounceInUp col-lg-6 col-md-6 col-sm-6 col-xs-12" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="expert-content">
              <div class="img-expert"><?php print($experts_left); ?></div>
              <div class="title"><?php print($title_left); ?></div>
              <div class="content">
                <?php print($content_left); ?>
              </div>
            </div>
          </div>
          <div class="wow bounceInUp col-lg-6 col-md-6 col-sm-6 col-xs-12" data-wow-duration="1s" data-wow-delay="0.5s">
            <div class="expert-content">
              <div class="img-expert"><?php print($experts_right); ?></div>
              <div class="title"><?php print($title_right); ?></div>
              <div class="content">
                <?php print($content_right); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php 
    $menuList  = get_field('field_select_menu');
    if (!empty($menuList)) {
  ?>
  <section class="row-details-service">
    <div class="container">
      <div class="row">
          <div class="menu-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="block-menu none">
              <div class="title big"><?php esc_html_e('all service','bleute'); ?></div>
            </div>
          </div>
        </div>
        <div class="row">
          <?php 
            foreach( $menuList as $list_menu ):
                   $id_menu = $list_menu->ID;
          ?>
            <div class="menu-padding wow bounceInUp col-lg-6 col-md-6 col-sm-6 col-xs-12" data-wow-duration="1s" data-wow-delay="0.5s">
              <div class="block-menu">
                <div class="title"><?php echo get_the_title($id_menu); ?></div>
                <div class="content-menu">
                  <table class="table">
                    <tbody>
                      <div class="swiper-wrapper">
                        <?php 
                          $menu_List  = get_field('field_menu_service', $id_menu);
                          $count = count($menu_List);
                          for ($i=0; $i < $count; $i++) { 
                          $item = $menu_List[$i];
                          $name_service = $item['name_of_service'];
                          $times_service = $item['time_of_service'];
                          $price_service = $item['price_of_service'];
                          ?>
                          <tr>
                            <td class="name-option" style="color:<?php print($text_color); ?>;" ><?php print($name_service); ?></td>
                            <td class="time-option" style="color:<?php print($text_color); ?>;" ><?php print($times_service); ?></td>
                            <td class="price-option" style="color:<?php print($text_color); ?>;" ><?php print($price_service); ?></td>
                          </tr>
                          <?php 
                          }
                        ?>
                      </div>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
    </div>
  </section>
  <?php } ?>
  <?php 
    $gallery_List  = get_field('field_gallery');
    $count_gallery = count($gallery_List);
    if ($count_gallery>0) {
  ?>
  <section>
    <div class="container gallery-details-service">
      <div class="title"><?php esc_html_e('gallery','bleute'); ?></div>
      <div class="img-gallery">
        <?php 
          foreach( $gallery_List as $gallery ):
          $gallery_url = $gallery['images']['url'];
          $img_link  = beau_get_attachment_id_from_url($gallery_url);
          $img_gallery = wp_get_attachment_image( $img_link,'full');
        ?>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="img">
              <?php print($img_gallery); ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <?php } ?>
<?php endwhile;?>