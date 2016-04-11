<?php
/*
* Template Name: Template Contact
*/
get_header();
?>
  <section class="menu-breadcrumb">
        <div class="container">
          <div class="breadcrumb">
            <ul>
              <?php if (function_exists('beau_the_breadcrumb')) beau_the_breadcrumb(); ?>
            </ul>
          </div>
        </div>
    </section>
    <?php 
          $page_id = get_the_ID();
          $title_contact  = get_field('field_title_contact',$page_id); 
          $description_contact  = get_field('field_description_contact',$page_id); 
          $lat_of_map_contact  = get_field('field_lat_of_map_contact',$page_id); 
          $lng_of_map_contact  = get_field('field_lng_of_map_contact',$page_id); 
          $title_email  = get_field('title_email',$page_id); 
          $description_email  = get_field('description_email',$page_id); 
          $title_social  = get_field('title_social',$page_id); 
          $description_social  = get_field('description_social',$page_id); 
          $title_address  = get_field('title_address',$page_id); 
          $description_address  = get_field('description_address',$page_id); 
          $title_form_contact  = get_field('field_title_form_contact',$page_id); 
          $id_form_contact  = get_field('field_select_form_contact',$page_id); 
    ?>
    <section class="contact">
        <div class="container">
          <div class="contact-details wow bounceInLeft col-lg-5 col-md-5 col-sm-5 col-xs-12" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="title"><?php print($title_contact); ?></div>
            <div class="description"><?php print($description_contact); ?></div>
            <div class="details">
              <div class="text"><?php print($title_email); ?></div>
              <div class="text-info"><?php print($description_email); ?></div>
            </div>
            <div class="details">
              <div class="text"><?php print($title_social); ?></div>
              <div class="text-info"><?php print($description_social); ?></div>
            </div>
            <div class="details">
              <div class="text"><?php print($title_address); ?></div>
              <div class="text-info"><?php print($description_address); ?></div>
            </div>
            <ul class="social-list">
              <li><i class="fa fa-facebook"></i></li>
              <li><i class="fa fa-twitter"></i></li>
              <li><i class="fa fa-pinterest"></i></li>
              <li><i class="fa fa-google-plus"></i></li>
            </ul>
          </div>
          <div class="book-map-address wow bounceInRight col-md-7 col-sm-7 col-xs-12" data-wow-duration="1s" data-wow-delay="0.3s">
            <div id="book-map-contact"></div>
            <div class="form-contact">
              <div class="title">
                <?php print($title_form_contact); ?>
              </div>
              <?php 
                $args = array('post_type' => 'wpcf7_contact_form', 'p' => '$id_form_contact');
                $cf7Forms = get_posts( $args );
                if( $cf7Forms) {
                  $form_name = get_the_title($cf7Forms[0]->ID);
                }
              ?>
              <?php echo do_shortcode('[contact-form-7 id="'.$id_form_contact.'" title="'.$form_name.'"]'); ?>
            </div>
          </div>
        </div>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOeGmyX-gl-BqGDrCvYd1qeEWstO9553Y&sensor=false&libraries=places,geometry&v=3.18"></script>
        <script type="text/javascript">
            (function($) {
             "use strict";
            google.maps.event.addDomListener(window, 'load', init);
            function init() {
                var lat = <?php print($lat_of_map_contact); ?>;
                var lon = <?php print($lng_of_map_contact); ?>;
                var mapOptions = {
                    zoom: 16,
                    scrollwheel: false,
                    // mapTypeId: google.maps.MapTypeId.ROADMAP,
                    center: new google.maps.LatLng(lat , lon),
                    styles: [
                  {
                    "featureType": "administrative",
                      "elementType": "labels",
                      "stylers": [
                          {
                              "visibility": "simplified"
                          },
                          {
                              "color": "#e94f3f"
                          }
                      ]
                  },
                  {
                      "featureType": "landscape",
                      "elementType": "all",
                      "stylers": [
                          {
                              "visibility": "on"
                          },
                          {
                              "gamma": "0.50"
                          },
                          {
                              "hue": "#ff4a00"
                          },
                          {
                              "lightness": "-79"
                          },
                          {
                              "saturation": "-86"
                          }
                      ]
                  },
                  {
                      "featureType": "landscape.man_made",
                      "elementType": "all",
                      "stylers": [
                          {
                              "hue": "#ff1700"
                          }
                      ]
                  },
                  {
                      "featureType": "landscape.natural.landcover",
                      "elementType": "all",
                      "stylers": [
                          {
                              "visibility": "on"
                          },
                          {
                              "hue": "#ff0000"
                          }
                      ]
                  },
                  {
                      "featureType": "poi",
                      "elementType": "all",
                      "stylers": [
                          {
                              "color": "#e74231"
                          },
                          {
                              "visibility": "off"
                          }
                      ]
                  },
                  {
                      "featureType": "poi",
                      "elementType": "labels.text.stroke",
                      "stylers": [
                          {
                              "color": "#4d6447"
                          },
                          {
                              "visibility": "off"
                          }
                      ]
                  },
                  {
                      "featureType": "poi",
                      "elementType": "labels.icon",
                      "stylers": [
                          {
                              "color": "#f0ce41"
                          },
                          {
                              "visibility": "off"
                          }
                      ]
                  },
                  {
                      "featureType": "poi.park",
                      "elementType": "all",
                      "stylers": [
                          {
                              "color": "#363f42"
                          }
                      ]
                  },
                  {
                      "featureType": "road",
                      "elementType": "all",
                      "stylers": [
                          {
                              "color": "#231f20"
                          }
                      ]
                  },
                  {
                      "featureType": "road",
                      "elementType": "labels.text.fill",
                      "stylers": [
                          {
                              "color": "#6c5e53"
                          }
                      ]
                  },
                  {
                      "featureType": "transit",
                      "elementType": "all",
                      "stylers": [
                          {
                              "color": "#313639"
                          },
                          {
                              "visibility": "off"
                          }
                      ]
                  },
                  {
                      "featureType": "transit",
                      "elementType": "labels.text",
                      "stylers": [
                          {
                              "hue": "#ff0000"
                          }
                      ]
                  },
                  {
                      "featureType": "transit",
                      "elementType": "labels.text.fill",
                      "stylers": [
                          {
                              "visibility": "simplified"
                          },
                          {
                              "hue": "#ff0000"
                          }
                      ]
                  },
                  {
                      "featureType": "water",
                      "elementType": "all",
                      "stylers": [
                          {
                              "color": "#0e171d"
                          }
                      ]
                  }
              ]
                };
                var mapElement = document.getElementById('book-map-contact');
                var map = new google.maps.Map(mapElement, mapOptions);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(lat,lon),
                    map: map,
                    icon: "",
                    title: 'Map title'
                });
            }
          })(jQuery)
        </script>
      </section>
<?php
get_footer();
?>