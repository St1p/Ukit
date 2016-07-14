<?php
/**
 * Template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<div class="container">
	<div class="col-md-9">
		<div class="row news-title">
			<span class="ico"><i class="fa fa-book"></i></span>
			<div class="titletext">
				<div class="titlemain">пошук</div>
			</div>
		</div>
	</div>
	<div class="container pop">
		<div class="col-md-9 col-sm-9 col-xs-12 pop">
			<div class="row pop-02">

<?php if ( have_posts() ) : ?>
				<h1 class="searchh"><?php printf( __( 'Пошук: %s', 'goodtown' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php
				/*
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called loop-search.php and that will be used instead.
				 */
				get_template_part( 'loop', 'search' );
				?>
<?php else : ?>
					<h2 class="searchh"><?php _e( 'Пошук : 0', 'goodtown' ); ?></h2>
					<div class="entry-content">
						<p><?php _e( 'Нічого не було знайдено :( ', 'goodtown' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
<?php endif; ?>
			</div>
		</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
