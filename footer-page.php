<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main div element.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

		</div><!-- #main -->
		
		<footer id="footer" role="contentinfo">
			<div class="container">
				<div class="row">
					<?php if( $image = kirki_get_option('rodape_img') ): ?>
						<img src="<?php echo $image;?>" class="col-md-12" />
					<?php else : ?>
						<img src="<?php echo get_template_directory_uri();?>/assets/images/bg-realizadores.jpg" class="col-md-12" />
					<?php endif;?>
					<div class="line-separator col-md-12"></div><!-- .line-separator col-md-12 -->
					<div class="col-md-5 endereco pull-left">
						<?php if( $text = kirki_get_option('rodape_endereco') ): ?>
							<?php echo apply_filters('the_content', $text);?>
						<?php endif;?>
					</div><!-- .col-md-5 endereco pull-left -->
					<div class="col-md-4 pull-right">
						<div class="col-md-12 redes">
							<?php if( $url = kirki_get_option('social_fb') ): ?>
								<a href="<?php echo esc_url($url);?>">
									<span class="genericon genericon-facebook-alt"></span>
								</a>
							<?php endif;?>
							<?php if( $url = kirki_get_option('social_instagram') ): ?>
								<a href="<?php echo esc_url($url);?>">
									<span class="genericon genericon-instagram"></span>
								</a>
							<?php endif;?>
							<?php if( $url = kirki_get_option('social_email') ): ?>
								<a href="<?php echo esc_url($url);?>">
									<span class="genericon genericon-mail"></span>
								</a>
							<?php endif;?>
						</div><!-- .col-md-12 redes -->
						<div class="dev pull-right text-right">
							<?php echo sprintf(__('Desenvolvido pela %s com %s','odin'), '<a href="http://brasa.art.br"><img class="brasa" src="'. get_template_directory_uri() . '/assets/images/brasa.png"></a>','<a href="http://wordpress.org" class="genericon genericon-wordpress"></a>');?>
						</div><!-- .dev pull-right text-right -->
					</div><!-- .col-md-4 pull-right -->
				</div><!-- .row -->
			</div><!-- .container -->
		</footer><!-- #footer -->
	</div><!-- .container -->

	<?php wp_footer(); ?>
	<script>
	  jQuery(document).ready(function(){
	    // Target your .container, .wrapper, .post, etc.
	    jQuery("#video_port").fitVids();
	  });
	</script>
</body>
</html>
