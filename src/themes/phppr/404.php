<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Odin
 * @since 2.2.0
 */

get_header(); ?>
    <div class="container">
	    <main id="content" class="<?php echo odin_classes_page_full(); ?> card" role="main">
            <div class="jumbotron text-center">
                <header class="page-header">
                    <h1 class="page-title section__title">Oops.. <?php _e( 'Not Found', 'odin' ); ?>!</h1>
                </header>

                <div class="page-content">
                    <p class="lead"><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'odin' ); ?></p>
                    <div class="sp sp--large"></div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div><!-- .page-content -->

                <div class="clearfix"></div>
                <div class="sp sp--large"></div>
            </div>
	    </main><!-- #main -->
    </div>
<?php get_footer();
