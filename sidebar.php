<?php if ( is_singular('artigos') ) : ?>

	<?php if ( get_field('artigo_imagem') || get_field('artigo_autor') || get_field('artigo_publicacao') || get_field('artigo_anexo') ) : ?><div class="col-aside">
		<div class="box"><?php endif; ?>
			<?php if ( get_field('artigo_imagem') ) : ?>
				<a href="<?php echo esc_url(get_field('artigo_imagem')); ?>" class="fancybox"><img src="<?php echo esc_url(get_field('artigo_imagem')); ?>"></a>
			<?php endif; ?>
			<?php if ( get_field('artigo_autor') ) : ?>
				<label><strong>Autoria:</strong> <?php the_field('artigo_autor'); ?></label>
			<?php endif; ?>
			<?php if ( get_field('artigo_publicacao') ) : ?>
				<label><strong>Data do artigo:</strong> <?php the_field('artigo_publicacao'); ?></label>
			<?php endif; ?>
		</div>
		<?php if ( get_field('artigo_anexo') ) : ?>
			<p align="center"><a href="<?php the_field('artigo_anexo'); ?>" class="btn small"><i class="fa fa-download" aria-hidden="true"></i> Baixar artigo</a></p>
		<?php endif; ?>
	<?php if ( get_field('artigo_imagem') || get_field('artigo_autor') || get_field('artigo_publicacao') || get_field('artigo_anexo') ) : ?></div><?php endif; ?>





<?php elseif ( is_singular('publicacoes') ) : ?>
	<?php if ( get_field('publicacao_capa') || get_field('publicacao_editora') || get_field('publicacao_publico') || get_field('publicacao_valor') || get_field('publicacao_anexo') ) : ?><div class="col-aside">
		<div class="box"><?php endif; ?>
			<?php if ( get_field('publicacao_capa') ) : ?>
				<a href="<?php echo esc_url(get_field('publicacao_capa')); ?>" class="fancybox"><img src="<?php echo esc_url(get_field('publicacao_capa')); ?>"></a>
			<?php endif; ?>
			<?php if ( get_field('publicacao_editora') ) : ?>
				<label><strong>Editora:</strong> <?php the_field('publicacao_editora'); ?></label>
			<?php endif; ?>
			<?php if ( get_field('publicacao_publico') ) : ?>
				<label><strong>Público:</strong> <?php the_field('publicacao_publico'); ?></label>
			<?php endif; ?>
			<?php /*if ( get_field('publicacao_valor') ) : ?>
				<label><strong>Valor:</strong> <?php the_field('publicacao_valor'); ?></label>
			<?php endif;*/ ?>
		</div>
		<?php if ( get_field('publicacao_anexo') ) : ?>
			<p align="center"><a href="<?php the_field('publicacao_anexo'); ?>" class="btn small"><i class="fa fa-download" aria-hidden="true"></i> Baixar publicação</a></p>
		<?php endif; ?>
	<?php if ( get_field('publicacao_capa') || get_field('publicacao_editora') || get_field('publicacao_publico') || get_field('publicacao_valor') || get_field('publicacao_anexo') ) : ?></div><?php endif; ?>




<?php elseif ( is_singular('producoes') ) : ?>
	<?php if ( get_field('producoes_anexo') || get_field('producao_autoria') || get_field('producao_nomecurso') || get_field('producoes_data') ) : ?>
	<div class="col-aside">
			<?php if ( get_field('producoes_anexo') ): ?><p align="center"><a href="<?php the_field('producoes_anexo'); ?>" class="btn small"><i class="fa fa-download" aria-hidden="true"></i> Baixar arquivo</a></p><?php endif; ?>
			<div class="box">
				<?php if ( get_field('producao_autoria') ) : ?>
					<label>Autoria: <?php the_field('producao_autoria'); ?></label>
				<?php endif; ?>
				<?php if ( get_field('producao_nomecurso') ) : ?>
					<label>Curso: <?php the_field('producao_nomecurso'); ?></label>
				<?php endif; ?>
				<?php if ( get_field('producoes_data') ) : ?>
					<label>Data de curso: <?php the_field('producoes_data'); ?></label>
				<?php endif; ?>
			</div>
	</div>
	<?php endif; ?>




<?php elseif ( is_singular('pesquisas') ) : ?>
	<?php if ( get_field('pesquisa_imagem') || get_field('pesquisa_anexo') || get_field('pesquisa_autoria') ) : ?><div class="col-aside">
		<div class="box"><?php endif; ?>
			<?php if ( get_field('pesquisa_imagem') ) : ?>
				<a href="<?php echo esc_url(get_field('pesquisa_imagem')); ?>" class="fancybox"><img src="<?php echo esc_url(get_field('pesquisa_imagem')); ?>"></a>
			<?php endif; ?>
			<?php if ( get_field('pesquisa_autoria') ) : ?>
					<label>Autoria: <?php the_field('pesquisa_autoria'); ?></label>
				<?php endif; ?>
		</div>
		<?php if ( get_field('pesquisa_anexo') ) : ?>
			<p align="center"><a href="<?php the_field('pesquisa_anexo'); ?>" class="btn small"><i class="fa fa-download" aria-hidden="true"></i> Baixar pesquisa</a></p>
		<?php endif; ?>
	<?php if ( get_field('pesquisa_imagem') || get_field('pesquisa_anexo') ) : ?></div><?php endif; ?>




<?php elseif ( is_singular('informativos') ) : ?>
	<?php if ( get_field('informativo_imagem') || get_field('informativo_anexo') ) : ?><div class="col-aside">
		<div class="box"><?php endif; ?>
			<?php if ( get_field('informativo_imagem') ) : ?>
				<a href="<?php echo esc_url(get_field('informativo_imagem')); ?>" class="fancybox"><img src="<?php echo esc_url(get_field('informativo_imagem')); ?>"></a>
			<?php endif; ?>
		</div>
		<?php if ( get_field('informativo_anexo') ) : ?>
			<p align="center"><a href="<?php the_field('informativo_anexo'); ?>" class="btn small"><i class="fa fa-download" aria-hidden="true"></i> Baixar informativo</a></p>
		<?php endif; ?>
	<?php if ( get_field('informativo_imagem') || get_field('informativo_anexo') ) : ?></div><?php endif; ?>


<?php else : ?>

	<?php if(has_post_thumbnail()){ ?><div class="col-aside"><div class="box">
		<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); $url = $thumb['0']; ?>
		<img src="<?=$url?>">
	</div></div><?php } ?>

<?php endif; ?>	