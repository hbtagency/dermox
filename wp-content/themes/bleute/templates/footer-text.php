<div class="to-bottom bottom">
  <div class="title-back-to-top"><?php esc_html_e('back to top', 'bleute'); ?></div>
  <a href="#" class="bt-top"><i class="fa fa-angle-up"></i></a>
</div>
<div class="container">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="footer footer-left">
      <?php 
        if (bleute_GetOption('text-call-us')!= NULL) {
            print(bleute_GetOption('text-call-us'));
        }
      ?>
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="footer footer-right">
      <?php 
        if (bleute_GetOption('text-copyright')!= NULL) {
            print(bleute_GetOption('text-copyright'));
        }
      ?>
    </div>
  </div>
</div>