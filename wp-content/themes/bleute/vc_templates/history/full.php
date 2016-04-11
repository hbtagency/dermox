<?php 
$text_title_element_color = 'style="color:'.$title_element_color.'"';
$text_title_color = 'style="color:'.$title_color.'"';
$text_subitle_color = 'style="color:'.$subitle_color.'"';
$text_description_color = 'style="color:'.$description_color.'"';
$text_text_links_color = 'style="color:'.$text_links_color.'"';
$text_content_color = 'style="color:'.$content_color.'"';
?>
<section class="history full-width">
    <div class="container">
          <div class="wow bounceInLeft col-lg-4 col-md-4 col-sm-4 col-xs-12" data-wow-duration="1s" data-wow-delay="0.3s">
              <div class="history-title">
                <div class="title-element" <?php print($text_title_element_color) ?>><?php print($section_title_box); ?></div>
                <div class="shop-name" <?php print($text_title_color) ?>><?php print($title_box); ?></div>
                <div class="description" <?php print($text_subitle_color) ?>><?php print($subtile_box); ?></div>
              </div>
          </div>
          <div class="wow bounceInUp col-lg-4 col-md-4 col-sm-4 col-xs-12" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="history-image">
                <img src="<?php print($bg_img); ?>" alt="history">
              </div>
          </div>
          <div class="wow bounceInRight col-lg-4 col-md-4 col-sm-4 col-xs-12" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="history-content">
                <div class="content-bold"  <?php print($text_description_color) ?>><?php print($description); ?></div>
                <div class="content-small" <?php print($text_content_color) ?>><?php print($content); ?></div>
                <a href="<?php print($url); ?>" <?php print($text_text_links_color) ?>><?php print($text_link); ?></a>
              </div>
          </div>
      </div>
</section>