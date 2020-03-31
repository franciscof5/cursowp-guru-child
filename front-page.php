<?php get_header();

	while(have_posts()): the_post();
		
	  if(is_page()) dt_theme_slider_section($post->ID);

	  global $dt_allowed_html_tags;
	  //GETTING META VALUES...
	  $meta_set = get_post_meta($post->ID, '_tpl_default_settings', true);
	  if($GLOBALS['force_enable'] == true)
	  	$page_layout = $GLOBALS['page_layout'];
	  else
	  	$page_layout = !empty($meta_set['layout']) ? $meta_set['layout'] : $GLOBALS['page_layout'];
	  
	  #if(is_front_page() || is_home()) {
			#echo "<br style='clear:both;'>"; ?>
			<br style='clear:both;'>
			<div class="video-container" dis="col-md-6 offset-md-3 col-sm-12 col-xs-12" style="height: 215px;">
				<!--iframe width="560" height="215" src="https://www.youtube-nocookie.com/embed/o682fHPRaPk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe-->
				<iframe width="560" height="315" src="https://www.youtube.com/embed/GOivgdO78MA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<br style='clear:both;'>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
		#}

	  //BREADCRUMP...
	  if(!is_front_page() and !is_home()):
		  if(dt_theme_option('general', 'disable-breadcrumb') != "on"): ?>
			  <!-- breadcrumb starts here -->
			  <section class="breadcrumb-wrapper">
				  <div class="container">
					  <h1><?php the_title(); ?></h1>
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
                      //PAGE TOP CODE...
                      if(dt_theme_option('integration', 'enable-single-page-top-code') != '') echo wp_kses(stripslashes(dt_theme_option('integration', 'single-page-top-code')), $dt_allowed_html_tags);
                      the_content();
                      wp_link_pages(array('before' => '<div class="page-link"><strong>'.__('Pages:', 'iamd_text_domain').'</strong> ', 'after' => '</div>', 'next_or_number' => 'number'));
                      edit_post_link(__('Edit', 'iamd_text_domain'), '<span class="edit-link">', '</span>' );
                      echo '<div class="social-bookmark">';
                          show_fblike('page'); show_googleplus('page'); show_twitter('page'); show_stumbleupon('page'); show_linkedin('page'); show_delicious('page'); show_pintrest('page'); show_digg('page');
                      echo '</div>';
                      dt_theme_social_bookmarks('sb-page');
                      if(dt_theme_option('integration', 'enable-single-page-bottom-code') != '') echo wp_kses(stripslashes(dt_theme_option('integration', 'single-page-bottom-code')), $dt_allowed_html_tags);
                      if(dt_theme_option('general', 'disable-page-comment') != true && (isset($meta_set['comment']) != "")) comments_template('', true); ?>
                  </article>
              </section>
              <?php if($page_layout != 'content-full-width' && $page_layout == 'with-left-sidebar'): ?>
                  <section class="left-sidebar" id="secondary"><?php get_sidebar(); ?></section>
              <?php elseif($page_layout != 'content-full-width' && $page_layout == 'with-right-sidebar'): ?>    
                  <section id="secondary"><?php get_sidebar(); ?></section>
              <?php endif;
        endwhile; ?>        	
          </div>
      </div>
      <!-- content ends here -->

<?php get_footer(); ?>