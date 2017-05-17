<?php get_header(); ?>

<section class="area-textos fix">
	<div class="container">

			<div class="col-conteudo">
			

						<article class="post- type-ocupa-madalena">
						<?php 
						$page = get_query_var('paged');
						$page = (!empty($page) ? $page : 1);
						$args = array(
							'post_type'			=> 'ocupa-madalena-ev',
							'order'				=> 'DESC',
							// 'posts_per_page'    => 6,
							'orderby'			=> 'meta_value_num',
							'meta_key'			=> 'om_data_e_hora_evento',
							'meta_type'			=> 'DATETIME',
							'paged'				=> $page
							); 
						query_posts( $args ); ?>
	
						<?php if (have_posts()) : ?><?php $post = $posts[0]; $c=0;?><?php while (have_posts()) : the_post(); ?>
						<?php $c++; if( !$paged && $c == 1) :?>

								<header>
									<h2><span>Ocupa Madalena - Eventos</span> Último publicado em <?php the_date(); ?></h2>
									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
								</header>			
								<p><?php echo wp_trim_words( get_the_content(), 150, '...' ); ?></p>
								<p><strong>Data do evento: <?php $timestamp = get_field('om_data_e_hora_evento');
      echo date_i18n("d/m/Y", $timestamp); ?></strong></p>
								<p><a href="<?php the_permalink(); ?>" class="btn-block"><span>Ler evento na integra</span></a></p>

								<div class="fix">&nbsp;</div>

								<h3 class="upper">Ver mais eventos</h3>

						<?php else :?>
							<li id="post-<?php the_ID(); ?>" <?php post_class('lista-evento'); ?>><span class="data"><span>Evento em</span><?php $timestamp = get_field('om_data_e_hora_evento');
      echo date_i18n("d.m.y", $timestamp); ?></span><a href="<?php the_permalink(); ?>" class="titulo"><?php the_title(''); ?></a></li>
						<?php endif; endwhile; ?>

						<?php paginacao(); endif; ?>
	
						</article>

			</div>


			<div class="col-aside">
				<div class="box">
					<h3>Ocupa Madalena</h3>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/ocupa-madalena">Sobre nós</a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/ocupa-madalena-ev"><strong>Eventos</strong></a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/ocupa-madalena-atv">Atividades</a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/ocupa-madalena-esp">Espetáculos</a></li>
				</div>

				<div class="box"></div>
			</div>

			<div class="fix"></div>
				

	</div>
</section>
<?php get_footer(); ?>