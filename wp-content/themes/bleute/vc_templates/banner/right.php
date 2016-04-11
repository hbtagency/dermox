<div class="banner-full-option right" data-wow-duration="1s" data-wow-delay="0.3s">
   <?php if ($bg_img != '') { ?>
    <div class="img-banner">
        <img src="<?php print($bg_img); ?>" alt="banner-details-products">
    </div>
  <?php } ?>
  <div class="content-banner">
    <div class="subtitle">
      <?php if ($banner_title != '') { ?>
             <span><?php print($banner_title); ?></span>
        <?php } ?>
    </div>
    <h4>
      <?php print($content); ?>
    </h4>
  </div>
</div>