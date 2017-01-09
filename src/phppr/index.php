<?php get_header(); ?>

    <div class="row">
        <div class="container">
            <div class="col-md-8 col-xs-12">
                <div class="row">
                    <div id="destaque" class="col-md-12 col-sm-12 colxs-12">
                        <div class="col-md-6 col-xs-6">
                            <a href="#" class="thumbnail">
                                <img alt="" src="<?php echo get_template_directory_uri(); ?>/assets/img/php-conference-brasil.jpg">
                            </a>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <h2>PHP Conference 2016</h2>
                            <p>Em 2016, a PHP Conference Brasil terá espaço para você acampar: O PHP Camping Esta iniciativa já foi um sucesso em 2015 e por isso estamos repetindo neste ano. Dias para acampar: 7, 8, 9 e 10 de Dezembro (entrada a partir de
                                quarta-feira, às 12h00, e saída no sábado, às 17h00).</p>
                        </div>
                    </div>
                </div>
                <div id="artigo" class="row">
                    <div class="container">
                        <h2>Últimos Artigos</h2>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/silex.jpg" alt="...">
                            <div class="caption">
                                <h4>Gerando notificações push com pushbullet e silex</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-composer-transparent.png" alt="...">
                            <div class="caption">
                                <h4>Utilizando o composer: Install vs update</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/php7.png" alt="...">
                            <div class="caption">
                                <h4>PHP7: até 9 vezes mais rápido que o PHP 5.6</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="sidebar" class="col-xs-12 col-md-4 pull-right">
                <div class="col-md-12">
                    <h3>Eventos</h3>
                </div>
                <div class="event col-md-12">
                    <h4>
                        <span class="span-label label label-primary">08 de Julho</span>
                    </h4>
                    <h5>FISL 17</h5>
                    <p>Fórum Internacional de Software Livre<br>Porto Alegre-RS</p>
                </div>
                <div class="event col-md-12">
                    <h4>
                        <span class="span-label label label-primary">18 de Setembro</span>
                    </h4>
                    <h5>Alagoas Dev Day</h5>
                    <p>Fórum Internacional de Software Livre<br>Maceió-AL</p>
                </div>
                <div class="event col-md-12">
                    <h4>
                        <span class="span-label label label-primary">15 de Maio</span>
                    </h4>
                    <h5>Dev Camp</h5>
                    <p>Conf. dos desenvolvedores de Campinas.<br>Campinas-SP</p>
                </div>
                <br>
                <br>
                <div id="link-event" class="col-md-12">
                    <a href="#">Listar mais eventos...</a>
                </div>
            </div>
        </div>
    </div>

    <section class="conteudo">
        <div class="container">
            <div class="col-md-12 col-xs-4">
                <h4 class="titulo-org">Parceiros:</h4>
                <div class="row">
                    <ul class="logos-org">
                        <li>
                            <a target="_blank" href="#">
                                <img alt="ABRAPHP" class="col-md-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/abraphp.png">
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="#">
                                <img alt="Loja PHP" class="col-md-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/lojaphp.png">
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/casadocodigo.png" class="col-md-2" alt="Casa do Código">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
