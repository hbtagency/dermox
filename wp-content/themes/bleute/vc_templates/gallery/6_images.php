<?php 
$text_title_color = 'style="color:'.$title_color.'"';
$text_description_color = 'style="color:'.$description_color.'"';
?>

<section>
  <div class="gallery-element full">
    <div class="row">
      <div class="title">
        <div class="title-element" <?php print($text_title_color) ?>><?php print($section_title_box); ?></div>
        <div class="description" <?php print($text_description_color) ?>><?php print($subtile_box); ?></div>
      </div>
      <div class="img-gallery">
        <div class="left">
          <div class="item-iso">
            <div class="gallery-img">
              <img src="<?php print($img_05); ?>" alt="gallery">
            </div>
          </div>

          <div class="item-iso">
            <div class="gallery-img">
              <img src="<?php print($img_06); ?>" alt="gallery">
            </div>
          </div>
        </div>

        <div class="item-iso item-iso-height">
          <div class="gallery-img">
            <img src="<?php print($img_07); ?>" alt="gallery">
            </div>
        </div>
        <div class="item-iso item-iso-width">
          <div class="gallery-img">
            <img src="<?php print($img_08); ?>" alt="gallery">
          </div>
        </div>
        <div class="item-iso item-iso-width">
          <div class="gallery-img">
            <img src="<?php print($img_09); ?>" alt="gallery">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>