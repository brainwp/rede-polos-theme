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
			  $wp_query->query('showposts=3&post_type=servico'.'&paged='.$paged); 
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
			<div id="rolo_img">
				<div id="servicos-rolo" class="interno-page" >
					
				<?php	  while ($wp_query->have_posts()) : $wp_query->the_post(); 
									?>
				
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<h2><a href="<?php echo get_permalink(); ?>"><?php the_title()?></a></h2>
						
						</header>
						<div class="entry-content">
							<a href="<?php echo get_permalink(); ?>">
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'odin' ) );?>
							</a>
						</div>
					<style>
						#servicos-rolo #post-<?php the_ID(); ?> .entry-content::after{
						  content: "";
						  background: url(image.jpg);
						  opacity: 0.5;
						  top: 0;
						  left: 0;
						  bottom: 0;
						background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>');
						
						  right: 0;
						  position: absolute;
						  z-index: -1;   
						}
					</style>
					</article><!-- #post-## -->
					
					
				
				<?php endwhile; 
							?>

				</div> <!--servicos-rolo-->
			</div><!--rolo_img-->
			<div id="servicos-nav" class="interno-page" >
				<nav>
					<?php navegacao_bolas();?>
				    
				</nav>
			</div><!--#servicos-nav-->

			<?php 
			  $wp_query = null; 
			  $wp_query = $temp;  // Reset
			?>
			
				
			</div><!--row-->
		</div><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer('page');
