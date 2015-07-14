<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Odin
 * @since 2.2.0
*/
?>
	<div>
		<main id="main" class="interno site-main" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', 'port-single' );

					// If comments are open or we have at least one comment, load up the comment template.
					
				endwhile;
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
