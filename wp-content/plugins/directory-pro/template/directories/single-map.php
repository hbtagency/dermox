<style>
.tags{
    clear: both;
    margin:40px 0 0 0;
    padding:0;
    
    list-style:none;
    }
.tags li{ margin-bottom: 10px !important;}
.tags li, .tags a{
    float:left;
    height:24px;
    line-height:24px;
    position:relative;
    font-size:11px;
    }
.tags a{
    margin-left:20px;
    padding:0 10px 0 12px;
    background:#0089e0 !important;
    color:#fff !important;
    text-decoration:none !important;
    -moz-border-radius-bottomright:4px;
    -webkit-border-bottom-right-radius:4px; 
    border-bottom-right-radius:4px;
    -moz-border-radius-topright:4px;
    -webkit-border-top-right-radius:4px;    
    border-top-right-radius:4px;    
    } 
 .tags a:before{
    content:"";
    float:left;
    position:absolute;
    top:0;
    left:-12px;
    width:0;
    height:0;
    border-color:transparent #0089e0 transparent transparent;
    border-style:solid;
    border-width:12px 12px 12px 0;      
    }
 .tags a:after{
    content:"";
    position:absolute;
    top:10px;
    left:0;
    float:left;
    width:4px;
    height:4px;
    -moz-border-radius:2px;
    -webkit-border-radius:2px;
    border-radius:2px;
    background:#fff;
    -moz-box-shadow:-1px -1px 2px #004977 !important;
    -webkit-box-shadow:-1px -1px 2px #004977 !important;
    box-shadow:-1px -1px 2px #004977 !important;
    }
    .tags a:hover{background:#555!important;} 

.tags a:hover:before{border-color:transparent #555 transparent transparent !important;}
    .view_left_container img {
        max-width: 350px;
        height: auto !important;
        width: expression(this.width > 350 ? 350: true);
    }
</style>

	<div id="map" style="width:100%;height:300px;"> </div>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<div class="clear"></div>
	<?php
	$lat=get_post_meta($id,'latitude',true);
	$lng=get_post_meta($id,'longitude',true);
	
	// Get latlng from address* START********
	$dir_lat=$lat;
	$dir_lng=$lng;
	$address = get_post_meta($id,'address',true);
	if($address!=''){
			if($dir_lat=='' || $dir_lng==''){
				$latitude='';$longitude='';
				
				$prepAddr = str_replace(' ','+',$address);
				$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
				$output= json_decode($geocode);
				if(isset( $output->results[0]->geometry->location->lat)){
					$latitude = $output->results[0]->geometry->location->lat;
				}
				if(isset($output->results[0]->geometry->location->lng)){
					$longitude = $output->results[0]->geometry->location->lng;
				}
				if($latitude!=''){
					update_post_meta($id,'latitude',$latitude);
				}
				if($longitude!=''){
					update_post_meta($id,'longitude',$longitude);
				}
				$lat=$latitude;
				$lng=$longitude;
			}
	}	
	// Get latlng from address* ENDDDDDD********	
	
	$map_info= '';
	?>
	
			<script type="text/javascript">								
                    function initialize() {
                        var myLatlng = new google.maps.LatLng(<?php echo $lat;?>, <?php echo $lng;?>);
                        var mapOptions = {
                            zoom: 14,
                            scrollwheel: true,
                            draggable: true,
							streetViewControl: true,
                            center: myLatlng,
                            mapTypeId: google.maps.MapTypeId.content,
                            disableDefaultUI: false,
                        }
                        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
							
                        					
                        var styles = '';
                        if(styles != ''){
                            var styledMap = new google.maps.StyledMapType(styles, {name: 'Styled Map'});
                            map.mapTypes.set('map_style', styledMap);
                            map.setMapTypeId('map_style');
                        }
                        var infowindow = new google.maps.InfoWindow({
                            content: '<?php echo $map_info;?>',
                            maxWidth: 200,
                            maxHeight: 70,
                            
                        });
                         var marker = new google.maps.Marker({
                        position: myLatlng,
                        map: map,
                        title: '',
                        //icon: 'http://directory.chimpgroup.com/directory/realestate/wp-content/themes/directory-theme/assets/images/map-marker.png',
                        shadow: ''
                    });
            
                        //google.maps.event.addListener(marker, 'click', function() {
                            if (infowindow.content != ''){
                              infowindow.open(map, marker);
                               map.panBy(1,-60);
                               google.maps.event.addListener(marker, 'click', function(event) {
                                infowindow.open(map, marker);
                               });
                            }
                        //});
						panorama = map.getStreetView();
						panorama.setPosition(myLatlng);
						panorama.setPov(({
						  heading: 265,
						  pitch: 0
						}));

                    }
					
				function cs_toggle_street_view(btn) {
				  var toggle = panorama.getVisible();
				  if (toggle == false) {
					if(btn == 'streetview'){
					  panorama.setVisible(true);
					}
				  } else {
					if(btn == 'mapview'){
					  panorama.setVisible(false);
					}
				  }
				}

                google.maps.event.addDomListener(window, 'load', initialize);					
					//google.maps.event.trigger(map, 'resize');					
					jQuery('a[href="#locationmap"]').on('click', function(e) {
						setTimeout(function(){
								initialize();	
								google.maps.event.trigger(map, 'resize');
						},500)
							
					});
						
			</script>
				
				
		           
				
