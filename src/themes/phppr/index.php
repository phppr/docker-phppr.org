<?php get_header(); ?>

<section class="section container">
    <h2 class="section__title"><a href="#">Últimos Eventos</a></h2>

    <div class="card">
        <div class="row">
            <?php for ($i = 1; $i <= 3; $i++): ?>
            <article class="col-md-4">
                <div class="article">
                    <header class="article__heading">
                        <h2 class="article__title">
                            <a href="#">Hangout PHPOO Curitiba</a>
                        </h2>
                        <div class="article__meta">
                            <span>Data: 15/02/2017 | horário: 19:00</span>
                        </div>
                    </header>
                    <div class="article__content">
                        <p><a href="#">Nisi dolor ad culpa amet fugiat culpa. Excepteur pariatur sunt aute elit in aute lorem...
                        [Continue lendo]</a></p>
                    </div>
                </div>
            </article>
            <?php endfor; ?>
        </div>
        <a href="#" class="card__view-all">Ver todos</a>
    </div>
</section>

<section class="section container">
    <h2 class="section__title"><a href="#">Artigos da comunidade</a></h2>

    <div class="card">
        <div class="row">
            <?php for ($i = 1; $i <= 4; $i++): ?>
            <article class="col-md-3">
                <div class="article">
                    <figure class="article__thumb">
                        <a href="#">
                            <!--<img src="//placehold.it/350x250" alt="" class="img-responsive">-->
                            <!--<img src="//lorempixel.com/350/250/technics" alt="300" class="img-responsive">-->
                        </a>
                    </figure>
                    <header class="article__heading">
                        <h2 class="article__title">
                            <a href="#">Article title Aliqua cillum non velit in dolore cillum</a>
                        </h2>
                        <div class="article__meta">
                            <span itemscope="" itemprop="author" itemtype="http://schema.org/Person" class="article__author">
                                <span itemprop="name" class="article__author author vcard">
                                    Author: <a itemprop="url" class="url fn n" href="/?author=1" rel="author">nandomoreira.me </a>
                                </span>
                            </span> |
                            <a href="/?p=19#respond" class="post-comments">3 Comentários</a>
                        </div>
                    </header>
                    <!--<div class="article__content">
                        <p>Nisi dolor ad culpa amet fugiat culpa. Excepteur pariatur sunt aute elit in aute lorem...
                        <a href="#">[Continue lendo]</a></p>
                    </div>-->
                </div>
            </article>
            <?php endfor; ?>
        </div>
        <a href="#" class="card__view-all">Ver todos</a>
    </div>
</section>

<section class="section container">
    <div class="row">
        <div class="col-md-6">
            <h2 class="section__title"><a href="#" target="_blank">Avisos</a></h2>

            <div class="card">
                <?php for ($i = 1; $i <= 3; $i++): ?>
                    <article class="article">
                        <header class="article__heading">
                            <h2 class="article__title">
                                <a href="#">Article title Aliqua cillum non velit in dolore cillum non sit voluptate cillum aute.</a>
                            </h2>
                            <div class="article__meta">
                                <span itemscope="" itemprop="author" itemtype="http://schema.org/Person" class="article__author">
                                    <span itemprop="name" class="article__author author vcard">
                                        Author: <a itemprop="url" class="url fn n" href="/?author=1" rel="author">nandomoreira.me </a>
                                    </span>
                                </span> |
                                <a href="/?p=19#respond" class="post-comments">3 Comentários</a>
                            </div>
                        </header>
                    </article>
                <?php endfor; ?>
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="section__title"><a href="https://twitter.com/search?q=%23phppr&ref_src=twsrc%5Etfw" target="_blank">#HashTag</a></h2>

            <div class="card">
                <a class="twitter-timeline"  href="https://twitter.com/hashtag/phppr" data-widget-id="829118890106093569">phppr Tweets</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
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
                            <a href="https://github.com/<?php echo $github_username ?>" target="_blank">
                                <i class="icon icon-github"></i>/<?php echo $github_username ?>
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
        <a href="http://github.com/phppr/" target="_blank" class="btn btn-white btn-lg btn-round btn-ghost">Contribuir com a PHP Paraná</a>
    </div>
</section>

<?php get_footer(); ?>
