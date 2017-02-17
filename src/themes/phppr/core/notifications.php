<?php

function phppr_notifications() {
    $notifications = new Odin_Post_Type(
        'Avisos',
        'notifications'
    );

    $notifications->set_labels(
        array(
            'name' => __( 'Avisos', 'odin' ),
            'menu_name' => __( 'Avisos', 'odin' ),
            'singular_name' => __( 'Aviso', 'odin' ),
            'add_new' => __( 'Adicionar novo', 'odin' ),
            'add_new_item' => __( 'Adicionar novo', 'odin' ),
        )
    );

    $notifications->set_arguments(
        array(
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'menu_icon' => 'dashicons-megaphone'
        )
    );
}

add_action( 'init', 'phppr_notifications', 1 );
