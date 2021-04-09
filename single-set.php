<?php get_header(); ?>

	<div class="container">
		<div class="row">

			<div class="content-area col-md-8" id="primary">
				<div class="site-content" id="content">

					<?php while ( have_posts() ) : the_post(); 
					
						get_template_part( 'template-parts/content', 'single-set' );

					endwhile; // end of the loop. ?>		

					<?php 
					if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
					if ( comments_open() || '0' != get_comments_number() ) comments_template(); 
					?>

				</div><!-- end site-content -->
			</div><!-- end content-area -->

	<?php get_sidebar(); ?>

		</div>
	</div>





<?php get_footer(); ?>