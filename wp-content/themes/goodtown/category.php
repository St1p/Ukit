<?php
/**
 *
 * @package Marta
 * @subpackage Good_Town
 * @since good town 1.0
 */

get_header(); ?>
		<div class="container">
				<?php
				global $post;
				$cat_id = 4;
				$post_categories = wp_get_post_categories( $post->ID );
				if(in_array($cat_id, $post_categories)){ ?>
					<style>
						.fixed .red { border: 1px dashed #68422e;!important; }
					</style>
					<div class="row motivation-title">
						<span class="ico"><i class="fa fa-flag"></i></span>
						<div class="motivationtext">
							<div class="motivationmain"><?php
								printf( __( '%s', 'goodtown' ), '<span>' . single_cat_title( '', false ) . '</span>' );
								?></div>
						</div>
					</div>
					<?php
				}
				?>
				<?php
				global $post;
				$cat_id = 2;
				$post_categories = wp_get_post_categories( $post->ID );
				if(in_array($cat_id, $post_categories)){ ?>
					<style>
						.fixed .yellow { border: 1px dashed #68422e;!important; }
					</style>
					<div class="row travel-title">
						<span class="ico"><i class="fa fa-globe"></i></span>
						<div class="traveltext">
							<div class="travelmain"><?php
								printf( __( '%s', 'goodtown' ), '<span>' . single_cat_title( '', false ) . '</span>' );
								?></div>
						</div>
					</div>
					<?php
				}
				?>

				<?php
				global $post;
				$cat_id = 8;
				$post_categories = wp_get_post_categories( $post->ID );
				if(in_array($cat_id, $post_categories)){ ?>
					<style>
						.fixed .violet { border: 1px dashed #68422e;!important; }
					</style>
					<div class="row soul-title">
						<span class="ico"><i class="fa fa-diamond"></i></span>
						<div class="soultext">
							<div class="soulmain"><?php
								printf( __( '%s', 'goodtown' ), '<span>' . single_cat_title( '', false ) . '</span>' );
								?></div>
						</div>
					</div>
					<?php
				}
				?>

				<?php
				global $post;
				$cat_id = 7;
				$post_categories = wp_get_post_categories( $post->ID );
				if(in_array($cat_id, $post_categories)){ ?>
					<style>
						.fixed .blue { border: 1px dashed #68422e;!important; }
					</style>
					<div class="row life-title">
						<span class="ico"><i class="fa fa-futbol-o"></i></span>
						<div class="lifetext">
							<div class="lifemain"><?php
								printf( __( '%s', 'goodtown' ), '<span>' . single_cat_title( '', false ) . '</span>' );
								?></div>
						</div>
					</div>
					<?php
				}
				?>


				<?php
				global $post;
				$cat_id = 5;
				$post_categories = wp_get_post_categories( $post->ID );
				if(in_array($cat_id, $post_categories)){ ?>
					<style>
						.fixed .bgree { border: 1px dashed #68422e;!important; }
					</style>
					<div class="row possible-title">
						<span class="ico"><i class="fa fa-graduation-cap"></i></span>
						<div class="possibletext">
							<div class="possiblemain"><?php
								printf( __( '%s', 'goodtown' ), '<span>' . single_cat_title( '', false ) . '</span>' );
								?></div>
						</div>
					</div>
					<?php
				}
				?>



				<?php
				global $post;
				$cat_id = 6;
				$post_categories = wp_get_post_categories( $post->ID );
				if(in_array($cat_id, $post_categories)){ ?>
					<style>
						.fixed .bred { border: 1px dashed #68422e;!important; }
					</style>
					<div class="row relation-title">
						<span class="ico"><i class="fa fa-heart-o"></i></span>
						<div class="relationtext">
							<div class="relationmain"><?php
								printf( __( '%s', 'goodtown' ), '<span>' . single_cat_title( '', false ) . '</span>' );
								?></div>
						</div>
					</div>
					<?php
				}
				?>


				<?php
				global $post;
				$cat_id = 3;
				$post_categories = wp_get_post_categories( $post->ID );
				if(in_array($cat_id, $post_categories)){ ?>
					<style>
						.fixed .navy { border: 1px dashed #68422e;!important; }
					</style>
					<div class="row self-title">
						<span class="ico"><i class="fa fa-paint-brush"></i></span>
						<div class="selftext">
							<div class="selfmain"><?php
								printf( __( '%s', 'goodtown' ), '<span>' . single_cat_title( '', false ) . '</span>' );
								?></div>
						</div>
					</div>
					<?php
				}
				?>

</div>
				<div class="container pop">
					<div class="col-md-9 col-sm-9 col-xs-12 pop">

						<?php
						global $post;
						$cat_id = 6;
						$post_categories = wp_get_post_categories( $post->ID );
						if(in_array($cat_id, $post_categories)){ ?>
						<div class="row">
							<div class="col-md-3 author"><img src="/wp-content/themes/goodtown/img/girl.png" alt="#"></div>
							<div class="col-md-9 author">
								<h1>Анна Довженко</h1>
								<h3>журналіст, громадський діяч<br>
									представник молодіжної спілки</h3>
								<p>Рада вітати Вас у нашій рубриці! Що нового на цьому тижні?!<br>
									Ми вирішили здивувати Вас та зробили підбору нйцікавіших тунелів у нашій країні!</p>
							</div>
						</div>
							<?php
						}
						?>


						<?php
						global $post;
						$cat_id = 5;
						$post_categories = wp_get_post_categories( $post->ID );
						if(in_array($cat_id, $post_categories)){ ?>
							<div class="row">
								<div class="col-md-3 author"><img src="/wp-content/themes/goodtown/img/girl.png" alt="#"></div>
								<div class="col-md-9 author">
									<h1>Анна Довженко</h1>
									<h3>журналіст, громадський діяч<br>
										представник молодіжної спілки</h3>
									<p>Рада вітати Вас у нашій рубриці! Що нового на цьому тижні?!<br>
										Ми вирішили здивувати Вас та зробили підбору нйцікавіших тунелів у нашій країні!</p>
								</div>
							</div>
							<?php
						}
						?>

						<?php
						global $post;
						$cat_id = 7;
						$post_categories = wp_get_post_categories( $post->ID );
						if(in_array($cat_id, $post_categories)){ ?>
							<style>
								.fixed .blue { border: 1px dashed #68422e;!important; }
							</style>
							<div class="row">
								<div class="col-md-3 author"><img src="/wp-content/themes/goodtown/img/girl.png" alt="#"></div>
								<div class="col-md-9 author">
									<h1>Анна Довженко</h1>
									<h3>журналіст, громадський діяч<br>
										представник молодіжної спілки</h3>
									<p>Рада вітати Вас у нашій рубриці! Що нового на цьому тижні?!<br>
										Ми вирішили здивувати Вас та зробили підбору нйцікавіших тунелів у нашій країні!</p>
								</div>
							</div>
							<?php
						}
						?>

						<?php
						global $post;
						$cat_id = 8;
						$post_categories = wp_get_post_categories( $post->ID );
						if(in_array($cat_id, $post_categories)){ ?>
							<div class="row">
								<div class="col-md-3 author"><img src="/wp-content/themes/goodtown/img/girl.png" alt="#"></div>
								<div class="col-md-9 author">
									<h1>Анна Довженко</h1>
									<h3>журналіст, громадський діяч<br>
										представник молодіжної спілки</h3>
									<p>Рада вітати Вас у нашій рубриці! Що нового на цьому тижні?!<br>
										Ми вирішили здивувати Вас та зробили підбору нйцікавіших тунелів у нашій країні!</p>
								</div>
							</div>
							<?php
						}
						?>
						<?php
						global $post;
						$cat_id = 4;
						$post_categories = wp_get_post_categories( $post->ID );
						if(in_array($cat_id, $post_categories)){ ?>
							<div class="row">
								<div class="col-md-3 author"><img src="/wp-content/themes/goodtown/img/girl.png" alt="#"></div>
								<div class="col-md-9 author">
									<h1>Анна Довженко</h1>
									<h3>журналіст, громадський діяч<br>
										представник молодіжної спілки</h3>
									<p>Рада вітати Вас у нашій рубриці! Що нового на цьому тижні?!<br>
										Ми вирішили здивувати Вас та зробили підбору нйцікавіших тунелів у нашій країні!</p>
								</div>
							</div>
							<?php
						}
						?>


						<?php
						global $post;
						$cat_id = 2;
						$post_categories = wp_get_post_categories( $post->ID );
						if(in_array($cat_id, $post_categories)){ ?>
							<div class="row">
								<div class="col-md-3 author"><img src="/wp-content/themes/goodtown/img/girl.png" alt="#"></div>
								<div class="col-md-9 author">
									<h1>Анна Довженко</h1>
									<h3>журналіст, громадський діяч<br>
										представник молодіжної спілки</h3>
									<p>Рада вітати Вас у нашій рубриці! Що нового на цьому тижні?!<br>
										Ми вирішили здивувати Вас та зробили підбору нйцікавіших тунелів у нашій країні!</p>
								</div>
							</div>
							<?php
						}
						?>


						<?php
						global $post;
						$cat_id = 3;
						$post_categories = wp_get_post_categories( $post->ID );
						if(in_array($cat_id, $post_categories)){ ?>
							<div class="row">
								<div class="col-md-3 author"><img src="/wp-content/themes/goodtown/img/girl.png" alt="#"></div>
								<div class="col-md-9 author">
									<h1>Анна Довженко</h1>
									<h3>журналіст, громадський діяч<br>
										представник молодіжної спілки</h3>
									<p>Рада вітати Вас у нашій рубриці! Що нового на цьому тижні?!<br>
										Ми вирішили здивувати Вас та зробили підбору нйцікавіших тунелів у нашій країні!</p>
								</div>
							</div>
							<?php
						}
						?>
						<div class="row pop-02">


				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/*
				 * Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>
				</div>
						</div>

				<?php get_sidebar(); ?>
				<?php get_footer(); ?>
