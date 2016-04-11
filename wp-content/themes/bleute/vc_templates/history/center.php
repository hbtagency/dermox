<?php 
$text_title_element_color = 'style="color:'.$title_element_color.'"';
$text_title_color = 'style="color:'.$title_color.'"';
$text_subitle_color = 'style="color:'.$subitle_color.'"';
$text_content_color = 'style="color:'.$content_color.'"';
?>
<section class="history center">
  <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="history-title">
              <div class="title-element" <?php print($text_title_element_color) ?>><?php print($section_title_box); ?></div>
              <div class="shop-name" <?php print($text_title_color) ?>><?php print($title_box); ?></div>
              <div class="description" <?php print($text_subitle_color) ?>><?php print($subtile_box); ?></div>
            </div>
            <div class="history-content">
              <div class="content-small" <?php print($text_content_color) ?>><?php print($content); ?></div>
            </div>
        </div>
    </div>
</section>