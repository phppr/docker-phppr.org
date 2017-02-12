<?php
/**
 * The template used for displaying page content.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('section col-md-8'); ?>>
	<?php the_title( '<header class="entry-header"><h1 class="entry-title section__title">', '</h1></header><!-- .entry-header -->' ); ?>

	<div class="entry-content card">
		<?php
			the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'odin' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
        <div class="sp"></div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
