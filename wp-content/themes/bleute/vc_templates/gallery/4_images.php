<?php 
$text_title_color = 'style="color:'.$title_color.'"';
$text_description_color = 'style="color:'.$description_color.'"';
?>
<section>
  <div class="gallery-element">
    <div class="row">
        <div class="content-left">
          <div class="img-gallery">
            <div class="item-iso content-title">
              <div class="title">
                <div class="title-element" <?php print($text_title_color) ?>><?php print($section_title_box); ?></div>
                <div class="description" <?php print($text_description_color) ?>><?php print($subtile_box); ?></div>
              </div>
              <div class="gallery-img big">
                <img src="<?php print($img_01); ?>" alt="gallery">
              </div>
            </div>
            <div class="item-iso content-top">
              <div class="gallery-img">
                <img src="<?php print($img_02); ?>" alt="gallery">
              </div>
            </div>
            <div class="item-iso content-small">
              <div class="gallery-img">
                <img src="<?php print($img_03); ?>" alt="gallery">
              </div>
            </div>
            <div class="item-iso item-iso-v">
              <div class="gallery-img">
                <img src="<?php print($img_04); ?>" alt="gallery">
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</section>