<?php
/* Template part: Participe */
?>
<?php $style = '';?>
<?php if( kirki_get_option('participe_bg') ) $style = 'background-image:url("'.kirki_get_option('participe_bg').'")';?>
<section id="participe" class="col-md-12" style="<?php echo esc_attr($style);?>">
	<div class="container">
		<div class="row">
			<?php if( $title = kirki_get_option('participe_title') ): ?>
				<h2 class="section-title">
					<?php echo apply_filters('the_title', $title);?>
				</h2><!-- .section-title -->
			<?php endif;?>
			<?php if( $text = kirki_get_option('participe_text') ): ?>
				<div class="col-md-12 section-text">
					<?php echo apply_filters('the_content', $text);?>
				</div><!-- .col-md-12 section-text -->
			<?php endif;?>
			<?php if( $url = kirki_get_option('participe_btn_url') ): ?>
				<div class="col-md-12 text-center btn-container">
					<a href="<?php echo esc_url($url);?>" class="btn btn-primary btn-large">
						<?php echo apply_filters('the_title', kirki_get_option('participe_btn'));?>
					</a>
				</div><!-- .col-md-12 text-center -->
			<?php endif;?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #participe.col-md-12 -->