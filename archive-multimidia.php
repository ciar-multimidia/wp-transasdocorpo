<?php get_header(); ?>

<section class="area-textos fix">
	<div class="container">

			<div class="area-conteudo">
				<h3 class="block">Multimídia</h3>
				<?php 
					if (have_posts()) : while (have_posts()) : the_post(); 
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); $url = $thumb['0'];
				?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="thumb" style="background-image: url('<?php echo $url; ?>')"><a href="<?php the_permalink(); ?>"></a></div>
						<header>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</header>
					</div>

				<?php endwhile; paginacao(); else:  endif; ?>	
			</div>	

			<div class="fix"></div>		

	</div>
</section>
<?php get_footer(); ?>