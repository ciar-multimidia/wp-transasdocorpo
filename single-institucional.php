<?php get_header(); ?>

<section class="area-textos fix">
	<div class="container">




			
			<div class="col-conteudo">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header>
									<h2><span><?php printf( __( '%s', 'ciar-transasdocorpo' ), get_post_type( get_the_ID() ) ); ?></span></h2>
									<h1><a href="<?php the_permalink(); ?>"><?php the_title(''); ?></a></h1>
								</header>
								
								<?php if ( is_single('1158') ) { ?>
									
									<?php if( get_field('contato_endereco') ): ?>
										<p>Endereço: <?php the_field('contato_endereco'); ?></p>
									<?php endif; ?>

									<?php if( get_field('contato_telefone') ): ?>
										<p>Telefone: <?php the_field('contato_telefone'); ?></p>
									<?php endif; ?>

									<?php if( get_field('contato_email') ): ?>
										<p>E-mail: <?php the_field('contato_email'); ?></p>
									<?php endif; ?>

									<?php if( get_field('contato_localizacao') ): ?>
										<p>Localização: <br> <iframe src="<?php the_field('contato_localizacao'); ?>" width="100%" height="500px" frameborder="0" style="border:0"></iframe></p>
									<?php endif; ?>

								<?php } else { the_content(); } ?>
							</article>

				<?php endwhile; endif; ?>
			</div>
			

			<div class="col-aside">
				<div class="box">
				<?php $args = array( 'post_parent' => $parent, 'post_type' => 'institucional', 'posts_per_page' => 100, 'sort_column'=> 'menu_order' ); $my_query = new  WP_Query( $args ); while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
					<li class="lista-evento"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; wp_reset_query(); ?>
				</div>
			</div>	

			<div class="fix"></div>
	</div>
</section>
<?php get_footer(); ?>