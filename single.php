<?php get_header(); ?>

<section class="area-textos fix">
	<div class="container">
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="col-conteudo">

						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header>
								<h2><span><?php printf( __( '%s', 'ciar-transasdocorpo' ), get_post_type( get_the_ID() ) ); ?></span><?php if ( get_field('video_url') || get_field('video_upload') ): ?> <span>video</span><?php endif; ?> Publicado em <?php the_date(); ?></h2>
								<h1><a href="<?php the_permalink(); ?>"><?php the_title(''); ?></a></h1>
							</header>
							
							<?php if ( !is_singular('publicacoes') ) : ?>
								<?php the_content(); ?>


								<?php if ( get_field('video_url') ): ?>
									<br><br>
									<?php $url = get_field('video_url'); ?>
									<div class="video"><iframe src="//www.youtube.com/embed/<?php echo videoid($url); ?>?rel=0" frameborder="0" allowfullscreen></iframe></div>
								<?php elseif (get_field('video_upload')) : ?>
									<br><br>
									<video width="100%" controls>
									  <source src="<?php the_field('video_upload') ?>" type="video/mp4">
									  Seu navegador não suporta este vídeo
									</video>
								<?php endif ?>


							<?php else : ?>
								<?php if ( get_field('publicacao_resumo') ) { echo '<p>'; the_field('publicacao_resumo'); echo '</p>'; } ?>	
							<?php endif; ?>	
						</article>

			<?php endwhile; ?>
			</div>

			<?php get_sidebar(); ?>
			<?php endif; ?>	
			<div class="fix"></div>
	</div>
</section>
<?php get_footer(); ?>