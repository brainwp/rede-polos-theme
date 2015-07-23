<?php
/**
 * The template used for displaying page content.
 *
 * @package Odin
 * @since 2.2.0
 */
?>
<?php $class = ''; ?>
<?php if( !has_post_thumbnail() ) $class = 'no-thumb';?>
<?php if( !is_page() ): ?>
	<div class="col-md-12 data-caption <?php echo $class;?>">
		<div class="the-data">
			<?php echo sprintf( __('%s de %s de %s'), get_the_date('d'), get_the_date('F'), get_the_date('Y'));?>
			|
			<?php the_category('|');?>
		</div><!-- .col-md-4 the-data -->
	</div><!-- .col-md-12 data-caption -->
<?php endif;?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>
	<?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' ); ?>


	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'odin' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
