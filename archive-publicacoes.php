<?php get_header(); ?>

<section class="area-textos fix">
	<div class="container">

			<div class="col-conteudo">

						<article class="post- type-publicacoes">

						<?php if (have_posts()) : ?><?php $post = $posts[0]; $c=0;?><?php while (have_posts()) : the_post(); ?>
						<?php $c++; if( !$paged && $c == 1) :?>

								<header>
									<h2><span><?php printf( __( '%s', 'ciar-transasdocorpo' ), get_post_type( get_the_ID() ) ); ?></span></h2>
									<h1><a href="<?php the_permalink(); ?>"><?php echo get_post_field('post_title', '8512'); ?></a></h1>
								</header>			
								<?php echo wpautop(get_post_field('post_content', '8512')); ?>

								<div class="fix">&nbsp;</div>

								<h3 class="upper">Publicações</h3>

								<li id="post-<?php the_ID(); ?>" <?php post_class('lista-item'); ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

						<?php else :?>
							<li id="post-<?php the_ID(); ?>" <?php post_class('lista-item'); ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endif; endwhile; ?>

						<?php paginacao(); endif; ?>
	
						</article>

			</div>


			<div class="col-aside">
				<div class="box">
					<h3>Biblioteca</h3>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/artigos">Artigos</a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/publicacoes"><strong>Publicacoes</strong></a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/filmes">Filmes</a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/informativos">Informativo Fazendo Gênero</a></li>
				</div>

				<div class="box"></div>
			</div>

			<div class="fix"></div>
				

	</div>
</section>
<?php get_footer(); ?>


<?php /*?><?php get_header(); ?>

<section class="area-textos fix">
	<div class="container">

			<div class="col-conteudo full">
			

						<article class="post- type-publicacoes">
	
						<?php if (have_posts()) : ?><?php $post = $posts[0]; $c=0;?><?php while (have_posts()) : the_post(); ?>
						<?php $c++; if( !$paged && $c == 1) :?>

								<header>
									<h2><span><?php printf( __( '%s', 'ciar-transasdocorpo' ), get_post_type( get_the_ID() ) ); ?></span> Último publicado em <?php the_date(); ?></h2>
									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								</header>			
								<p><?php echo wp_trim_words( get_the_content(), 150, '...' ); ?></p>
								<p><a href="<?php the_permalink(); ?>" class="btn-block"><span>Ler publicação na integra</span></a></p>

								<div class="fix">&nbsp;</div>

								<h3 class="upper">Ver mais publicações</h3>

						<?php else :?>
							<li id="post-<?php the_ID(); ?>" <?php post_class('lista-item'); ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endif; endwhile; ?>

						<?php paginacao(); endif; ?>

						</article>

			</div>

			<div class="fix"></div>

	</div>
</section>
<?php get_footer(); ?><?php */?>