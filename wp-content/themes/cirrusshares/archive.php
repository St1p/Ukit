<?php
/*
Template Name: all-news
*/
?>

<!DOCTYPE html>
<html lang="en">
<?php include("template/head.php")?>
<body>
<div class="wrapp">
	<?php include("template/header.php")?>
	<?php include("template/slider.php")?>



	<div class="container pudding_null">
		<section class="main_content">
			<div class="inner_wrapp">
				<div class="row">
					<div class="contacts about_us">

						<?php if ( have_posts() ) : ?>

							<header class="page-header">
								<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="taxonomy-description">', '</div>' );
								?>
							</header><!-- .page-header -->

							<?php
							// Start the Loop.
							while ( have_posts() ) : the_post();

								/*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
								twentyfifteen_post_thumbnail();
								the_content();
								the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ));

								// End the loop.
							endwhile;

							// Previous/next page navigation.


						// If no content, include the "No posts found" template.
						else :
							get_template_part( 'content', 'none' );

						endif;
						?>

					</div>
				</div>
			</div>
		</section>

		<?php include("template/prefooter.php")?>
	</div>
	<?php include("template/footer.php")?>
</body>
</html>
