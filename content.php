<?php
/**
 * The default template for displaying content.
 *
 * Used for both single and index/archive/author/catagory/search/tag.
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<div class="col-md-4 each-post">
	<a href="<?php the_permalink();?>" class="col-md-12 each-post-content">
		<div class="col-md-12 more-container">
			<div class="more-content">+</div><!-- .col-md-4 -->
		</div><!-- .col-md-12 more-container -->
		<div class="img-container">
			<?php if( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'medium' ); ?>
			<?php else : ?>
				<img src="<?php echo get_template_directory_uri();?>/assets/images/default-th.jpg" />
			<?php endif;?>
		</div><!-- .img-container -->
		<div class="the-content">
			<h3 class="the-title">
				<?php the_title();?>
			</h3><!-- .the-title -->
			<?php the_excerpt();?>
		</div><!-- .the-content -->
		<div class="col-md-12 fade-container">
			<div class="fade-bg"></div><!-- .fade-bg -->
		</div><!-- .col-md-12 -->
	</a>
</div><!-- .col-md-4 each-post -->