<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package Odin
 * @since 2.2.0
 */

get_header('page'); ?>
<?php $page = get_queried_object();?>
<?php if( has_post_thumbnail($page->ID) ): ?>
	<?php the_post_thumbnail( 'large', array('class' => 'col-md-12 page-thumbnail') );?>
<?php endif;?>
<div class="col-md-12 bg-page">
	<div class="container">
		<div class="row">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
			?>
		</div><!-- .row -->
	</div><!-- .container -->
</div>
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
				<div class="text-center destaque-home copa-america">
					<?php if( $title = kirki_get_option('participe_title') ): ?>
						<h3><?php echo apply_filters('the_title', $title);?></h3>
					<?php endif;?>
					<?php if( $text = kirki_get_option('participe_text') ):?>
						<div class="col-md-12">
							<p><?php echo apply_filters('the_content', $text);?></p>
						</div><!-- .col-md-12 -->
					<?php endif;?>
					<?php if( $url = kirki_get_option('participe_btn_url') ):?>
						<a class="btn btn-primary" href="<?php echo esc_url( $url );?>">
							<?php echo kirki_get_option('participe_btn');?>
						</a>
					<?php endif;?>
				</div>
			</div><!--servicos interno-->
		</div><!--destaques-->
	</div><!-- .container -->

<?php
get_footer('page');
