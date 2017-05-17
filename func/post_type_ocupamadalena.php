<?php
add_action( 'init', 'post_type_ocupamadalena' );
function post_type_ocupamadalena() {

  $labels = array(
      'name' => _x('Ocupa Madalena - História', 'ocupa-madalena'),
      'singular_name' => _x('Ocupa Madalena', 'ocupa-madalena'),
      'add_new' => _x('Adicionar página', 'ocupa-madalena'),
      'add_new_item' => __('Adicionar página'),
      'edit_item' => __('Editar'),
      'new_item' => __('Novo página'),
      'all_items' => __('História'),
      'view_item' => __('Ver página'),
      'search_items' => __('Buscar páginas'),
      'not_found' =>  __('Nenhuma páginas encontrado'),
      'not_found_in_trash' => __('Nenhuma páginas encontrado'),
      'parent_item_colon' => '',
      'menu_name' => 'Ocupa Madalena'
  );
  
  register_post_type( 'ocupa-madalena', array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'menu_icon' => 'dashicons-star-filled',
      'rewrite' => array(
       'slug' => 'ocupa-madalena',
       'with_front' => false,
      ),
      'capability_type' => 'post',
      'has_archive' => true,
      'hierarchical' => false,
      'menu_position' => 5,
      'register_meta_box_cb' => 'ocupamadalena_meta_box',  
      'supports' => array('title', 'editor', 'thumbnail' )
      )
  );
}

?>