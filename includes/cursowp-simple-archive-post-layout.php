<?php
	//PERFORMING BLOG POST LAYOUT...
	$page_layout = "";
	$post_layout = "";
	
	if(is_archive() || is_home()) {
		$page_layout = dt_theme_option('specialty', 'archives-layout');
		$page_layout = !empty($page_layout) ? $page_layout : 'with-left-sidebar';
		$post_layout = dt_theme_option('specialty', 'archives-post-layout');
		$post_layout = !empty($post_layout) ? $post_layout : 'one-column';
	}
	elseif(is_search()) {
		$page_layout = dt_theme_option('specialty', 'search-layout');
		$page_layout = !empty($page_layout) ? $page_layout : 'with-left-sidebar';
		$post_layout = dt_theme_option('specialty', 'search-post-layout');
		$post_layout = !empty($post_layout) ? $post_layout : 'one-column';
	}
	
	$article_class = $feature_image = "";
	$column = "";
	
	//POST LAYOUT CHECK...
	if($post_layout == "one-column") {
		$article_class = "column dt-sc-one-column blog-fullwidth";
		$feature_image = "blog-onecolumn";
	}
	elseif($post_layout == "one-half-column" || $post_layout == "one-third-column") {
		$article_class = "column dt-sc-one-half";
		$feature_image = "blog-twocol";
		$column = 2;
	}
	
	//PAGE LAYOUT CHECK...
	if($page_layout != "content-full-width") {
		$article_class = $article_class." with-sidebar";
		$feature_image .= "-sidebar";
	}
	
	//PERFORMING QUERY...
	global $wp_query;	//FOR PAGINATION PURPOSE...	

	if(have_posts()): $i = 1;
	 while(have_posts()): the_post();
	 
		$temp_class = "";
		
		if($i == 1) $temp_class = $article_class." first"; else $temp_class = $article_class;
		if($i == $column) $i = 1; else $i = $i + 1; ?>
		
		<div class="<?php echo esc_attr($temp_class); ?>">
			<!-- POST BLOCK STARTS -->
			<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?> style="margin-bottom: 0;">
				<!--div class="post-details">
					<div class="date"><p><span><?php echo get_the_date('d'); ?></span><br /><?php echo get_the_date('M'); ?></p></div>
					<div class="post-comments">
						<?php comments_popup_link('<i class="fa fa-comment"></i> 0', '<i class="fa fa-comment"></i> 1', '<i class="fa fa-comment"></i> %', '', '<i class="fa fa-comment"></i> 0'); ?>
					</div><?php
					//POST FORMAT...
					$format = get_post_format();
					$pholder = dt_theme_option('general', 'disable-placeholder-images'); ?>
				</div-->
				<div class="post-content">

					<div class="entry-thumb">
						<?php if(is_sticky()): ?>
							<div class="featured-post"><?php _e('Featured','iamd_text_domain'); ?></div>
						<?php endif; ?>
						
						<!-- POST FORMAT STARTS -->
						<a href="<?php the_permalink();?>" title="<?php the_title(); ?>">
							<?php $attr = array('title' => get_the_title()); the_post_thumbnail($feature_image, $attr); ?>
						</a>
						<!-- POST FORMAT ENDS -->
					</div>
						
					<div class="entry-detail">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php the_excerpt(); ?>
					</div>
					<div class="post-meta">
						<ul>
							<li><span class="fa fa-calendar"></span><?php echo get_the_date('d'); ?>/<?php echo get_the_date('M'); ?>/<?php echo get_the_date('Y'); ?></li>
							<li><span class="fa fa-user"></span><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author_meta('display_name'); ?></a></li>
							<?php if(count(get_the_category())): ?><li><span class="fa fa-thumb-tack"></span><?php the_category(', '); ?></li><?php endif; ?>
							<?php the_tags('<li><span class="fa fa-pencil"></span>', ', ', '</li>'); ?>
						</ul>
					</div>

				</div>
			</article>
			<!-- POST BLOCK ENDS -->
		</div><?php
	 endwhile; 
	 if($wp_query->max_num_pages > 1): ?>
		<div class="pagination-wrapper">
			<?php if(function_exists("dt_theme_pagination")) echo dt_theme_pagination("", $wp_query->max_num_pages, $wp_query); ?>
		</div><?php
	 endif;
	 wp_reset_query($wp_query);
	else: ?>
		<h2><?php _e('Nothing Found.', 'iamd_text_domain'); ?></h2>
		<p><?php _e('Apologies, but no results were found for the requested archive.', 'iamd_text_domain'); ?></p><?php
	endif;
?>