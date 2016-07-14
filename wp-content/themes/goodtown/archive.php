<?php
/**
 * Template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<style>
	.fixed .green { border: 1px dashed #68422e;!important; }
</style>
<div class="container">
	<div class="col-md-9">
		<div class="row news-title">
			<span class="ico"><i class="fa fa-book"></i></span>
			<div class="titletext">
				<div class="titlemain">Новини</div>
			</div>
		</div>
	</div>
	<div class="container pop">
		<div class="col-md-9 col-sm-9 col-xs-12 pop">
			<div class="row pop-02">

<?php
	/*
	 * Queue the first post, that way we know
	 * what date we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>

			<h1 class="page-title">
<?php if ( is_day() ) : ?>
				<?php printf( __( '', 'goodtown' ), get_the_date() ); ?>
<?php elseif ( is_month() ) : ?>
				<?php printf( __( '', 'goodtown' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'goodtown' ) ) ); ?>
<?php elseif ( is_year() ) : ?>
				<?php printf( __( '', 'goodtown' ), get_the_date( _x( 'Y', 'yearly archives date format', 'goodtown' ) ) ); ?>
<?php else : ?>
				<?php _e( '', 'goodtown' ); ?>
<?php endif; ?>
			</h1>

<?php
	/*
	 * Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();

	/*
	 * Run the loop for the archives page to output the posts.
	 * If you want to overload this in a child theme then include a file
	 * called loop-archive.php and that will be used instead.
	 */
	get_template_part( 'loop', 'archive' );
?>

			</div><!-- #content -->
		</div><!-- #container -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>
