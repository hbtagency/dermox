<?php
global $post,$wpdb,$tag;
$radius=get_option('_iv_radius');
$keyword_post='';
$back_ground_color='6C7A89';
if(isset($atts['bgcolor']) and $atts['bgcolor']!="" ){
	$back_ground_color=$atts['bgcolor'];
}	
?>
<style>
.cbp-search-submit{
 height: 36px;
   font: 400 16px "Open Sans", sans-serif;
}
.cbp-search-select {
  height: 36px;
  padding: 0 0px 0 12px;
  margin: ;
  border-radius: 1px;
  border: 1px solid #c6c3c4;
  font: 400 16px "Open Sans", sans-serif;
  width: 100%; 
 }  
.cbp-search-input {
  height: 36px;
  line-height:18px!important;
  padding: 0 0px 0 12px;
  margin: ;
  border-radius: 1px;
  border: 1px solid #c6c3c4;
  font: 400 16px "Open Sans", sans-serif;
  width: 100%; }
  
div.container {
        margin: 15px;   
}
div.left, div.right {
        float: left;
        padding: 10px;    
}
div.left {
        background-color:#<?php echo $back_ground_color; ?>;    
}
 @media only screen and (max-width: 480px) {
  .cbp-search-input{		
		font: 400 13px "Open Sans", sans-serif!important;		
    }
     .cbp-search-select{		
		font: 400 13px "Open Sans", sans-serif!important;		
    }
    .cbp-search-submit{
		font: 400 13px "Open Sans", sans-serif!important;	
	}
	div.left, div.right {
        float: center;
        padding: 10px; 
        width:100%   
	}
	.cbp-search-submit{
		 width:100%  
	}	
 } 
  @media only screen and (max-width: 768px) {
  .cbp-search-input{		
		font: 400 14px "Open Sans", sans-serif!important;		
    }
     .cbp-search-select{		
		font: 400 14px "Open Sans", sans-serif!important;		
    }
    .cbp-search-submit{
		font: 400 14px "Open Sans", sans-serif!important;	
	}
	div.left, div.right {       
        padding: 10px; 
      
	}
	
 }     
  
</style>

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<form  action="<?php echo get_post_type_archive_link( 'directories' ) ; ?>" method="POST"  onkeypress="return event.keyCode != 13;">
	 <div class="container">
	 
	 <div class="left" style="margin-top:8px">						
			<input type="text" class="cbp-search-input" id="keyword" name="keyword"  placeholder="<?php _e( 'Keyword', 'ivdirectories' ); ?>" value="<?php echo $keyword_post; ?>">
	  </div>
	 
	  <div class="left" style="margin-top:8px">
					<?php
				echo '<select name="directories-category" class="cbp-search-select">';
				echo'	<option class="cbp-search-select" selected="'.$selected.'" value="">'.__('Any Category','ivdirectories').'</option>';
				
						
						if( isset($_POST['submit'])){
							$selected = $_POST['directories-category'];
						}
							//directories
							$taxonomy = 'directories-category';
							$args = array(
								'orderby'           => 'name', 
								'order'             => 'ASC',
								'hide_empty'        => true, 
								'exclude'           => array(), 
								'exclude_tree'      => array(), 
								'include'           => array(),
								'number'            => '', 
								'fields'            => 'all', 
								'slug'              => '',
								'parent'            => '0',
								'hierarchical'      => true, 
								'child_of'          => 0,
								'childless'         => false,
								'get'               => '', 
								
							);
				$terms = get_terms($taxonomy,$args); // Get all terms of a taxonomy
				if ( $terms && !is_wp_error( $terms ) ) :
					$i=0;
					foreach ( $terms as $term_parent ) {  ?>												
						
						
							<?php  
							
							echo '<option  class="cbp-search-select" value="'.$term_parent->slug.'" '.($selected==$term_parent->slug?'selected':'' ).'>'.$term_parent->name.'</option>';
							?>	
								<?php
								
								$args2 = array(
									'type'                     => 'directories',						
									'parent'                   => $term_parent->term_id,
									'orderby'                  => 'name',
									'order'                    => 'ASC',
									'hide_empty'               => 1,
									'hierarchical'             => 1,
									'exclude'                  => '',
									'include'                  => '',
									'number'                   => '',
									'taxonomy'                 => 'directories-category',
									'pad_counts'               => false 

								); 											
								$categories = get_categories( $args2 );	
								if ( $categories && !is_wp_error( $categories ) ) :
										
										
									foreach ( $categories as $term ) { 
										echo '<option  value="'.$term->slug.'" '.($selected==$term->slug?'selected':'' ).'>-'.$term->name.'</option>';
									} 	
																
								endif;										
								?>
															

					<?php
						$i++;
					} 								
				endif;	
					echo '</select>';	
				?>		
		</div>	
		 
		<div class="left" style="margin-top:8px">							
				<input type="text" class="cbp-search-input " id="address" name="address"  placeholder="<?php _e( 'Location', 'ivdirectories' ); ?>" 
				value="">
				<input type="hidden" id="latitude" name="latitude" placeholder="Latitude" value="" >
				<input type="hidden" id="longitude" name="longitude" placeholder="Longitude"  value="">
	  </div>
		
		<div class="left" style="margin-top:8px">
			<button type="submit" id="submit" name="submit"  class="cbp-search-submit  "><?php _e('Search ','ivdirectories'); ?> </button>	
		</div>	
	 </div>	
	</form>			
	
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>	
<script>
function initialize_address() {
        var input = document.getElementById('address');
        var autocomplete = new google.maps.places.Autocomplete(input);
			google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            //document.getElementById('city2').value = place.name;
            document.getElementById('latitude').value = place.geometry.location.lat();
            document.getElementById('longitude').value = place.geometry.location.lng(); 
        });
    }
google.maps.event.addDomListener(window, 'load', initialize_address);
</script>	
 
