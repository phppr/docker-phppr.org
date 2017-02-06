<?php get_header(); ?>

<div class="container">

    <section class="featured">
        <h2 class="featured__title"><a href="#">Últimos Eventos</a></h2>

        <div class="card">
            <div class="row">
                <?php for ($i = 1; $i <= 3; $i++): ?>
                <article class="col-md-4">
                    <div class="article">
                        <!--<figure class="article__thumb">
                            <a href="#"><img src="//placehold.it/350x250" alt="" class="img-responsive"></a>
                        </figure>-->
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
                        <div class="article__content">
                            <p>Nisi dolor ad culpa amet fugiat culpa. Excepteur pariatur sunt aute elit in aute. Nulla adipisicing tempor Lorem...
                            <a href="#">[Continue lendo]</a></p>
                        </div>
                    </div>
                </article>
                <?php endfor; ?>
            </div>
            <a href="#" class="card__view-all">Ver todos</a>
        </div>
    </section>

    <section class="featured">
        <h2 class="featured__title"><a href="#">Artigos da comunidade</a></h2>

        <div class="card">
            <div class="row">
                <?php for ($i = 1; $i <= 6; $i++): ?>
                <article class="col-md-4">
                    <div class="article">
                        <figure class="article__thumb">
                            <a href="#">
                                <!--<img src="//placehold.it/350x250" alt="" class="img-responsive">-->
                                <!--<img src="//lorempixel.com/350/250/technics" alt="300" class="img-responsive">-->
                            </a>
                        </figure>
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
                        <div class="article__content">
                            <p>Nisi dolor ad culpa amet fugiat culpa. Excepteur pariatur sunt aute elit in aute. Nulla adipisicing tempor Lorem...
                            <a href="#">[Continue lendo]</a></p>
                        </div>
                    </div>
                </article>
                <?php endfor; ?>
            </div>
            <a href="#" class="card__view-all">Ver todos</a>
        </div>
    </section>

    <section class="featured">
        <div class="row">
            <div class="col-md-6">
                <h2 class="featured__title"><a href="#" target="_blank">Avisos</a></h2>

                <div class="card">
                    <?php for ($i = 1; $i <= 2; $i++): ?>
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
                <h2 class="featured__title"><a href="https://twitter.com/search?q=%23phppr&ref_src=twsrc%5Etfw" target="_blank">#HashTag</a></h2>

                <div class="card">
                    <a class="twitter-timeline"  href="https://twitter.com/hashtag/phppr" data-widget-id="828410097332281344">phppr Tweets</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>
