<?php get_header(); ?>

<section class="area-textos fix">
	<div class="container">

			
			<div class="col-conteudo">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header>
									<h2><span><?php printf( __( '%s', 'ciar-transasdocorpo' ), get_post_type( get_the_ID() ) ); ?></span>  Divulgado em <?php the_date(); ?>. Evento em <?php $timestamp = get_field('data_e_hora_evento'); echo date_i18n("d/m/Y", $timestamp); ?> (<?php $timestamp = get_field('data_e_hora_evento');
      echo date_i18n("H:i", $timestamp); ?>)</h2>
									<h1><a href="<?php the_permalink(); ?>"><?php the_title(''); ?></a></h1>
								</header>

								<br>

								<h6 class="upper">
									Data do evento: 
									<?php $timestamp = get_field('data_e_hora_evento'); echo date_i18n("d/m/Y", $timestamp); ?> 
									<?php if ( get_field('horario_definido') ) : ?>às <?php $timestamp = get_field('data_e_hora_evento'); echo date_i18n("H:i", $timestamp); ?><?php endif; ?>
								</h6>
								
								<?php the_content(); ?>
								
							</article>

				<?php endwhile; endif; ?>
			</div>
			

			<div class="col-aside">
				<?php if ( get_field('evento_imagem') || get_field('data_e_hora_evento') || get_field('local_do_evento') ) : ?>
					<div class="box">
						<?php if ( get_field('evento_imagem') ) : ?><a href="<?php echo esc_url(get_field('evento_imagem')); ?>" class="fancybox"><img src="<?php echo esc_url(get_field('evento_imagem')); ?>"></a><?php endif; ?>
						<?php if ( get_field('data_e_hora_evento') ) : ?><label><strong>Data:</strong> <?php $timestamp = get_field('data_e_hora_evento'); echo date_i18n("d/m/Y", $timestamp); ?></label>
						<?php endif; ?>
						<?php if ( get_field('horario_definido') ) : ?><label><strong>Horario:</strong> <?php $timestamp = get_field('data_e_hora_evento'); echo date_i18n("H:i", $timestamp); ?></label><?php endif; ?>
						<?php if ( get_field('local_do_evento') ) : ?><label><strong>Local:</strong> <?php the_field('local_do_evento'); ?></label>
						<?php endif; ?>
					</div>

					<p>&nbsp;</p>
				<?php endif; ?>

				<h3>Mais eventos</h3>
				<?php $args = array( 'post_parent' => $parent,  'post_type' => 'eventos',  'order' => 'DESC', 'posts_per_page' => 3, 'orderby' => 'meta_value_num', 'meta_key' => 'data_e_hora_evento', 'meta_type' => 'DATETIME' ); $my_query = new  WP_Query( $args ); while ( $my_query->have_posts() ) : $my_query->the_post(); ?>

					<li id="post-<?php the_ID(); ?>" <?php post_class('lista-evento'); ?>><a href="<?php the_permalink(); ?>" class="titulo"><?php the_title(''); ?></a><span class="data"><span>Evento em</span><?php $timestamp = get_field('data_e_hora_evento'); echo date_i18n("d.m.y", $timestamp); ?></span></li>
	    
				<?php endwhile; wp_reset_query(); ?>

				<p align="center"><a href="<?php bloginfo('url'); ?>/eventos" class="btn small">Ver todos os eventos</a></p>
			</div>

			<div class="fix"></div>
	</div>
</section>
<?php get_footer(); ?>