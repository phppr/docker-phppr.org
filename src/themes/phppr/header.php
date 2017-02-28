<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <a href="https://github.com/phppr/phppr.org" class="github-corner" aria-label="View source on Github"><svg width="80" height="80" viewBox="0 0 250 250" style="fill:#5CB483; color:#fff; position: absolute; top: 0; border: 0; right: 0;" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style>

        <header class="main-header">
            <div class="container">
                <div class="row">
                    <div class="logo col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-3 col-md-offset-0">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Imagem Logo de <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
                        </a>
                    </div>

                    <div class="header-search-form col-sm-6 col-xs-12 col-md-7">
                        <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
                            <div class="input-group input-group-lg">
                                <input type="search" class="form-control" name="s" value="<?php echo get_search_query(); ?>" placeholder="Procurar na phppr.org" required>
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="icon icon-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>

                    <?php
                        $phppr_social = get_option( 'phppr_social' );
                        $social = array(
                            'github' => $phppr_social['phppr_github'],
                            'slack' => $phppr_social['phppr_slack'],
                            'twitter' => $phppr_social['phppr_twitter'],
                            'facebook' => $phppr_social['phppr_facebook'],
                        );
                    ?>

                    <div class="header-social col-sm-6 col-xs-12 col-md-2">
                        <ul class="list-inline pull-right">
                            <?php foreach($social as $k => $s): ?>
                                <li class="header-social__<?php echo $k ?>">
                                    <a href="<?php echo $s ?>" target="_blank"><i class="icon icon-<?php echo $k ?>"></i></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div class="navbar navbar-inverse">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-main-navigation" aria-expanded="false">
                            <span class="icon-menu">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </span>
                            <span>Menu</span>
                        </button>
                    </div>

                    <nav class="collapse navbar-collapse navbar-main-navigation" role="navigation">
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'main-menu',
                                    'depth' => 2,
                                    'container' => false,
                                    'menu_class' => 'nav navbar-nav',
                                    'fallback_cb' => 'Odin_Bootstrap_Nav_Walker::fallback',
                                    'walker' => new Odin_Bootstrap_Nav_Walker()
                                )
                            );
                        ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item nav-item--iframe">
                                <script async defer src="//phppr.herokuapp.com/slackin.js"></script>
                            </li>
                            <?php if (is_user_logged_in()): ?>
                                <?php
                                global $current_user;
                                get_currentuserinfo();
                                $display_name = $current_user->display_name;
                                ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        Olá <?php echo $display_name ?> <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo admin_url('/profile.php'); ?>">Editar meu perfil</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="<?php echo wp_logout_url(home_url()); ?>"><i class="icon icon-power-off"></i> Sair</a></li>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="<?php echo site_url('/wp-admin/admin-ajax.php?action=github_oauth_redirect'); ?>">
                                        <i class="icon icon-github"></i> Login com Github
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="breadcrumbs">
            <div class="container">
                <?php echo odin_breadcrumbs( '<i class="icon icon-home"></i>' ) ?>
            </div>
        </div>
