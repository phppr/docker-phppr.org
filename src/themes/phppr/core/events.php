<?php

function phppr_events() {
    $events = new Odin_Post_Type(
        'Eventos',
        'events'
    );

    $events->set_labels(
        array(
            'name' => __( 'Eventos', 'odin' ),
            'menu_name' => __( 'Eventos', 'odin' ),
            'singular_name' => __( 'Evento', 'odin' ),
            'add_new' => __( 'Adicionar novo', 'odin' ),
            'add_new_item' => __( 'Adicionar novo', 'odin' ),
        )
    );

    $events->set_arguments(
        array(
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'menu_icon' => 'dashicons-calendar',
            'rewrite' => array('slug')
        )
    );
}

add_action( 'init', 'phppr_events', 1 );


function events_metabox() {
    $events_metabox = new Odin_Metabox(
        'events',
        'Mais detalhes do Evento',
        'events',
        'normal',
        'high'
    );

    $events_metabox->set_fields(
        array(
            array(
                'id' => 'event_date',
                'label' => __( 'Data do evento', 'odin' ),
                'type' => 'input',
                'add_column'  => true,
                'attributes' => array(
                    'type' => 'date'
                )
            ),
            array(
                'id' => 'event_hours',
                'label' => __( 'Horário do evento', 'odin' ),
                'type' => 'text',
                'add_column'  => true,
                'attributes' => array(
                    'placeholder' => __( 'ex: 09:00 às 12:00' )
                )
            ),
            array(
                'id' => 'event_location',
                'label' => __( 'Local onde acontecerá o evento', 'odin' ),
                'type' => 'text',
                'add_column'  => true,
                'attributes' => array(
                    'placeholder' => __( 'ex: Av. Cândido de Abreu, 381, Curitiba' )
                )
            ),
            array(
                'id' => 'event_url',
                'label' => __( 'URL/Link do evento', 'odin' ),
                'type' => 'text',
                'attributes' => array(
                    'placeholder' => __( 'ex: https://www.meetup.com/PHPPR/events/1234556/' )
                )
            ),
            // array(
            //     'id' => 'event_description',
            //     'label' => __( 'Breve descrição do evento', 'odin' ),
            //     'type' => 'textarea',
            //     'attributes'  => array(
            //         'placeholder' => __( 'ex. Evento sobre programação PHP para a internet das coisas :D' )
            //     )
            // )
        )
    );

    if(isset($_POST["event_date"])) {
        $postId = $_POST['post_ID'];
        $event_as_timestamp = strtotime($_POST["event_date"]);

        add_post_meta($postId, "event_timestamp_date" );
        update_post_meta($postId, "event_timestamp_date", $event_as_timestamp );
    }
}

add_action( 'init', 'events_metabox', 1 );
