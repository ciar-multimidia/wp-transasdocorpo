<?php
add_action( 'init', 'post_type_acoes' );
function post_type_acoes() {

  $labels = array(
      'name' => _x('Ações', 'acoes'),
      'singular_name' => _x('Ações', 'acoes'),
      'add_new' => _x('Adicionar item', 'acoes'),
      'add_new_item' => __('Adicionar item'),
      'edit_item' => __('Editar'),
      'new_item' => __('Novo item'),
      'all_items' => __('Outros'),
      'view_item' => __('Ver item'),
      'search_items' => __('Buscar item'),
      'not_found' =>  __('Nenhum item encontrado'),
      'not_found_in_trash' => __('Nenhum item encontrado'),
      'parent_item_colon' => '',
      'menu_name' => 'Ações'
  );
  
  register_post_type( 'acoes', array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'has_archive' => 'acoes',
      // 'menu_icon' => get_bloginfo('template_directory') . '/img/post-type_star.png',  // Icon Path
      'menu_icon' => 'dashicons-megaphone',
      'rewrite' => array(
       'slug' => 'acoes',
       'with_front' => false,
      ),
      'capability_type' => 'page',
      'has_archive' => true,
      'hierarchical' => false,
      'menu_position' => 5,
      'register_meta_box_cb' => 'oferecemos_meta_box',  
      'supports' => array('title', 'editor', 'thumbnail')
      )
  );
}

?>