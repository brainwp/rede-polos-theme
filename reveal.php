<?php
/*Template name: Reveal Modal Agenda */
$options = get_option('geral_cfg');
?>
<?php if ( have_posts() ) : ?>

<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-6 reveal-logo">
				<img src="<?php echo get_template_directory_uri();?>/assets/images/reveal-logo.png">
			</div><!-- .col-md-2 -->
		</div><!-- .row -->
	</div><!-- .container -->
	<div class="col-md-12 clear"></div><!-- .col-md-12 clear -->
	<div class="col-md-12 barra-reveal bg-cor">
		<div class="container">
			<div class="row">
				<h1 class="reveal-title">
					<?php the_title();?>
				</h1><!-- .reveal-title -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .col-md-12 barra-reveal bg-cor -->
	<div class="container reveal-container-content">
		<div class="row">
			<div class="col-md-3 img-container">
				<?php the_post_thumbnail('full'); ?>
			</div><!-- .col-md-5 -->
			<div class="col-md-9 reveal-content">
				<?php the_content();?>
				<?php if( $url = get_post_meta( get_the_ID(), 'site_url', true ) ) : ?>
					<a href="<?php echo esc_url( $url ); ?>" class="btn btn-primary btn-large btn-reveal pull-right">
						<?php _e('Acesse o site do Polo', 'rede-polos-theme');?>
					</a>
				<?php endif;?>
			</div><!-- .col-md-7 reveal-content -->
		</div><!-- .row -->
	</div><!-- .container -->
<?php endwhile; ?>
<?php endif; ?>
