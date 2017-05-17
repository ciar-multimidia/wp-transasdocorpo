<?php
// de producoes para formacoes feministas, mas sem mudar o slug pra nao perder conteudo
add_action( 'init', 'post_type_producoes' );
function post_type_producoes() {

  $labels = array(
      'name' => _x('Formações Feministas', 'producoes'),
      'singular_name' => _x('Formações Feministas', 'producoes'),
      'add_new' => _x('Adicionar item', 'producoes'),
      'add_new_item' => __('Adicionar item'),
      'edit_item' => __('Editar'),
      'new_item' => __('Novo item'),
      'all_items' => __('Formações Feministas'),
      'view_item' => __('Ver item'),
      'search_items' => __('Buscar item'),
      'not_found' =>  __('Nenhum item encontrado'),
      'not_found_in_trash' => __('Nenhum item encontrado'),
      'parent_item_colon' => '',
      'menu_name' => 'Formações Feministas'
  );
  
  register_post_type( 'producoes', array(
      'labels' => $labels,
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'rewrite' => array(
       'slug' => 'producoes',
       'with_front' => false,
      ),
      'capability_type' => 'post',
      'has_archive' => true,
      'hierarchical' => false,
      'register_meta_box_cb' => 'producoes_meta_box',  
      'supports' => array('title', 'editor')
      )
  );
}

?>