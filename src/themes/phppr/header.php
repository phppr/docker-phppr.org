<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <?php wp_head(); ?>
    </head>
    <body>
        <header class="main-header">
            <div class="container">
                <div class="row">
                    <div class="logo col-md-3">
                        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png"></a>
                    </div>

                    <div class="header-search-form col-md-7">
                        <form action="/" method="get">
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control" name="s" placeholder="Encontrar Artigos, Eventos e Jobs..." required>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="icon icon-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>

                    <div class="header-social col-md-2">
                        <ul class="list-inline pull-right">
                            <li class="header-social__github"><a href="https://github.com/php-pr" target="_blank"><i class="icon icon-github"></i></a></li>
                            <li class="header-social__slack"><a href="http://phppr.herokuapp.com/" target="_blank"><i class="icon icon-slack"></i></a></li>
                            <li class="header-social__twitter"><a href="https://twitter.com/phppr" target="_blank"><i class="icon icon-twitter"></i></a></li>
                            <li class="header-social__facebook"><a href="https://www.facebook.com/groups/1398320767076609/" target="_blank"><i class="icon icon-facebook"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="to-home"><a href="#">Home</a></li>
                            <li><a href="#">PHP Eventos</a></li>
                            <li><a href="#">PHP Artigos</a></li>
                            <li><a href="#">PHP Empregos</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    Sobre a Comunidade <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Sobre a PHP PR</a></li>
                                    <li><a href="#">Como participar</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    Olá Fernando <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Meu perfil</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="icon icon-power-off"></i> Sair</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="breadcrumbs">
            <ol class="breadcrumb container">
                <li><a href="#">Home</a></li>
                <li><a href="#">Library</a></li>
                <li class="active">Data</li>
            </ol>
        </div>
