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

<article style="background-image:url('<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>');
" class="fundo-portfolio">
	<div class="fundo-cor-portfolio">
		<header class="entry-header">
			<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
				endif;
			?>

		</header><!-- .entry-header -->

	
		<div class="conteudo-port-single">
			
			<?php
				the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'odin' ) );
				if (get_field('midia') == 'video'){

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


				}
				else{
					the_field('galeria_de_imagens');
				} 
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'odin' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );
			?>
			<div class="clearfix"></div>
		</div><!-- .conteudo-port-single -->
	</div>
</article><!-- #post-## -->
