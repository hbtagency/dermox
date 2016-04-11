<?php
$section_title_box = $title_hotline = $number_hotline = $subtitle_hotline = $title_hours = $text_hours = $text_saturday = $hours_saturday = $text_sunday = $hours_sunday = $text_url = $url = $section_title_color = $title_hotline_color = $number_hotline_color = $subtile_hotline_color = $title_hours_color = $text_hours_color = $text_saturday_color = $hours_saturday_color =  $hours_sunday_color = $bg_button_color = $text_button_color = '';
extract(shortcode_atts(array(
    'section_title_box' => '',
    'title_hotline' => '',
    'number_hotline' => '',
    'subtitle_hotline' => '',
    'title_hours' => '',
    'text_hours' =>'',
    'text_saturday' => '',
    'hours_saturday' => '',
    'text_sunday' => '',
    'hours_sunday' => '',
    'text_url' => '',
    'url' => '',
    'section_title_color' => '',
    'title_hotline_color' => '',
    'number_hotline_color' => '',
    'subtile_hotline_color' => '',
    'title_hours_color' => '',
    'text_hours_color' => '',
    'text_saturday_color' => '',
    'hours_saturday_color' => '',
    'hours_sunday_color' => '',
    'bg_button_color' => '',
    'text_button_color' => ''
), $atts));
$text_title_color = '';
$text_title_hotline_color = '';
$text_number_hotline_color = '';
$text_subtile_hotline_color = '';
$text_title_hours_color = '';
$text_hours_color = '';
$text_saturday_color = '';
$text_hours_saturday_color = '';
$text_hours_sunday_color = '';
$text_button_color = '';
$bg_button_color = '';

if ($section_title_color != '') {
$text_title_color = 'style="color:'.$section_title_color.'"';
}
if ($title_hotline_color != '') {
$text_title_hotline_color = 'style="color:'.$title_hotline_color.'"';
}
if ($number_hotline_color != '') {
$text_number_hotline_color = 'style="color:'.$number_hotline_color.'"';
}
if ($subtile_hotline_color != '') {
$text_subtile_hotline_color = 'style="color:'.$subtile_hotline_color.'"';
}
if ($title_hours_color != '') {
$text_title_hours_color = 'style="color:'.$title_hours_color.'"';
}
if ($text_hours_color != '') {
$text_hours_color = 'style="color:'.$text_hours_color.'"';
}
if ($text_saturday_color != '') {
$text_saturday_color = 'style="color:'.$text_saturday_color.'"';
}
if ($hours_saturday_color != '') {
$text_hours_saturday_color = 'style="color:'.$hours_saturday_color.'"';
}
if ($hours_sunday_color != '') {
$text_hours_sunday_color = 'style="color:'.$hours_sunday_color.'"';
}
if ($text_button_color != '') {
$text_button_color = 'color:'.$text_button_color.'"';
}
if ($bg_button_color != '') {
$bg_button_color = 'style="background:'.$bg_button_color.';'.$text_button_color.'"';
}

?>
<div class="open-time wow bounceInRight" data-wow-duration="1s" data-wow-delay="0.3s">
  <div class="title" <?php print($text_title_color) ?>><?php print($section_title_box); ?></div>
  <div class="content">
    <div class="hotline" <?php print($text_title_hotline_color) ?>><?php print($title_hotline); ?> <span class="phone" <?php print($text_number_hotline_color) ?>><?php print($number_hotline); ?></span><span class="sub-text" <?php print($text_subtile_hotline_color) ?>><?php print($subtitle_hotline); ?></span></div>
    <div class="hours" <?php print($text_title_hours_color) ?>><?php print($title_hours); ?><span class="time" <?php print($text_hours_color) ?>><?php print($text_hours); ?></span></div>
    <div class="sat-sun" <?php print($text_saturday_color) ?>><?php print($text_saturday); ?> <span <?php print($text_hours_saturday_color) ?>><?php print($hours_saturday); ?></span><?php print($text_sunday); ?><span <?php print($text_hours_sunday_color) ?>><?php print($hours_sunday); ?></span></div>
  </div>
  <a href="<?php print($url); ?>" class="button" <?php print($bg_button_color) ?>><?php print($text_url); ?></a>
</div>