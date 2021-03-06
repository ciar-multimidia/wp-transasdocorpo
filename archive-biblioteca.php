<?php get_header(); ?>

<section class="area-textos fix">
	<div class="container">

			<div class="col-conteudo">
			

						<article class="post- type-biblioteca">
							<header>
								<h2><span><?php printf( __( '%s', 'ciar-transasdocorpo' ), get_post_type( get_the_ID() ) ); ?></span></h2>
								<h1><a href="<?php the_permalink(); ?>"><?php echo get_post_field('post_title', '8510'); ?></a></h1>
							</header>
							
							<?php echo wpautop(get_post_field('post_content', '8510')); ?>
	
						</article>

			</div>


			<div class="col-aside">
				<div class="box">
					<h3>Biblioteca</h3>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/artigos">Artigos</a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/publicacoes">Publicações</a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/filmes">Filmes</a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/informativos">Informativo Fazendo Gênero</a></li>
				</div>
			</div>

			<div class="fix"></div>
				

	</div>
</section>
<?php get_footer(); ?>





<?php /*?><?php get_header(); ?>

<section class="area-textos fix">
	<div class="container">

			<div class="col-conteudo full">
			

						<article class="post- type-biblioteca">
	
						<?php $args = array( 'post_parent' => $parent, 'post_type' => 'biblioteca', 'posts_per_page' => 1, 'sort_column'=> 'menu_order' ); $my_query = new  WP_Query( $args ); while ( $my_query->have_posts() ) : $my_query->the_post(); ?>

								<header>
									<h2><span><?php printf( __( '%s', 'ciar-transasdocorpo' ), get_post_type( get_the_ID() ) ); ?></span> Último publicado em <?php the_date(); ?></h2>
									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								</header>			
								<p><?php echo wp_trim_words( get_the_content(), 150, '...' ); ?></p>
								<p><a href="<?php the_permalink(); ?>" class="btn-block"><span>Ler na integra</span></a></p>

								<div class="fix">&nbsp;</div>
						<?php endwhile; wp_reset_query(); ?>
						</article>
						
			</div>

			<div class="area-conteudo">
				<h3 class="block upper">Nossa biblioteca</h3>
				<?php $args = array( 'post_parent' => $parent, 'post_type' => array('artigos', 'publicacoes', 'informativos'), 'posts_per_page' => 6, 'orderby' => 'rand'); $my_query = new  WP_Query( $args ); while ( $my_query->have_posts() ) : $my_query->the_post(); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header>
							<div class="tag">
								<?php printf( __( '%s', 'ciar-transasdocorpo' ), get_post_type( get_the_ID() ) ); ?>
							</div>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<time><?php echo get_the_date(); ?></time>
						</header>

						<footer><a href="<?php the_permalink(); ?>" class="more-link">saiba mais</a></footer>
					</div>

				<?php endwhile; wp_reset_query(); ?>
			</div>

			<div class="fix"></div>

	</div>
</section>
<?php get_footer(); ?>


<?php */?>