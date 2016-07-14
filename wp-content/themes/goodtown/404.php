<?php
/**
 * Template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
	<div class="container pop">
	<div class="col-md-12 col-sm-12 col-xs-12 pop">
		<div class="row pop-02">

				<h1 class="searchh"><?php _e( '404', 'goodtown' ); ?></h1>
				<div class="searchh">
					<p><?php _e( 'Пробачте,але такої сторінки не існує.', 'goodtown' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->

		</div><!-- #content -->
	</div><!-- #container -->
	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>

<?php get_footer(); ?>