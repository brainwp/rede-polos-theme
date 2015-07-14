<?php
/**
 * Modelo para a página inicial
 * Template for the front-page
 *
 *
 */

get_header('page'); ?>

	<div id="primary" class="<?php echo odin_classes_page_full(); ?>">
		<div  class="main-interno" role="main">
			
			<div class="row" id="destaques">
				<div id="servicos-interno" class="col-md-12" >

			<div class="text-center destaque-home polos">
				<h3>O que é?</h3>

			    <a class="btn" href="#">
				Saiba Mais			
			    </a>

			</div>

			<div class="text-center destaque-home rede-paulista">
				<h3>Conheça a Rede Paulista de Futebol de Rua</h3>

			    <a class="btn" href="#">
				Saiba Mais			
			    </a>

			</div>
			<div class="text-center destaque-home copa-america">
				<h3>Copa América de Futebol de Rua 2015</h3>

			    <a class="btn" href="#">
				Saiba Mais			
			    </a>

			</div>

				</div><!--servicos interno-->
			</div><!--destaques-->

			<div class="row" id="slider">
			 <h2 class="section-title">
	        		<?php _e('Destaques','odin');?>
	        	 </h2><!-- .section-title -->

			 <?php echo do_shortcode('[brasa_slider name="Destaques"]');?>

			</div>

			<div class="col-md-12 clear" style="height:30px"></div><!-- .col-md-12 clear -->
	
			<div class="row" id="portfolio">
				<div id="portfolio-interno" class="interno">
					<h1>
						Pólos de Futebol de Rua no Brasil
					</h1>
					<div class="clearfix"></div>
					<!-- portfolio de video -->
					<?php
					$count=0;
					$args2 = array(
						'posts_per_page' => 1,
					    'post_type' => 'portfolio',
						'meta_key' => 'midia',
						'meta_value'=> 'video',
						'posts_per_page' => 2
					);
					$trabalho_query2 = new  WP_Query( $args2 );
					?>
					   <?php while ( $trabalho_query2->have_posts() ) : $trabalho_query2->the_post();
						$meta = get_post_meta($post->ID);
					
						$url = $meta['video'][0];
					
					   	$url= parse_url($url);
						echo '<div class="" id="video_port">';
						if ($url['host'] == 'vimeo.com' || $url['host'] ==  'www.vimeo.com' ){
							$imgid = $url['path'];
													$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video$imgid.php"));
													echo '<iframe src="//player.vimeo.com/video'.$imgid.'" width="750" height="421" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
						}
						//Youtube
						elseif ($url['host'] == 'youtube.com' || $url['host'] ==  'www.youtube.com'){
							parse_str($url['query'], $id_video);
							$id_video = $id_video['v'];
							echo '<iframe src="http://www.youtube.com/embed/'.$id_video.'?rel=0&html5=1&autoplay=1&controls=1&showinfo=0&fs=1 width="560" height="315" frameborder="0" allowfullscreen=""></iframe>
			                ';
						}
					   	echo '</div>';
					   endwhile;
					   ?>
					<!-- portfolio de imagens -->
					<?php
					$count=0;
					$args = array(
						'posts_per_page' => 3,
					    'post_type' => 'portfolio',
						'meta_key' => 'midia',
						'meta_value'=> 'imagem',
						'posts_per_page' => 2
					
					
					);
					$trabalho_query = new  WP_Query( $args );
					?>
				 	<div  id="fotos_port">
					   <?php while ( $trabalho_query->have_posts() ) : $trabalho_query->the_post();
						?>
						<div class="portfolio">
							<?php 
							echo '<a href="'.get_the_permalink().'">';?>

							<div class="descr_portfolio">
								<?php echo get_the_excerpt();?>
							</div>
							<h2>
								<?php echo get_the_title();?>
							</h2>
							<?php 
							$message = (has_post_thumbnail() ?the_post_thumbnail('port-thumb'): 'não tem');
							echo $message;
							echo '</a>';
							?>
						</div>
						<?php 
					   endwhile;
					   ?>
					</div>
				<h2 class='botao'><a href="portfolio">Mais Pólos...</a></h2>
				</div> <!--port-interno-->
			</div><!--portfolio-->
		</div><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer('page');
