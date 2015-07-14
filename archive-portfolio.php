<?php
/*Modelo para página de arquivo de serviços
 *
 *
 */

get_header('page'); ?>

	<div id="primary" class="<?php echo odin_classes_page_full(); ?>">
		<div  class="main-interno" role="main">
			
			<div class="row" id="arquivo-servicos">
					<?php if ( have_posts() ) : ?>
					<div id="titulo-portfolio-interno" class="interno" >
						<h1>
							<?php
								post_type_archive_title( );
							?>
						</h1>
					</div>
					<div id="descricao-portfolio-interno" class="interno-page" >
					<h3>
						
						<?php
							$post_type = get_post_type_object( $post->post_type);
							echo $post_type->description;
						?>
					</h3>
					</div><!--descricao-servicos-interno-->

				<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

						/*
						 * Include the post format-specific template for the content. If you want to
						 * use this in a child theme, then include a file called called content-___.php
						 * (where ___ is the post format) and that will be used instead.
						 */
						get_template_part( 'content', 'portfolio' );

					endwhile;

					// Page navigation.
					odin_paging_nav();
					
				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
			</div><!--row-->
		</div><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer('page');
