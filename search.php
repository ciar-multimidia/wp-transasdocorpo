<?php get_header(); ?>

<section class="area-textos fix">
	<div class="container">

			<div class="col-conteudo full">
			

						<article class="post- type-producoes">
	
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<header>
									<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
									<h2><?php $post_type = get_post_type_object( get_post_type($post) );  echo 'Publicado em: '; echo $post_type->label ; ?></h2>
								</header>			

								<div class="fix">&nbsp;</div>

						<?php endwhile; paginacao(); endif; ?>	

						</article>

			</div>

			<div class="fix"></div>

	</div>
</section>
<?php get_footer(); ?>