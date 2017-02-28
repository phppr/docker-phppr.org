<?php
/**
 * The template for displaying Search Form.
 *
 * @package Odin
 * @since 2.2.0
 */
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
    <div class="input-group input-group-lg">
        <input type="search" class="form-control" name="s" value="<?php echo get_search_query(); ?>" placeholder="Procurar na phppr.org" required>
        <span class="input-group-btn">
            <button type="submit" class="btn btn-default"><i class="icon icon-search"></i></button>
        </span>
    </div>
</form>
