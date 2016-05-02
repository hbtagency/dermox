<?php

class CustomBanners_Config
{
	function all_themes($is_pro = false, $disable_if_not_pro = true)
	{
		return array_merge(self::free_themes(), self::pro_themes($is_pro, $disable_if_not_pro));
	}

	function free_themes()
	{
		//array of free themes that are available
		//includes names
		return array(
			'free_themes' => array(
				'free_themes' => 'Basic Themes',
				'default_style' => 'Default Theme',
			),
			'standard' => array(
				'standard' => 'Standard Theme',
				'standard-white' => 'Standard Theme - White',
				'standard-black' => 'Standard Theme - Black',
				'standard-yellow' => 'Standard Theme - Yellow',
				'standard-pink' => 'Standard Theme - Pink',
				'standard-blue' => 'Standard Theme - Blue',
			)
		);		
	}
	
	function pro_themes($is_pro = false, $disable_if_not_pro = true)
	{
		//array of pro themes that are available
		//includes names
		$pro_str = $is_pro ? '' : ' (PRO)';
		$pro_themes = array(
			'card' => array(
				'card' => 'Card Theme' . $pro_str,
				'card-white' => 'Card Theme - White',
			),
			'window' => array(
				'window' => 'Window' . $pro_str,
				'window-white' => 'Window - White',
			),			
			'classic' => array(
				'classic' => 'Classic Theme' . $pro_str,
				'classic-white' => 'Classic Theme - White',
			),			
			'corporate' => array(
				'corporate' => 'Corporate Theme' . $pro_str,
				'corporate-black' => 'Corporate Theme - Black',
			),
			'deco' => array(
				'deco' => 'Deco Theme' . $pro_str,
				'deco-grey' => 'Deco Theme - Grey',
			),
			'tile' => array(
				'tile' => 'Tile Theme' . $pro_str,
				'tile-slate' => 'Tile Theme - Slate',
			),			
			'modern' => array(
				'modern' => 'Modern Theme' . $pro_str,
				'modern-gray' => 'Modern Theme - White',
			),
			'classic_tile' => array(
				'classic_tile' => 'Classic Tile Theme' . $pro_str,
				'classic_tile-black' => 'Classic Tile Theme - Black',
			),
			'banner' => array(
				'banner' => 'Banner Theme' . $pro_str,
				'banner-blue' => 'Banner Theme - Light Grey',
			)
		);		
		
		if (!$is_pro && $disable_if_not_pro)
		{
			foreach ($pro_themes as $group => $themes)
			{
				$skip_next = true;
				foreach ($themes as $slug => $theme_name) {
					if ($skip_next) {
						$skip_next = false;
						continue;
					}
					
					$pro_themes[$group][$slug] = array('name' => $theme_name, 'disabled' => true);
					 
				}
			}
		}
			
			
		return $pro_themes;
	}
	
	function output_theme_selector($field_id, $field_name, $current = '', $is_pro = false)
	{
?>		
		<select class="widefat" id="<?php echo $field_id ?>" name="<?php echo $field_name; ?>">
			<?php
				$themes = self::all_themes($is_pro);
				foreach ($themes as $group_slug => $group_themes)
				{
					$skip_next = true;
					foreach ($group_themes as $theme_slug => $theme_name) {
						if ($skip_next) {
							printf('<optgroup label="%s">', $theme_name);
							$skip_next = false;
							continue;
						}
						$selected = ( strcmp($theme_slug, $current) == 0 ) ? 'selected="selected"' : '';
						printf('<option value="%s" %s>%s</option>', $theme_slug, $selected, $theme_name);
					}
					echo '</optgroup>';
				}
				?>
			</select>
<?php
	}
}