<?php
/**
 * Modelo para a página inicial
 * Template for the front-page
 *
 *
 */

get_header('page'); ?>
		<div  class="main-interno infos-bg" role="main">
			<div class="container">
				<div class="row" id="destaques">
					<div id="servicos-interno" class="col-md-12">
						<?php $style = '';?>
						<?php if( kirki_get_option('box1_color') ) $style = 'background:' . kirki_get_option('box1_color') . ';';?>
						<div class="text-center destaque-home polos" style="<?php echo $style;?>">
							<h3><?php echo kirki_get_option('box1_title');?></h3>
							<?php if( $text = kirki_get_option('box1_text') ):?>
								<div class="col-md-12">
									<p><?php echo $text;?></p>
								</div><!-- .col-md-12 -->
						    <?php endif;?>
							<?php if( kirki_get_option('box1_btn_url') ):?>
							<a class="btn btn-primary" href="<?php echo esc_url( kirki_get_option('box1_btn_url') );?>">
								<?php echo kirki_get_option('box1_btn');?>
							</a>
							<?php endif;?>
						</div>

						<?php $style = '';?>
						<?php if( kirki_get_option('box2_color') ) $style = 'background:' . kirki_get_option('box2_color') . ';';?>
						<div class="text-center destaque-home rede-paulista" style="<?php echo $style;?>">
							<h3><?php echo kirki_get_option('box2_title');?></h3>
							<?php if( $text = kirki_get_option('box2_text') ):?>
								<div class="col-md-12">
									<p><?php echo $text;?></p>
								</div><!-- .col-md-12 -->
						    <?php endif;?>
							<?php if( kirki_get_option('box2_btn_url') ):?>
							<a class="btn btn-primary" href="<?php echo esc_url( kirki_get_option('box2_btn_url') );?>">
								<?php echo kirki_get_option('box2_btn');?>
							</a>
							<?php endif;?>
						</div>

						<?php $style = '';?>
						<?php if( kirki_get_option('box3_color') ) $style = 'background:' . kirki_get_option('box3_color') . ';';?>
						<div class="text-center destaque-home copa-america" style="<?php echo $style;?>">
							<h3><?php echo kirki_get_option('box3_title');?></h3>
							<?php if( $text = kirki_get_option('box3_text') ):?>
								<div class="col-md-12">
									<p><?php echo $text;?></p>
								</div><!-- .col-md-12 -->
						    <?php endif;?>
							<?php if( kirki_get_option('box3_btn_url') ):?>
							<a class="btn btn-primary" href="<?php echo esc_url( kirki_get_option('box3_btn_url') );?>">
								<?php echo kirki_get_option('box3_btn');?>
							</a>
							<?php endif;?>
						</div>
					</div><!--servicos interno-->
					<div id="slider">
						<h2 class="section-title">
							<?php _e('Destaques','odin');?>
						</h2><!-- .section-title -->
						<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
						<?php echo do_shortcode('[brasa_slider name="Destaques"]');?>
					</div>
				</div><!--destaques-->
			</div><!-- .container -->
		</div>


	<div id="primary" class="<?php echo odin_classes_page_full(); ?>">
		<div  class="main-interno" role="main">

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
