
<?php get_header(); ?>

<section class="area-textos fix">
	<div class="container">

			<div class="col-conteudo">
			

						<article class="post- type-producoes">

						<?php if (have_posts()) : ?><?php $post = $posts[0]; $c=0;?><?php while (have_posts()) : the_post(); ?>
						<?php $c++; if( !$paged && $c == 1) :?>

								<header>
									<h2><span><?php printf( __( '%s', 'ciar-transasdocorpo' ), get_post_type( get_the_ID() ) ); ?></span></h2>
									<h1><a href="<?php the_permalink(); ?>"><?php echo get_post_field('post_title', '8515'); ?></a></h1>
								</header>			
								<?php echo wpautop(get_post_field('post_content', '8515')); ?>

								<div class="fix">&nbsp;</div>

								<h3 class="upper">Formações feministas</h3>

								<li id="post-<?php the_ID(); ?>" <?php post_class('lista-item'); ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

						<?php else :?>
							<li id="post-<?php the_ID(); ?>" <?php post_class('lista-item'); ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endif; endwhile; ?>

						<?php paginacao(); endif; ?>
	
						</article>

			</div>

			<div class="col-aside">
				<div class="box">
					<h3>Ações</h3>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/producoes"><strong>Formações Feministas</strong></a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/pesquisas">Pesquisas</a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/ongs">Mapeamento de ONGs</a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/acoes/transas-responde/">Transas Responde</a></li>
				</div>
			</div>

	</div>
</section>
<?php get_footer(); ?>