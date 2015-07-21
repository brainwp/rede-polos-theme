<?php
/**
 * The template for content polos
 */
?>
<div class="col-md-6 pull-right polos-content polos-small animated bounce">
	<a href="<?php the_permalink();?>" class="col-md-12">
		<?php the_post_thumbnail( 'medium' );?>
		<div class="col-md-12 caption">
			<?php the_title();?>
		</div><!-- .col-md-12 caption -->
		<div class="more-icon">
			+
		</div><!-- .more-icon -->
	</a>
</div><!-- .col-md-6 pull-right polos-content -->