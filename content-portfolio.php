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

	<div id="post-<?php the_ID(); ?>" <?php post_class('col-md-3'); ?>>
		<?php echo '<a href="'.get_the_permalink().'">';?>
 		
		<div class="descr_portfolio">
			<?php echo get_the_excerpt();?>
		</div>
		<h2>
			<?php echo get_the_title();?>
		</h2>
		<?php 
		$message = (has_post_thumbnail() ?the_post_thumbnail('port-int-thumb'): 'não tem');
		echo $message;
		echo '</a>';
		?>
	</div>
	

