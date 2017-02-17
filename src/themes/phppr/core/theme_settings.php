<?php

function phppr_theme_settings() {
    $settings = new Odin_Theme_Options(
        'phppr-settings',
        'Theme Settings',
        'manage_options'
    );

    $settings->set_tabs(
        array(
            array(
                'id' => 'phppr_general',
                'title' => __( 'General Settings', 'phppr' ),
            ),
            array(
                'id' => 'phppr_social',
                'title' => __( 'Social', 'odin' )
            ),
            array(
                'id' => 'phppr_github_tokens',
                'title' => __( 'Github Tokens', 'odin' )
            )
        )
    );

    $settings->set_fields(
        array(
            'phppr_general_fields_section' => array(
                'tab'   => 'phppr_general',
                'title' => __( 'Section Example', 'odin' ),
                'fields' => array(
                    array(
                        'id'    => 'test_text',
                        'label' => __( 'Test Text', 'odin' ),
                        'type'  => 'text'
                    )
                )
            ),
            'phppr_social_fields_section' => array(
                'tab'   => 'phppr_social',
                'title' => __( 'Social', 'odin' ),
                'fields' => array(
                    array(
                        'id'    => 'phppr_github',
                        'label' => __( 'Github:', 'odin' ),
                        'type'  => 'text'
                    ),
                    array(
                        'id'    => 'phppr_twitter',
                        'label' => __( 'Twitter:', 'odin' ),
                        'type'  => 'text'
                    ),
                    array(
                        'id'    => 'phppr_slack',
                        'label' => __( 'Slack:', 'odin' ),
                        'type'  => 'text'
                    ),
                    array(
                        'id'    => 'phppr_facebook',
                        'label' => __( 'Facebook:', 'odin' ),
                        'type'  => 'text'
                    )
                )
            ),
            'phppr_github_fields_section' => array(
                'tab'   => 'phppr_github_tokens',
                'title' => __( 'Github Tokens', 'odin' ),
                'fields' => array(
                    array(
                        'id'    => 'github_app_name',
                        'label' => __( 'Github App name:', 'odin' ),
                        'type'  => 'text'
                    ),
                    array(
                        'id'    => 'github_key',
                        'label' => __( 'Github Key:', 'odin' ),
                        'type'  => 'text'
                    ),
                    array(
                        'id'    => 'github_secret',
                        'label' => __( 'Github Secret:', 'odin' ),
                        'type'  => 'text'
                    )
                )
            )
        )
    );
}

add_action( 'init', 'phppr_theme_settings', 1 );
