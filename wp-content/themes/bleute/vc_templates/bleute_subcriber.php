<?php
$subtile_box = $subcribe_title = $subcribe_description = $button_color = $text_button = $placehold_button = $title_color = $description_color = '';
extract(shortcode_atts(array(
    'subtile_box' => '',
    'subcribe_title' => '',
    'subcribe_description' => '',
    'button_color' => '',
    'text_button' => '',
    'placehold_button' => '',
    'title_color' => '',
    'description_color' => ''
), $atts));

$text_button_color = 'style="background:'.$button_color.'"';
$text_title_color = 'style="color:'.$title_color.'"';
$text_description_color = 'style="color:'.$description_color.'"';

?>

<section id="beautheme-subcribe">
  <div class="container">
    <div class="form-subcribe">
      <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <div class="subcribe-form-view">
          <div class="title-subcribe" <?php print($text_title_color) ?>>
            <?php print($content); ?>
          </div>
          <div class="description" <?php print($text_description_color) ?>>
            <?php print($subtile_box); ?>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="book-form form-subcribe-view book-subcribe-form">
          <form action="#" id="beau-subcribe">
            <i class="mail-subcribe"></i>
            <input type="text" name="email" id="email" value="" placeholder="<?php print($placehold_button); ?>" class="txt-subcrible-text" >
            <input type="submit" name="book-btn-subcribe" value="<?php print($text_button); ?>" class="book-button book-button-active" <?php print($text_button_color) ?>>
          </form>
          <div class="subcribe-message-title">
            <span class="subcribe-title"><?php print($subcribe_title)?></span>
            <span class="subcribe-message"><?php print($subcribe_description)?></span>
          </div><!--Subcribe message-->
        </div>
      </div>
    </div>
  </div>
</section>