<?php

// ========================================//
// CRIAR POST TYPE
// ========================================// 
function create_askme_postype() {

    $labels = array(
      'name' => _x('Dúvidas', 'askme'),
      'singular_name' => _x('Dúvidas', 'askme'),
      'add_new' => _x('Adicionar dúvida', 'askme'),
      'add_new_item' => __('Adicionar dúvida'),
      'edit_item' => __('Editar'),
      'new_item' => __('Nova dúvida'),
      'all_items' => __('Todas as dúvidas'),
      'view_item' => __('Ver dúvidas'),
      'search_items' => __('Buscar dúvidas'),
      'not_found' =>  __('Nenhum item encontrado'),
      'not_found_in_trash' => __('Nenhum item encontrado'),
      'parent_item_colon' => '',
      'menu_name' => 'Transas responde'
    );

    $args = array(
        'label' => __('Dúvidas'),
        'labels' => $labels,
        'public' => false,
        'can_export' => true,
        'show_ui' => true,
        'menu_position' => 5,
        '_builtin' => false,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-format-chat',
        'hierarchical' => false,
        'rewrite' => array( "slug" => "askme" ),
        'supports'=> array('title', 'editor'),
        'show_in_nav_menus' => true,
        'show_in_menu' => false
    );

    register_post_type( 'askme', $args);
}

add_action( 'init', 'create_askme_postype' );


// ========================================//
// PLACEHOLDER TITLE
// ========================================// 
function askme_title_placeholder( $title ){

    $screen = get_current_screen();

    if ( 'askme' == $screen->post_type ){
        $title = __('Pergunte ao Transas');
    }

    return $title;
}

add_filter( 'enter_title_here', 'askme_title_placeholder' );



// ========================================//
// SHORTCODE MOSTRA PERGUNTAS
// ========================================// 
function show_asks() {
    
    askme_output_normal();
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
add_shortcode('askme', 'show_asks');


// ========================================//
// SHORTCODE TODOS
// ========================================// 
function mostra_area_ask() {
    ob_start();

    echo "<p>&nbsp;</p>";

    echo do_shortcode( '[askme_form]' );
    echo do_shortcode( '[askme]' );

    $output = ob_get_clean();
    return $output;
}
add_shortcode('area-perguntas-respostas', 'mostra_area_ask');


// ========================================//
// SHORTCODE MOSTRA FORM
// ========================================// 
function show_asks_form() {


    ob_start();

    // wp_enqueue_style( 'askme', plugins_url('askme.css',__FILE__) );

    if( 'POST' == $_SERVER['REQUEST_METHOD']
        && !empty( $_POST['action'] )
        && $_POST['post_type'] == 'askme' && $_POST['question'] != "")
    {
        if ($isCaptcha && $_POST["recaptcha_response_field"])
        {
            $resp = recaptcha_check_answer ($privatekey,
                $_SERVER["REMOTE_ADDR"],
                $_POST["recaptcha_challenge_field"],
                $_POST["recaptcha_response_field"]);

            if ($resp->is_valid) {

                $title =  $_POST['question'];

                $post = array(
                    'post_title'    => $title,
                    'post_status'   => 'draft',
                    'post_type'     => 'askme'
                );

                $id = wp_insert_post($post);

                echo "<div class='alert success'>".__('Dúvida enviada com sucesso. Em breve respondemos.')."</div>";

                if(isset($_POST['username']))
                {
                    add_post_meta($id, 'askme_username', $_POST['username']);
                }
                if(isset($_POST['email']))
                {
                    add_post_meta($id, 'askme_email', $_POST['email']);
                }

                if(get_option('askme_setting_email') == true)
                {
                    $mailtext = __('Nova dúvida recebida');

                    $admin_email = get_option('admin_email');
                    wp_mail( $admin_email,  $mailtext, "Dúvida: ".$title);
                }

            }
            else
            {
                $error = $resp->error;
                echo "<div class='alert danger'>".__('Sua dúvida não foi enviada. Tente novamente.')."</div>";
            }
        }
        else if(!$isCaptcha)
        {
            $title =  $_POST['question'];

            $post = array(
                'post_title'    => $title,
                'post_status'   => 'draft',
                'post_type'     => 'askme'
            );

            $id = wp_insert_post($post);

            echo "<div class='alert success'>".__('Dúvida enviada com sucesso. Em breve respondemos.')."</div>";

            if(isset($_POST['username']))
            {
                add_post_meta($id, 'askme_username', $_POST['username']);
            }
            if(isset($_POST['email']))
            {
                add_post_meta($id, 'askme_email', $_POST['email']);
            }

            if(get_option('askme_setting_email') == true)
            {
                $mailtext = __('Nova dúvida recebida');

                $admin_email = get_option('admin_email');
                wp_mail( $admin_email,  $mailtext, "Dúvida: ".$title);
            }
        }
        else
        {
            echo "<div class='alert danger'>".__('Sua dúvida não foi enviada. Tente novamente.')."</div>";
        }
    }
    else if('POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['question'] == "")
    {
        echo "<div class='alert danger'>".__('Sua dúvida não foi enviada. Digite novamente sua pergunta.')."</div>";
    }
    ?>

    <?php /*?><div id="area-form-askme">
        <form id="newask" name="newask" method="post" action="">

            <!-- <label for="question" id="questionLabel"><?php _e('Escreva a sua dúvida'); ?></label><br /> -->
            <textarea id="question" value="" tabindex="1" size="20" name="question"></textarea>

            <br>

            <?php
            if(get_option('askme_setting_user_response') == true)
            {
                echo display_userdatafields();
            }
            ?>

            <input type="submit" value="Enviar" tabindex="6" id="submit" name="submit" />

            <input type="hidden" name="post_type" id="post_type" value="askme" />
            <input type="hidden" name="action" value="post" />
            <?php wp_nonce_field( 'new-post' ); ?>
            <?php
            if($isCaptcha)
            {
                ?>
            <div id="captcha-div">
            <?php echo recaptcha_get_html($publickey, $error); ?>
            </div>
            <script>
                jQuery( "#question" ).focus(function() {
                    if ( jQuery( "#captcha-div" ).is( ":hidden" ) ) {
                        jQuery( "#captcha-div" ).slideDown( "slow" );
                    }
                });
            </script>
            <?php } ?>
        </form>
    </div><?php */?>
    <?php

    return $output;
}
add_shortcode('askme_form', 'show_asks_form');



// ========================================//
// LAYOUT FORM OPCIONAL PARA MOSTRAR USER
// ========================================// 
function display_userdatafields()
{
    ob_start(); ?>

    <div>
        <div id="usernameDiv">
            <div id="usernamelabel"><b><label for="username"><?php _e('Nome'); ?></label></b></div>
            <div id="usernameinput"><input type="text" id="username" value="" tabindex="1" size="20" name="username" /></div>
        </div>
        <div id="useremailDiv">
            <div id="useremaillabel"><b><label for="email"><?php _e('Email'); ?></label></b></div>
            <div id="useremailinput"><input type="email" id="email" value="" tabindex="1" size="20" name="email" /></div>
            <div id="emailmsg"><?php _e('Se você inserir seu e-mail, receberá notificação de sua resposta.'); ?></div>
        </div>
    </div>

    <?php $output = ob_get_contents();
    ob_end_clean();
    return $output;
}


// ========================================//
// LAYOUT PERGUNTAS / RESPOSTAS
// ========================================// 
function askme_output_normal()
{
        
        echo "<h2>Respostas (";
        $total = wp_count_posts('askme')->publish;
        echo $total;
        echo ")</h2>";
        echo "<div class='respostas'>";

        global $wp_query;
        
        if ( get_query_var('paged') ) {
            $paged = get_query_var('paged');
        } else if ( get_query_var('page') ) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        $args = array(
            'post_type' => 'askme',
            'post_status' => 'publish',
            'paged' => $paged,
            'orderby' => 'date',
            'posts_per_page' => get_option( 'askme_setting_number_askmes', 5 )
        );

        query_posts($args);

        while ( have_posts() ) : the_post(); ?>

            <div class="pergunta"><?php the_title(); ?></div>
            <div class="resposta"><?php the_content(); ?></div>


        <?php endwhile; ?>

        </div> <!-- respostas -->
        <?php askme_pagination($wp_query->max_num_pages); ?>

    <?php
    wp_reset_query();
}



// ========================================//
// ADICIONAR CAMPOS NO PAINEL
// ========================================// 
function add_askme_columns($askme_columns) {
    $new_columns['cb'] = '<input type="checkbox" />';
    $new_columns['date'] = __('Data');
    $new_columns['title'] = __('Dúvida');
    $new_columns['answer'] = __('Resposta');
    $new_columns['username'] = __('Usuário');
    $new_columns['email'] = __('Contato');

    return $new_columns;
}

add_filter('manage_edit-askme_columns', 'add_askme_columns');

add_action('manage_askme_posts_custom_column', 'manage_askme_columns', 10, 2);

function manage_askme_columns($column_name, $id) {
    $customs = get_post_custom($id);

    switch ($column_name) {
        case 'id':
            echo $id;
            break;
        case 'username':
            if(isset($customs['askme_username']))
            {
                foreach( $customs['askme_username'] as $key => $value)
                    echo $value;
            }
            break;
        case 'email':
            if(isset($customs['askme_email']))
            {
                foreach( $customs['askme_email'] as $key => $value)
                    echo $value;
            }
            break;
        case 'answer':
            echo get_the_content($id);
            break;
        default:
            break;
    }
}


// ========================================//
// LAYOUT PAGINACAO
// ========================================// 
function askme_pagination($pages = '', $range = 5)
{
    $showitems = ($range * 2)+1;

    global $paged;

    if ( get_query_var('paged') ) {
        $paged = get_query_var('paged');
    } else if ( get_query_var('page') ) {
        $paged = get_query_var('page');
    } else {
        $paged = 1;
    }

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;

        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
        ?>
        

        <div class='paginacao'>
            <?php
            if($paged > 2 && $paged > $range+1 && $showitems < $pages)
            { ?>

                <a href="<?php echo get_pagenum_link(1); ?>">&laquo;</a>

            <?php }

            if($paged > 1)
            { ?>
                <a href="<?php echo get_pagenum_link($paged - 1); ?>">&lsaquo;</a>
            <?php }

            for ($i=1; $i <= $pages; $i++)
            {
                if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
                {
                    if ($paged == $i)
                    { ?>
                        <span class="current"><?php echo $i; ?></span>
                    <?php }
                    else
                    { ?>
                        <a href="<?php echo get_pagenum_link($i); ?>" class="inactive"><?php echo $i; ?></a>
                    <?php }
                }
            }

            if ($paged < $pages)
            { ?>
                <a href="<?php echo get_pagenum_link($paged + 1); ?>">&rsaquo;</a>
            <?php }
            if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages)
            { ?>
                <a href="<?php echo get_pagenum_link($pages); ?>">&raquo;</a>
            <?php }
            ?>

            <span class='inicio'><?php echo __('Página'); ?> <?php echo $paged; ?> <?php echo __('de');?> <?php echo $pages; ?></span>
        </div>

        <?php
    }
}


// ========================================//
// ESTATISTICAS NO PAINEL
// ========================================// 



// function askme_stats() {
/* ?>
    <h4><span class="dashicons dashicons-editor-help" style="display: inline-block; font-size: 19px; line-height: 18px; height: auto; padding: 0; "></span> <strong>Painel de dúvidas</strong></h4>
    <ul>
        <li class="post-count">
            <?php
            $type = 'askme';
            $args = array(
                'post_type' => $type,
                'post_status' => 'publish',
                'posts_per_page' => -1);

            $my_query = query_posts( $args );
            ?>
            
            <?php if(count($my_query) == 1) {
                echo "<a href='edit.php?post_type=askme&post_status=publish'>";
                echo count($my_query);
                echo " dúvida respondida</a>";
            } ?>

            <?php if(count($my_query) > 1) {
                echo "<a href='edit.php?post_type=askme&post_status=publish'>";
                echo count($my_query);
                echo " dúvidas respondidas</a>";
            } ?>
        </li>
        <li class="comment-count">
            <?php
            $args = array(
                'post_type' => $type,
                'post_status' => 'draft',
                'posts_per_page' => -1);

            $my_query = query_posts( $args );
            ?>

            <?php if(count($my_query) == 1) {
                echo "<a href='edit.php?post_type=askme&post_status=draft'>";
                echo count($my_query);
                echo " dúvida aguardando</a>";
            } ?>

            <?php if(count($my_query) > 1) {
                echo "<a href='edit.php?post_type=askme&post_status=draft'>";
                echo count($my_query);
                echo " dúvidas aguardando</a>";
            } ?>
        </li>
    </ul>
<?php
    wp_reset_query(); */
// }
// add_action('activity_box_end', 'askme_stats');



// ========================================//
// CONFIG NA AREA DE LEITURA
// ========================================// 
function askme_settings_init() {

    add_settings_section(
        'askme_setting_section',
        __('Configurações de "Perguntas e respostas"'),
        'askme_setting_section_callback',
        'reading'
    );

    add_settings_field(
        'askme_setting_email',
        __('Notificação de nova dúvida'),
        'askme_setting_callback',
        'reading',
        'askme_setting_section'
    );

    register_setting( 'reading', 'askme_setting_email' );

    add_settings_field(
        'askme_setting_number_askmes',
        __('Perguntas por página'),
        'askme_number_callback',
        'reading',
        'askme_setting_section'
    );

    register_setting( 'reading', 'askme_setting_number_askmes' );

    add_settings_field(
        'askme_setting_user_response',
        __('Campos de nome e e-mail'),
        'askme_setting_user_response_callback',
        'reading',
        'askme_setting_section'
    );

    register_setting( 'reading', 'askme_setting_user_response' );
 }

 add_action( 'admin_init', 'askme_settings_init' );


function askme_setting_callback() {
    echo '<input name="askme_setting_email" id="gv_thumbnails_insert_into_excerpt" type="checkbox" value="1" class="code" ' . checked( 1, get_option( 'askme_setting_email' ), false ) . ' />';
}


function askme_setting_user_response_callback() {
    echo '<input name="askme_setting_user_response" id="gv_thumbnails_insert_into_excerpt" type="checkbox" value="1" class="code" ' . checked( 1, get_option( 'askme_setting_user_response' ), false ) . ' />' . __('Ao habilitar campos de nome e e-mail, o usuário receberá notificação da resposta por e-mail');
}

function askme_number_callback() {
    echo '<input name="askme_setting_number_askmes" id="gv_thumbnails_insert_into_excerpt" type="text" class="code" value="' . get_option( 'askme_setting_number_askmes', 5 ) . '" />
        <p class="description">' . __('Quantas questões deve aparecer por página') . "</p>";
}

add_action( 'admin_menu', 'add_user_menu_bubble' );


// ========================================//
// NOTIFICACAO DE NOVA DUVIDA NO MENU
// ========================================// 
function add_user_menu_bubble() {

    global $menu;

    foreach ( $menu as $key => $value ) {
        if ( $menu[$key][2] == 'edit.php?post_type=acoes' ) {

            $type = 'askme';
            $args = array(
                'post_type' => $type,
                'post_status' => 'draft',
                'posts_per_page' => -1);

            $my_query = query_posts( $args );
            if(count($my_query) == 1)
            {
                $menu[$key][0] .= ' <span class="update-plugins"><span class="plugin-count"><!-- <span class="dashicons dashicons-editor-help" style="display: inline-block; font-size: 13px; line-height: 17px; width: 15px; height: auto; padding: 0; "></span>-->' . count($my_query) . ' DÚVIDA</span></span> ';
            }
            if(count($my_query) > 1)
            {
                $menu[$key][0] .= ' <span class="update-plugins"><span class="plugin-count"><!-- <span class="dashicons dashicons-editor-help" style="display: inline-block; font-size: 13px; line-height: 17px; width: 15px; height: auto; padding: 0; "></span>-->' . count($my_query) . ' DÚVIDAS</span></span> ';
            }
            wp_reset_query();
            return;
        }
    }

}


// ========================================//
// NOTIFICACAO A PESSOA QUE PERGUNTOU
// ========================================// 
function publish_askme_hook($id)
{
    $customs = get_post_custom($id);
    if(isset($customs['askme_email']))
        wp_mail( $customs['askme_email'],  get_bloginfo('name').__(' - [ Transas Responde ]'), __('Sua dúvida respondida'));
}

add_action( 'publish_askme', 'publish_askme_hook' );
?>