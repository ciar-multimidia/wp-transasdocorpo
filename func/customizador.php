<?php 
// ========================================//
// CUSTOMIZER
// ========================================// 
function afc_customizer( $wp_customize ) {

	////////////////////////////////////////////
	// PASSO 1 - SESSAO
	////////////////////////////////////////////

	$wp_customize->add_section(
	    'cfg_topo',
	    array(
	        'title' => 'Cabeçalho',
	        'priority' => 1,
	    )
	);

	// CONFIGURACOES
	$wp_customize->add_section(
	    'cfg_destaque',
	    array(
	        'title' => 'Destaques',
	        'priority' => 2,
	    )
	);



	////////////////////////////////////////////
	// PASSO 2 - PARAMETROS PADRAO E CADASTRO DOS ITENS PASSO 3
	////////////////////////////////////////////

		$wp_customize->add_setting( 'cfg_topo_imgfundo', array( 'default' => '' ));
		$wp_customize->add_setting( 'cfg_topo_cormarca', array( 'default' => 'cormarca-amarela' ));

		$wp_customize->add_setting( 'cfg_destaque_biblio', array( 'default' => '' ));
		$wp_customize->add_setting( 'cfg_destaque_multimidia', array( 'default' => '' ));
		$wp_customize->add_setting( 'cfg_destaque_acoes', array( 'default' => '' ));
		$wp_customize->add_setting( 'cfg_destaque_ocmadalena', array( 'default' => '' ));
		$wp_customize->add_setting( 'cfg_destaque_btn', array( 'default' => 'saiba mais' ));


	////////////////////////////////////////////
	// PASSO 3 - CONTROLA OPCAO - ITENS
	////////////////////////////////////////////

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
			'cfg_topo_imgfundo', array(
				'label'      => 'Imagem de fundo',
				'description' => 'Foto ilustrativa por trás da marca',
				'section'    => 'cfg_topo',
				'settings'   => 'cfg_topo_imgfundo',
			)) 
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
			'cfg_topo_cormarca', array(
				'label'      => 'Cor da marca',
				'description' => '',
				'section'    => 'cfg_topo',
				'settings'   => 'cfg_topo_cormarca',
				'type'       => 'select',
				'choices'    => array(
					'cormarca-amarela'   => 'Amarelo',
					'cormarca-roxo'   => 'Roxo',
					'cormarca-branca'   => 'Branco',
				)
			)) 
		);



		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
			'cfg_destaque_biblio', array(
				'label'      => 'Biblioteca',
				'description' => 'Texto abaixo do ícone de Biblioteca',
				'section'    => 'cfg_destaque',
				'settings'   => 'cfg_destaque_biblio',
				'type'       => 'text'
			)) 
		);
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
			'cfg_destaque_multimidia', array(
				'label'      => 'Multimidia',
				'description' => 'Texto abaixo do ícone de Multimidia',
				'section'    => 'cfg_destaque',
				'settings'   => 'cfg_destaque_multimidia',
				'type'       => 'text'
			)) 
		);
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
			'cfg_destaque_acoes', array(
				'label'      => 'Ações',
				'description' => 'Texto abaixo do ícone de Ações',
				'section'    => 'cfg_destaque',
				'settings'   => 'cfg_destaque_acoes',
				'type'       => 'text'
			)) 
		);
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
			'cfg_destaque_ocmadalena', array(
				'label'      => 'Ocupa Madalena',
				'description' => 'Texto abaixo do ícone de Ocupa Madalena',
				'section'    => 'cfg_destaque',
				'settings'   => 'cfg_destaque_ocmadalena',
				'type'       => 'text'
			)) 
		);
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
			'cfg_destaque_btn', array(
				'label'      => 'Botão de acesso',
				'description' => 'Texto do botão de acesso abaixo dos textos descritivos dos ícones',
				'section'    => 'cfg_destaque',
				'settings'   => 'cfg_destaque_btn',
				'type'       => 'text'
			)) 
		);
	
	///////////////////////// Remove Sections
	$wp_customize->remove_section('title_tagline');
	$wp_customize->remove_section('static_front_page');
	$wp_customize->remove_section('nav');
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('background_image');
	$wp_customize->remove_section('custom_css');
}
add_action( 'customize_register' , 'afc_customizer' );

// ocultar menu original
add_action('customize_register', function ( $WP_Customize_Manager ){
    if (isset($WP_Customize_Manager->nav_menus) && is_object($WP_Customize_Manager->nav_menus)) {
        remove_filter( 'customize_refresh_nonces', array( $WP_Customize_Manager->nav_menus, 'filter_nonces' ) );
        remove_action( 'wp_ajax_load-available-menu-items-customizer', array( $WP_Customize_Manager->nav_menus, 'ajax_load_available_items' ) );
        remove_action( 'wp_ajax_search-available-menu-items-customizer', array( $WP_Customize_Manager->nav_menus, 'ajax_search_available_items' ) );
        remove_action( 'customize_controls_enqueue_scripts', array( $WP_Customize_Manager->nav_menus, 'enqueue_scripts' ) );
        remove_action( 'customize_register', array( $WP_Customize_Manager->nav_menus, 'customize_register' ), 11 );
        remove_filter( 'customize_dynamic_setting_args', array( $WP_Customize_Manager->nav_menus, 'filter_dynamic_setting_args' ), 10, 2 );
        remove_filter( 'customize_dynamic_setting_class', array( $WP_Customize_Manager->nav_menus, 'filter_dynamic_setting_class' ), 10, 3 );
        remove_action( 'customize_controls_print_footer_scripts', array( $WP_Customize_Manager->nav_menus, 'print_templates' ) );
        remove_action( 'customize_controls_print_footer_scripts', array( $WP_Customize_Manager->nav_menus, 'available_items_template' ) );
        remove_action( 'customize_preview_init', array( $WP_Customize_Manager->nav_menus, 'customize_preview_init' ) );
        remove_filter( 'customize_dynamic_partial_args', array( $WP_Customize_Manager->nav_menus, 'customize_dynamic_partial_args' ), 10, 2 );
    }
}, -1); 