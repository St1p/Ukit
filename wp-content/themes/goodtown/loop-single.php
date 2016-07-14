<?php
/**
 * The loop that displays a single post
 *
 * The loop displays the posts and the post content. See
 * https://codex.wordpress.org/The_Loop to understand it and
 * https://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-single.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>



				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="row"><span class="time"><?php goodtown_posted_on(); ?> <?php goodtown_posted_in(); ?></span></div>
					<div class="row">
						<div class="social">
							<div class="social-share"><img src="/wp-content/themes/goodtown/img/share.png" alt="#"></div>
							<script type="text/javascript">(function() {
									if (window.pluso)if (typeof window.pluso.start == "function") return;
									if (window.ifpluso==undefined) { window.ifpluso = 1;
										var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
										s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
										s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
										var h=d[g]('body')[0];
										h.appendChild(s);
									}})();</script>
							<div class="pluso" data-background="transparent" data-options="big,square,line,horizontal,nocounter,theme=04" data-services="vkontakte,facebook,twitter,odnoklassniki,google"></div>
						</div>

					</div>

					<div class="title">
					<h1><?php the_title(); ?></h1>
					</div>

					<div class="text">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'goodtown' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
					<div class="text edi">
						<?php edit_post_link( __( 'Редактувати', 'goodtown' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-utility -->


					<div class="row linearticle"></div>
					<div class="row">
						<div class="left left-article">
							<span>Переглядів (<?php echo getPostViews(get_the_ID()); ?>)</span>
							<span><?php comments_popup_link( __( 'Написати коментар', 'goodtown' ), __( 'Коментарі (1)', 'goodtown' ), __( 'Коментарі (%)', 'goodtown' ) ); ?></span>
						</div>
						<div class="social right-article">
							<script type="text/javascript">(function() {
									if (window.pluso)if (typeof window.pluso.start == "function") return;
									if (window.ifpluso==undefined) { window.ifpluso = 1;
										var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
										s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
										s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
										var h=d[g]('body')[0];
										h.appendChild(s);
									}})();</script>
							<div class="pluso" data-background="transparent" data-options="small,square,line,horizontal,counter,theme=04" data-services="vkontakte,facebook,twitter,odnoklassniki,google"></div>
						</div>
					</div>



					</div><!-- #post-## -->


				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>
