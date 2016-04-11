<div style="visibility: visible; animation-duration: 1s; animation-delay: 0.5s; animation-name: bounceInUp;" class="banner-full left" data-wow-duration="1s" data-wow-delay="0.3s">
  <?php if ($bg_img != '') { ?>
    <div class="img-banner">
        <img src="<?php print($bg_img); ?>" alt="banner-details-products">
    </div>
  <?php } ?>
  
  <div class="content-banner">
    <div class="title">
        <?php if ($banner_title != '') { ?>
             <span><?php print($banner_title); ?></span>
        <?php } ?>
        <?php if ($banner_smalltitle != '') { ?>
            <div class="description"><?php print($banner_smalltitle); ?></div>
        <?php } ?>
    </div>
    <?php if ($banner_subtitle != '') { ?>
        <div class="subtitle"><?php print($banner_subtitle); ?></div>
    <?php } ?>
    <?php print($content); ?>
  </div>
</div>