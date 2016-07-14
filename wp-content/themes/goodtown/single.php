<?php 
/**
 * Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<div class="container pop">
	<div class="col-md-9 col-sm-9 col-xs-12 pop">
		<div class="row pop-02">

			<?php
			/*
			 * Run the loop to output the post.
			 * If you want to overload this in a child theme then include a file
			 * called loop-single.php and that will be used instead.
			 */
			get_template_part( 'loop', 'single' );
			?>
			<?php setPostViews(get_the_ID()); ?>


		</div>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
