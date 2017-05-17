<?php
add_action( 'init', 'post_type_informativos' );
function post_type_informativos() {

  $labels = array(
      'name' => _x('Biblioteca - Informativos Fazendo Gênero', 'informativos'),
      'singular_name' => _x('Informativos', 'informativos'),
      'add_new' => _x('Adicionar item', 'informativos'),
      'add_new_item' => __('Adicionar item'),
      'edit_item' => __('Editar'),
      'new_item' => __('Novo item'),
      'all_items' => __('Todos os itens'),
      'view_item' => __('Ver item'),
      'search_items' => __('Buscar item'),
      'not_found' =>  __('Nenhum item encontrado'),
      'not_found_in_trash' => __('Nenhum item encontrado'),
      'parent_item_colon' => '',
      'menu_name' => 'Informativos'
  );
  
  register_post_type( 'informativos', array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'rewrite' => array(
       'slug' => 'informativos',
       'with_front' => false,
      ),
      'capability_type' => 'post',
      'has_archive' => true,
      'hierarchical' => false,
      'register_meta_box_cb' => 'informativos_meta_box',  
      'supports' => array('title', 'editor')
      )
  );
}

?>