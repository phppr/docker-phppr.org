
        <footer>
            <div class="container">
                <div class="col-md-3">
                    <h3 class="color">Mapa do Site</h3>
                    <nav class="footer-menu">
                        <ul>
                            <li><a href="#">Início</a></li>
                            <li><a href="#">Sobre o PHP-PR</a></li>
                            <li><a href="#">Artigos</a></li>
                            <li><a href="#">Notícias</a></li>
                            <li><a href="#">Encontre Profissionais</a></li>
                            <li><a href="#">Eventos</a></li>
                            <li><a href="#">Contato</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-3">
                    <h3 class="color">Site Oficial:</h3>
                    <a href="#" class="col-xs-6 col-md-8 thumbnail">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/php-logo.png" alt="Logo PHP">
                    </a>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
            </div>
            <div class="sub-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <p class="copyright text-right">
                                Copyright © 2016 - Todos os direitos reservados| PHP Paraná.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>
    </body>
</html>
