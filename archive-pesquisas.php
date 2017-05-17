<?php get_header(); ?>

<section class="area-textos fix">
	<div class="container">

			<div class="col-conteudo">
			

						<article class="post- type-pesquisas">
	
						<?php if (have_posts()) : ?><?php $post = $posts[0]; $c=0;?><?php while (have_posts()) : the_post(); ?>
						<?php $c++; if( !$paged && $c == 1) :?>

								<header>
									<h2><span><?php printf( __( '%s', 'ciar-transasdocorpo' ), get_post_type( get_the_ID() ) ); ?></span> Último publicado em <?php the_date(); ?></h2>
									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								</header>			
								<p><?php echo wp_trim_words( get_the_content(), 150, '...' ); ?></p>
								<p><a href="<?php the_permalink(); ?>" class="btn-block"><span>Ler pesquisa na integra</span></a></p>

								<div class="fix">&nbsp;</div>

								<h3 class="upper">Ver mais pesquisas</h3>

						<?php else :?>
							<li id="post-<?php the_ID(); ?>" <?php post_class('lista-item'); ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endif; endwhile; ?>

						<?php paginacao(); endif; ?>

						</article>

			</div>


			<div class="col-aside">
				<div class="box">
					<h3>Ações</h3>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/producoes">Formações Feministas</a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/pesquisas"><strong>Pesquisas</strong></a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/ongs">Mapeamento de ONGs</a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/acoes/transas-responde/">Transas Responde</a></li>
				</div>
			</div>

	</div>
</section>
<?php get_footer(); ?>