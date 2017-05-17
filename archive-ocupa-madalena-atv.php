<?php get_header(); ?>

<section class="area-textos fix">
	<div class="container">

			<div class="col-conteudo">
			

						<article class="post- type-ocupa-madalena">

							<?php if (have_posts()) : ?><?php $post = $posts[0]; $c=0;?><?php while (have_posts()) : the_post(); ?>
							<?php $c++; if( !$paged && $c == 1) :?>

								<header>
									<h2><span>Ocupa Madalena - Atividades</span></h2>
									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								</header>			
								<p><?php echo wp_trim_words( get_the_content(), 150, '...' ); ?></p>
								<p><a href="<?php the_permalink(); ?>" class="btn-block"><span>Ler na integra</span></a></p>

								<div class="fix">&nbsp;</div>

								<h3 class="upper">Outras atividades</h3>

							<?php else :?>
								<li id="post-<?php the_ID(); ?>" <?php post_class('lista-item'); ?>><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endif; endwhile; ?>

							<?php paginacao(); endif; ?>
	
						</article>

			</div>


			<div class="col-aside">
				<div class="box">
					<h3>Ocupa Madalena</h3>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/ocupa-madalena">Sobre nós</a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/ocupa-madalena-ev">Eventos</a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/ocupa-madalena-atv"><strong>Atividades</strong></a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/ocupa-madalena-esp">Espetáculos</a></li>
				</div>

				<div class="box"></div>
			</div>

			<div class="fix"></div>
				

	</div>
</section>
<?php get_footer(); ?>