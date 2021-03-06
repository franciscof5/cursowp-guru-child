<?php get_header();
		
		//BANNER f5sites
		if(is_home()) {
			echo "<br style='clear:both;'>"; ?>
			
			<?php
			#echo do_shortcode('[rev_slider alias="homepage"]');
		}
		
	  //GETTING META VALUES...
	  $page_layout = dt_theme_option('specialty', 'archives-layout');
	  
	  //BREADCRUMP...
	  if(!is_front_page() || !is_home()):
		  if(dt_theme_option('general', 'disable-breadcrumb') != "on"): ?>
			  <!-- breadcrumb starts here -->
			  <section class="breadcrumb-wrapper">
				  <div class="container"><?php
					  if($pid = get_option('page_for_posts')):
						  echo '<h1>'.get_the_title($pid).'</h1>';
					  else: ?>
						  <h1><?php the_title(); ?></h1><?php
					  endif; ?>	  
					  <?php new dt_theme_breadcrumb; ?>
				  </div>
			  </section>
			  <!-- breadcrumb ends here --><?php
		  endif;
	  endif; ?>
	  
	  <!-- content starts here -->
	  <div class="content">
		  <div class="container">
			  <section class="<?php echo esc_attr($page_layout); ?>" id="primary">
				  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php
					  //PERFORMING ARCHIVE LAYOUT...
					  get_template_part('includes/archive-post-layout'); ?>
				  </article>
			  </section>
			  <?php if($page_layout != 'content-full-width' && $page_layout == 'with-left-sidebar'): ?>
				  <section class="left-sidebar" id="secondary"><?php get_sidebar(); ?></section>
			  <?php elseif($page_layout != 'content-full-width' && $page_layout == 'with-right-sidebar'): ?>    
				  <section id="secondary"><?php get_sidebar(); ?></section>
			  <?php endif; ?>
		  </div>
	  </div>
	  <!-- content ends here -->

<?php get_footer(); ?>