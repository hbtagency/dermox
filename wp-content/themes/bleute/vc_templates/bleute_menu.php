<?php
$option = $section_title_box = $id_menu = $text_color = $title_color ='';
extract(shortcode_atts(array(
    'option' => '',
    'section_title_box' => '',
    'id_menu' => '',
    'text_color' => '',
    'title_color' => ''
), $atts));
$style_setting = '';
$none = '';
if ($option == 'Style title Big' || $option == '') {
  $style_setting = 'big';
}
if ($option == 'Only title') {
  $none = 'none';
  $style_setting = 'big';
}

$text_title_color = 'style="color:'.$title_color.'"';
$text_color_text = 'style="color:'.$text_color.'"';
?>
<div class="wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
    <div class="block-menu <?php print($none); ?>">
      <div class="title <?php print($style_setting); ?>" <?php print($text_title_color) ?> ><?php print($section_title_box); ?></div>
      <div class="content-menu">
        <table class="table">
          <tbody>
            <div class="swiper-wrapper">
                <?php 
                  $menuList  = get_field('field_menu_service', $id_menu);
                  $count = count($menuList);
                  for ($i=0; $i < $count; $i++) { 
                  $item = $menuList[$i];
                  $name_service = $item['name_of_service'];
                  $times_service = $item['time_of_service'];
                  $price_service = $item['price_of_service'];
                  ?>
                  <tr>
                    <td class="name-option" <?php print($text_color_text)?> ><?php print($name_service); ?></td>
                    <td class="time-option" <?php print($text_color_text)?> ><?php print($times_service); ?></td>
                    <td class="price-option" <?php print($text_color_text)?> ><?php print($price_service); ?></td>
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