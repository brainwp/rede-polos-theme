<?php
/**
 * Modelo para a página inicial
 * Template Name: Inicial
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
				<div id="polos-interno" class="interno">
					<h1>
						Pólos de Futebol de Rua no Brasil
					</h1>
					<div class="clearfix"></div>
					<!-- portfolio de video -->
					<?php
					$count = 0;
					$args = array(
					    'post_type' => 'polos',
						'posts_per_page' => 3
					);
					$query = new WP_Query( $args );
					?>
					<?php while ( $query->have_posts() ) : $query->the_post();?>
					    <?php if ( $count == 0 ):?>
					    	<?php get_template_part('content','polos-first');?>
					    <?php else: ?>
							<?php get_template_part('content','polos');?>
						<?php endif;?>
						<?php $count++;?>
					<?php endwhile;?>
					<!-- portfolio de imagens -->
					<div id="ajax-load-posts-home"></div><!-- #ajax-load-posts-home -->
					<div class="col-md-12 text-center">
						<?php if($query->max_num_pages > 1):?>
							<a class="btn btn-primary btn-loadmore" id="btn-loadmore-home" data-page="2" data-load="Carregando..">
								Mais Pólos...
							</a>
						<?php endif;?>
					</div><!-- .col-md-12 text-center -->
				</div> <!--port-interno-->
			</div><!--portfolio-->
		</div><!-- #main -->
	</div><!-- #primary -->
	<?php get_template_part('/parts/participe');?>
<?php
get_footer('page');
