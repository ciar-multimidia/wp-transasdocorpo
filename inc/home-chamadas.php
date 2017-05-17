<div class="area-chamadas">
	<div class="imagem-fundo" style="background-image: url('<?php bloginfo('template_url'); ?>/img/chamadas.jpg')"></div>
	<div class="mascara"></div>
	<div class="container area-chamadas-interna">
		<div>
			<?php get_template_part('img/ico-biblio'); ?>
			<h4>Biblioteca</h4>
			<p><?php if(get_theme_mod('cfg_destaque_biblio')) : ?><?php echo wp_kses_post(get_theme_mod('cfg_destaque_biblio')); ?><?php endif; ?></p>
			<a href="<?php bloginfo('url') ?>/biblioteca" class="btn small"><?php if(!get_theme_mod('cfg_destaque_btn')) : ?>saiba mais<?php else: ?><?php echo wp_kses_post(get_theme_mod('cfg_destaque_btn')); ?><?php endif; ?></a>
		</div>
		<div>
			<?php get_template_part('img/ico-midia'); ?>
			<h4>Multimídia</h4>
			<p><?php if(get_theme_mod('cfg_destaque_multimidia')) : ?><?php echo wp_kses_post(get_theme_mod('cfg_destaque_multimidia')); ?><?php endif; ?></p>
			<a href="<?php bloginfo('url') ?>/multimidia" class="btn small"><?php if(!get_theme_mod('cfg_destaque_btn')) : ?>saiba mais<?php else: ?><?php echo wp_kses_post(get_theme_mod('cfg_destaque_btn')); ?><?php endif; ?></a>
		</div>
		<div>
			<?php get_template_part('img/ico-acoes'); ?>
			<h4>Ações</h4>
			<p><?php if(get_theme_mod('cfg_destaque_acoes')) : ?><?php echo wp_kses_post(get_theme_mod('cfg_destaque_acoes')); ?><?php endif; ?></p>
			<a href="<?php bloginfo('url') ?>/acoes" class="btn small"><?php if(!get_theme_mod('cfg_destaque_btn')) : ?>saiba mais<?php else: ?><?php echo wp_kses_post(get_theme_mod('cfg_destaque_btn')); ?><?php endif; ?></a>
		</div>
		<div>
			<?php get_template_part('img/ico-madalena'); ?>
			<h4>Ocupa Madalena</h4>
			<p><?php if(get_theme_mod('cfg_destaque_ocmadalena')) : ?><?php echo wp_kses_post(get_theme_mod('cfg_destaque_ocmadalena')); ?><?php endif; ?></p>
			<a href="<?php bloginfo('url') ?>/ocupa-madalena" class="btn small"><?php if(!get_theme_mod('cfg_destaque_btn')) : ?>saiba mais<?php else: ?><?php echo wp_kses_post(get_theme_mod('cfg_destaque_btn')); ?><?php endif; ?></a>
		</div>
	</div>
</div>



