<div class="portfolio-masonry-container">
<?php
	$widget_id = $this->get_id();
	$slides = $this->get_settings('slides');
	$count_slides = count($slides);
	
	if(!empty($slides))
	{
		//Get all settings
		$settings = $this->get_settings();
		
		$column_class = 1;
		$thumb_image_name = 'medium_large';
		
		//Start displaying gallery columns
		switch($settings['columns']['size'])
		{
			case 1:
		   		$column_class = 'avante-one-col';
		   	break;
		   	
			case 2:
		   		$column_class = 'avante-two-cols';
		   	break;
		   	
		   	case 3:
		   	default:
		   		$column_class = 'avante-three-cols';
		   	break;
		   	
		   	case 4:
		   		$column_class = 'avante-four-cols';
		   	break;
		   	
		   	case 5:
		   		$column_class = 'avante-five-cols';
		   	break;
		   	
		   	case 6:
		   		$column_class = 'tg_six_cols';
		   	break;
		}
		
		$filterable_class = 'no_filter';
		
		if($settings['filterable'] == 'yes')
		{
			//Get filterable tags
			$filterable_tags = array();
			foreach ( $slides as $slide ) 
			{
				$filterable_tags[] = ltrim($slide['slide_tag']);
			}
			$filterable_tags = array_unique($filterable_tags);
			
			if(!empty($filterable_tags) && $settings['filterable'] == 'yes')
			{
				$filterable_class = 'filterable';
?>
<div class="avante-portfolio-filter-wrapper">
		<a class="filter-tag-btn active" href="javascript:;" data-rel="all" data-cols="<?php echo esc_attr($settings['columns']['size']); ?>"><?php echo __( 'All', 'avante-elementor' ); ?></a>
	<?php
		foreach ( $filterable_tags as $filterable_tag ) 
		{
	?>
		<a class="filter-tag-btn" href="javascript:;" data-rel="<?php echo avante_sanitize_title($filterable_tag); ?>" data-cols="<?php echo esc_attr($settings['columns']['size']); ?>"><?php echo esc_html($filterable_tag); ?></a>
	<?php
		}
	?>
</div>
<?php
			}
		}
?>
<div class="portfolio-masonry-content-wrapper avante-gallery-grid-content-wrapper do-masonry masonry-classic portfolio_masonry layout-<?php echo esc_attr($column_class); ?>" data-cols="<?php echo esc_attr($settings['columns']['size']); ?>">
<?php		
		$animation_class = '';
		if(isset($settings['disable_animation']))
		{
			$animation_class = 'disable_'.$settings['disable_animation'];
		}
		
		$smoove_min_width = 1;
		switch($settings['disable_animation'])
		{
			case 'none':
				$smoove_min_width = 1;
			break;
			
			case 'tablet':
				$smoove_min_width = 769;
			break;
			
			case 'mobile':
				$smoove_min_width = 415;
			break;
			
			case 'all':
				$smoove_min_width = 5000;
			break;
		}
	
		$last_class = '';
		$count = 1;
		
		foreach ( $slides as $slide ) 
		{
			$last_class = '';
			if($count%$settings['columns']['size'] == 0)
			{
				$last_class = 'last';
			}
			
			if(is_numeric($slide['slide_image']['id']) && !empty($slide['slide_image']['id']))
			{
				if(is_numeric($slide['slide_image']['id']) && (!isset($_GET['elementor_library']) OR empty($_GET['elementor_library'])))
				{
					$image_url = wp_get_attachment_image_src($slide['slide_image']['id'], $thumb_image_name, true);
				}
				else
				{
					$image_url[0] = $slide['slide_image']['url'];
				}
				
				//Get image meta data
				$image_alt = get_post_meta($slide['slide_image']['id'], '_wp_attachment_image_alt', true);
			}
			else
			{
				$image_url[0] = $slide['slide_image']['url'];
				$image_alt = '';
			}
			
			$target = $slide['slide_link']['is_external'] ? 'target="_blank"' : '';
			
			//Calculate slide tags
			$slide_tags = '';
			$slide_tags_arr = explode(',', $slide['slide_tag']);
			
			if(is_array($slide_tags_arr) && count($slide_tags_arr) > 1)
			{
				foreach($slide_tags_arr as $slide_tag)
				{
					$slide_tags.= avante_sanitize_title(ltrim($slide_tag)).' ';
				}
			}
			else
			{
				$slide_tags.= avante_sanitize_title(ltrim($slide['slide_tag']));
			}
			
			//Calculation for animation queue
			if(!isset($queue))
			{
				$queue = 1;	
			}
			
			if($queue > $settings['columns']['size'])
			{
				$queue = 1;
			}
?>
		<div class="portfolio-masonry-grid-wrapper gallery-grid-item <?php echo esc_attr($column_class); ?> <?php echo esc_attr($last_class); ?>  portfolio-<?php echo esc_attr($count); ?> tile scale-anm <?php echo esc_attr($slide_tags); ?> all <?php echo esc_attr($filterable_class); ?> smoove <?php echo esc_attr($animation_class); ?>" data-delay="<?php echo intval($queue*150); ?>" data-minwidth="<?php echo esc_attr($smoove_min_width); ?>" data-move-y="45px" data-offset="-30%">
			<div class="portfolio_masonry_img">
				<img src="<?php echo esc_url($image_url[0]); ?>" alt="<?php echo esc_attr($image_alt);?>" />
			</div>

			<figcaption>
				<div class="portfolio-masonry-content">
					<h3><?php echo esc_html($slide['slide_title']); ?></h3>
					<div class="portfolio_masonry_subtitle"><?php echo esc_html($slide['slide_subtitle']); ?></div>
					<div class="popup-arrow"><span class="ti-arrow-right"></span></div>
				</div>
			</figcaption><a href="<?php echo esc_url($slide['slide_link']['url']); ?>" <?php echo esc_attr($target); ?> ></a>
		</div>
<?php
			$count++;
			$queue++;
		}
?>
</div>
<?php
	}
?>
</div>