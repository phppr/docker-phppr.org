<?php get_header(); ?>

<?php
    $args = array(
        'post_type' => 'events',
        'posts_per_page' => 3,
        'meta_key' => 'event_timestamp_date',
        'orderby' => 'meta_value',
        'order' => 'ASC'
    );
    $events = new WP_Query( $args );
?>
<?php if( $events->have_posts() ): ?>
    <section class="section container">
        <h2 class="section__title">Próximos Eventos</h2>

        <div class="card">
            <div class="row">
                <?php while ( $events->have_posts() ) : $events->the_post(); ?>
                    <?php
                        $date = get_post_meta( $post->ID, 'event_date', true );
                        $hour = get_post_meta( $post->ID, 'event_hours', true );
                        $location = get_post_meta( $post->ID, 'event_location', true );
                        // $description = get_post_meta( $post->ID, 'event_description', true );

                        $timestamp_date = get_post_meta( $post->ID, 'event_timestamp_date', true );
                        $timestamp_now = strtotime(date('Y-m-d'));

                        // $isRealized = ($timestamp_now >= $timestamp_date) ? true : false;
                        if($timestamp_date >= $timestamp_now):
                        ?>
                        <article class="col-md-4">
                            <div class="article">
                                <header class="article__heading">
                                    <h2 class="article__title">
                                        <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a>
                                    </h2>
                                    <div class="article__meta">
                                        <span><?php if($date) {
                                            echo "<i class='icon icon-calendar'></i> " . date("d/m/Y", strtotime($date));
                                        } ?></span>
                                        <span><?php if($date && $hour) { echo '|'; } ?></span>
                                        <span><?php if($hour) {
                                            echo "<i class='icon icon-clock-o'></i> " . $hour;
                                        } ?></span>
                                        <span><?php if($location) { echo '|'; } ?></span>
                                        <span><?php if($location) {
                                            echo  "<a href='http://maps.google.com/?q={$location}' target='_blank'><i class='icon icon-map-marker'></i> {$location}</a>";
                                        } ?></span>
                                    </div>
                                </header>
                                <?php /*
                                <div class="article__content">
                                    <p>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
                                            <?php echo odin_excerpt( 'excerpt', 10 ) ?> [Continue lendo]
                                        </a>
                                    </p>
                                </div>
                                */ ?>
                            </div>
                        </article>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
            <a href="<?php echo esc_url( home_url( '/events' ) ); ?>" class="card__view-all">Ver todos</a>
        </div>
    </section>
<?php else: ?>
    <p>Nenhum evento por aqui... </p>
<?php endif ?>

<?php $query = new WP_Query( 'posts_per_page=4' ); ?>
<?php if ( $query->have_posts() ): ?>
    <section class="section container">
        <h2 class="section__title">Artigos da comunidade</h2>

        <div class="card">
            <div class="row">
                <?php while ( $query->have_posts() ): $query->the_post(); ?>
                    <?php $image = odin_get_image_url( $post->ID, '250', '150' ); ?>
                    <article class="col-md-3">
                        <div class="article">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="article__thumb">
                                <figure>
                                    <?php if($image): ?>
                                        <img src="<?php echo $image ?>" alt="Imagem do artigo <?php the_title(); ?>" class="img-responsive">
                                    <?php endif; ?>
                                </figure>
                            </a>
                            <header class="article__heading">
                                <h2 class="article__title">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="article__meta">
                                    <?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) ) : ?>
                                        <span class="cat-links"><?php echo __( 'Posted in:', 'odin' ) . ' ' . get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'odin' ) ); ?></span>
                                    <?php endif; ?>
                                    <?php the_tags( '<span class="tag-links">' . __( 'Tagged as:', 'odin' ) . ' ', ', ', '</span>' ); ?>
                                    <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
                                        <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'odin' ), __( '1 Comment', 'odin' ), __( '% Comments', 'odin' ) ); ?></span>
                                    <?php endif; ?>
                                </div>
                            </header>
                            <!--<div class="article__content">
                                <p>Nisi dolor ad culpa amet fugiat culpa. Excepteur pariatur sunt aute elit in aute lorem...
                                <a href="#">[Continue lendo]</a></p>
                            </div>-->
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            <a href="#" class="card__view-all">Ver todos</a>
        </div>
    </section>
<?php endif; ?>

<section class="section container">
    <div class="row">
        <div class="col-md-6">
            <h2 class="section__title">Avisos</h2>

            <div class="card card--notifications">
                <?php
                    $args = array( 'post_type' => 'notifications', 'posts_per_page' => 6 );
                    $loop = new WP_Query( $args );
                ?>
                <?php if( $loop->have_posts() ): ?>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <article class="article article--notifications">
                        <header class="article__heading">
                            <h2 class="article__title">
                                <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a>
                            </h2>
                        </header>
                        <p><a href="<?php the_permalink() ?>"><?php echo odin_excerpt( 'excerpt', 10 ) ?> [Continue lendo]</a></p>
                    </article>
                <?php endwhile; ?>
                <?php else: ?>
                    <p>Nenhum aviso por aqui... </p>
                <?php endif ?>
            </div>

            <h2 class="section__title">
                <a href="https://github.com/phppr/vagas" target="_blank">Vagas no Paraná</a>
            </h2>

            <div class="card">
                <ul id="phpprJobs" class="jobs"></ul>
            </div>
        </div>
        <div class="col-md-6">
            <?php get_template_part( 'inc/twitter-iframe' ) ?>
        </div>
    </div>
</section>

<?php get_template_part( 'inc/section-members' ) ?>

<?php get_footer(); ?>
