<?php get_header(); ?>

<section class="area-textos fix">
	<div class="container">

			<div class="col-conteudo">
			

						<article class="post- type-ongs">

								<header>
									<h2><span><?php printf( __( '%s', 'ciar-transasdocorpo' ), get_post_type( get_the_ID() ) ); ?></span></h2>
									<h1><a href="<?php the_permalink(); ?>">Mapeamento de ONGs</a></h1>
								</header>	

								<table>
								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
									<tr>
										<th width="30%">Nome</th>
										<th><?php the_title(''); ?></th>
									</tr>
									<?php if ( get_field('ong_coordenacao') ) { ?>
										<tr>
											<td>Coordenação atual</td>
											<td><?php the_field('ong_coordenacao'); ?></td>
										</tr>
									<?php } ?>
									<?php if ( get_field('ong_publico') ) { ?>
										<tr>
											<td>Público aproximado que atinge por ano</td>
											<td><?php the_field('ong_publico'); ?></td>
										</tr>
									<?php } ?>
									<?php if ( get_field('ong_endereco') ) { ?>
										<tr>
											<td>Endereço</td>
											<td><?php the_field('ong_endereco'); ?></td>
										</tr>
									<?php } ?>
									<?php if ( get_field('ong_cep') ) { ?>
										<tr>
											<td>CEP</td>
											<td><?php the_field('ong_cep'); ?></td>
										</tr>
									<?php } ?>
									<?php if ( get_field('ong_cidade') ) { ?>
										<tr>
											<td>Cidade</td>
											<td><?php the_field('ong_cidade'); ?></td>
										</tr>
									<?php } ?>
									<?php if ( get_field('ong_telefone') ) { ?>
										<tr>
											<td>Telefone</td>
											<td><?php the_field('ong_telefone'); ?></td>
										</tr>
									<?php } ?>
									<?php if ( get_field('ong_email') ) { ?>
										<tr>
											<td>E-mail</td>
											<td><?php the_field('ong_email'); ?></td>
										</tr>
									<?php } ?>
									<?php if ( get_field('ong_site') ) { ?>
										<tr>
											<td>Site</td>
											<td><a href="http://<?php the_field('ong_site'); ?>" target="blank"><?php the_field('ong_site'); ?></a></td>
										</tr>
									<?php } ?>

								<?php endwhile; ?>	
							</table>
							<?php paginacao(); else : endif; ?>
						</article>
						
			</div>

			<div class="col-aside">
				<div class="box">
					<h3>Ações</h3>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/producoes">Formações Feministas</a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/pesquisas">Pesquisas</a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/ongs"><strong>Mapeamento de ONGs</strong></a></li>
					<li class="lista-evento"><a href="<?php bloginfo('url'); ?>/index.php/acoes/transas-responde/">Transas Responde</a></li>
				</div>
			</div>
	</div>
</section>
<?php get_footer(); ?>