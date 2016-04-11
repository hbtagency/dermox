<div class="" data-wow-duration="1s" data-wow-delay="0.3s">
    <div class="banner-full-small right">
      <?php if ($bg_img != '') { ?>
        <div class="img-banner">
            <img src="<?php print($bg_img); ?>" alt="banner-details-products">
        </div>
      <?php } ?>
      <div class="content-banner">
        <h2>
          <?php if ($banner_title != '') { ?>
               <span><?php print($banner_title); ?></span>
          <?php } ?>
        </h2>
        <h4>
          <?php print($content); ?>
        </h4>
      </div>
    </div>
  </div>