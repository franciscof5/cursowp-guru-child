<?php get_header();

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
              <section id="primary">
                  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php
                      //PERFORMING ARCHIVE LAYOUT...
                      get_template_part('includes/cursowp-simple-archive-post-layout'); ?>
                  </article>

              </section>
              <section id="secondary">
                  	<?php #get_sidebar(); ?>
                  	<?php 
					if(function_exists("smartlang_recent_posts_georefer_widget")) {
						smartlang_recent_posts_georefer_widget();
					}
					#the_widget("Recent_Posts_Widget_Extended", "limit=20"); 
					?>	
                  </section>
          </div>
      </div>
      <!-- content ends here -->

<?php get_footer(); ?>