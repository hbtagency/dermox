<?php 
$text_title_element_color = 'style="color:'.$title_element_color.'"';
$text_description_color = 'style="color:'.$description_color.'"';
$text_text_links_color = 'style="color:'.$text_links_color.'"';
$text_content_color = 'style="color:'.$content_color.'"';
?>
<div class="history half wow bounceInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
  <div class="width-history">
    <div class="history-title">
      <div class="title-element" <?php print($text_title_element_color) ?>><?php print($section_title_box); ?></div>
    </div>
    <div class="history-content">
      <div class="content-bold" <?php print($text_description_color) ?>><?php print($description); ?></div>
      <div class="content-small" <?php print($text_text_links_color) ?>><?php print($content); ?></div>
      <a href="<?php print($url); ?>" <?php print($text_content_color) ?>><?php print($text_link); ?></a>
    </div>
  </div>
</div>