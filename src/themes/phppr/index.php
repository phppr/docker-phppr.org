<?php get_header(); ?>

<section class="section container">
    <h2 class="section__title section__title--cast">
        <a href="#">Próximos Eventos</a>
    </h2>

    <div class="card">
        <div class="row">
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
            <?php else: ?>
                <p>Nenhum evento por aqui... </p>
            <?php endif ?>
        </div>
        <a href="#" class="card__view-all">Ver todos</a>
    </div>
</section>

<section class="section container">
    <h2 class="section__title section__title--cast"><a href="#">Artigos da comunidade</a></h2>

    <div class="card">
        <div class="row">
            <?php $query = new WP_Query( 'posts_per_page=4' ); ?>
            <?php if ( $query->have_posts() ): ?>
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
            <?php endif; ?>
        </div>
        <a href="#" class="card__view-all">Ver todos</a>
    </div>
</section>

<section class="section container">
    <div class="row">
        <div class="col-md-6">
            <h2 class="section__title section__title--cast"><a href="#">Avisos</a></h2>

            <div class="card card--notifications">
                <?php
                    $args = array( 'post_type' => 'notifications', 'posts_per_page' => 4 );
                    $loop = new WP_Query( $args );
                ?>
                <?php if( $loop->have_posts() ): ?>
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <article class="article">
                        <header class="article__heading">
                            <h2 class="article__title">
                                <a href="<?php the_permalink() ?>" title="<?php the_title() ?>"><?php the_title() ?></a>
                            </h2>
                        </header>
                    </article>
                <?php endwhile; ?>
                <?php else: ?>
                    <p>Nenhum aviso por aqui... </p>
                <?php endif ?>
            </div>
        </div>
        <div class="col-md-6">
            <?php get_template_part( 'inc/twitter-iframe' ) ?>
        </div>
    </div>
</section>

<section class="section section--featured">
    <div class="container">
        <?php $members = get_users(); ?>
        <h2 class="section__title"><a href="#"><?php echo count($members); ?> Membros </a></h2>

        <ul class="member-list list-unstyled">
            <?php foreach($members as $member):
                $github_username = get_user_meta( $member->ID, 'github_username', true);
                $twitter_username = get_user_meta( $member->ID, 'twitter_username', true);
                $github_url = get_user_meta( $member->ID, 'github_url', true);
                $member_url = ($github_url) ? $github_url : $member->user_url;
            ?>
                <li class="member-list__item">
                    <a href="<?php echo $member_url ?>" target="_blank">
                        <img src="<?php echo get_avatar_url($member->user_email, array('size' => 140)) ?>" alt="Foto do perfil de <?php echo $member->display_name ?>" class="img-rounded">
                    </a>

                    <?php if($github_username): ?>
                        <span>
                            <i class="icon icon-github"></i>
                            <a href="https://github.com/<?php echo $github_username ?>" target="_blank">
                                /<?php echo $github_username ?>
                            </a>
                        </span>
                    <?php endif; ?>

                    <?php if($twitter_username): ?>
                        <span>
                            <i class="icon icon-twitter"></i>
                            <a href="https://twitter.com/<?php echo $twitter_username ?>" target="_blank">
                                @<?php echo $twitter_username ?>
                            </a>
                        </span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="clearfix"></div>

        <?php if (!is_user_logged_in()): ?>
            <div class="col-md-12 text-center">
                <div class="sp"></div>
                <a href="<?php echo site_url('/wp-admin/admin-ajax.php?action=github_oauth_redirect'); ?>" class="btn btn-primary btn-lg btn-round btn-ghost">
                    <i class="icon icon-github"></i> Quero participar
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="section section--featured section--bg text-center">
    <div class="container">
        <h3 class="section__subtitle">Quer contribur com projetos open sources e participar de eventos no Paraná?</h3>
        <a href="<?php echo get_permalink( get_page_by_path( 'como-contribuir-para-a-phppr' ) ) ?>" class="btn btn-white btn-lg btn-round btn-ghost">
            Contribuir com a PHP Paraná
        </a>
    </div>
</section>

<?php get_footer(); ?>
