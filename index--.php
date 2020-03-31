<?php get_header(); ?>

<?php

		//BANNER f5sites
		if(is_front_page() || is_home()) {
			echo "<br style='clear:both;'>"; ?>
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleControls" data-slide-to="1"></li>
					<li data-target="#carouselExampleControls" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="carousel-item active">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/slider-home/cursowp-banner-principal.svg.png" alt="Principal" class="img-responsive" style="width: 100%;">
					</div>

					<div class="carousel-item">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/slider-home/cursowp-banner-cursos.svg.png" alt="Cursos" class="img-responsive" style="width: 100%;">
					</div>
					<div class="carousel-item">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/slider-home/cursowp-banner-mercado.svg.png" alt="Mercado" class="img-responsive" style="width: 100%;">
					</div>
				</div>

				<!-- Controls -->
				  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Next</span>
				  </a>
			</div>
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