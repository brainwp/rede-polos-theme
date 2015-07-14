<?php
/*
 *Template name: Serviços
 *
 */

get_header('page'); ?>

	<div id="primary" class="<?php echo odin_classes_page_full(); ?>">
		<div  class="main-interno" role="main">
			<div class="row" id="arquivo-servicos">
			<?php
			  $temp = $wp_query; 
			  $wp_query = null; 
			  $wp_query = new WP_Query(); 
			  $wp_query->query('post_type=servico'.'&paged='.$paged); 
		?>
			<div id="titulo-servicos-interno" class="interno" >
				<h1>
				   <?php
					$post_type=$wp_query->query['post_type'];
					$post_type = get_post_type_object( $post_type);
					echo $post_type->labels->name;
					
				   	// $post_type =  $wp_query->post_type;
				   	// echo $post_type->name;
				   ?>
				</h1>
			</div>
			<div id="descricao-servicos-interno" class="interno-page" >
				<h3>
					<?php 
						echo $post_type->description;
						?>
				   	
				</h3>
			</div><!--descricao-servicos-interno-->
			<div id="servicos-arquivo" class="interno-page" >
				
				<?php	  while ($wp_query->have_posts()) : $wp_query->the_post(); 
								?>
			
				<article class="cada-servico" id="servico-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<div style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>');
					" class="thumb-servico">
						<div class="titulo-servico-arquivo">
							<h2>
								<a href="<?php echo get_permalink(); ?>">
									<?php the_title()?>
								</a>
							</h2>
							
						</div>
					</div>
					
					<div class='descricao-servico'>
	        
						<?php the_excerpt($post->ID);?>										
					</div>
					<div class="mais-servico">
						<h3>
							<a href="<?php echo get_permalink(); ?>">
								Saiba Mais
							</a>
						</h3>
					</div>
					<div class="clearfix"></div>
					
				</article><!-- .cada-servico-## -->
				
			<?php endwhile; 
						?>
            
			</div> <!--servicos-arquivo-->
		
			<?php 
			  $wp_query = null; 
			  $wp_query = $temp;  // Reset
			?>
			
				
			</div><!--row-->
		</div><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer('page');
