<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title>phppr.net - Grupo de Desenvolvedores PHP do Paraná</title>
        <?php wp_head(); ?>
    </head>
    <body>
        <header>
            <nav role="navigation" class="navbar navbar-default fixed-nav" id="nav">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-xs-4 col-sm-4 page-scroll">
                            <div class="col-md-4">
                                <a href="#" class="logo">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/elefante.png">
                                </a>
                            </div>
                            <div class="col-md-8 col-sm-10 col-xs-10" id="project-name">
                                <h1>phppr<span>.net</span></h1>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <div id="social-icon" class="col-md-12 text-right">
                                <a class="btn btn-default" href="#">
                                    <i class="fa fa-github fa-lg" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-default" href="#">
                                    <i class="fa fa-facebook-square fa-lg" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-default" href="#">
                                    <i class="fa fa-google-plus fa-lg" aria-hidden="true"></i>
                                </a>
                                <a class="btn btn-default" href="#">
                                    <i class="fa fa-twitter fa-lg" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div id="slogan" class="col-md-12 col-sm-12 col-xs-12">
                                <h4 class="text-right">
                                    Comunidade de desenvolvedores PHP do Estado do Paraná
                                </h4>
                            </div>
                        </div>
                        <button type="button" class="navbar-toggle toggle-menu menu-left push-body" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </button>
                    </div>
                </div>

                <div class="row" id="menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left no-padding">
                                    <ul id="primary_menu" class="nav navbar-nav navbar-left">
                                        <li class="dropdown active">
                                            <a href="#">Início</a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle">
                                            Sobre o PHP-PR
                                            <i class="ion-chevron-down"></i>
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle">
                                            Artigos
                                            <i class="ion-chevron-down"></i>
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle">
                                            Notícias
                                            <i class="ion-chevron-down"></i>
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle">
                                            Encontre Profissionais
                                            <i class="ion-chevron-down"></i>
                                            </a>
                                        </li>
                                        <li><a href="#">Eventos</a></li>
                                        <li><a href="#">Contato</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
