<?php

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
    show_admin_bar(false);
}

function user_information_meta() {
    $information_meta = new Odin_User_Meta(
        'additional_information',
        __('Additional Information', 'odin')
    );

    $information_meta->set_fields(
        array(
            array(
                'id' => 'github_url',
                'label' => __( 'Github URL profile', 'odin' ),
                'type' => 'text'
            ),
            array(
                'id' => 'github_username',
                'label' => __( 'Github username', 'odin' ),
                'type' => 'text'
            )
        )
    );
}

add_action( 'init', 'user_information_meta', 1 );
