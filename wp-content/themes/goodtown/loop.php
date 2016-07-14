<?php while ( have_posts() ) : the_post(); ?>
	<?php /* How to display posts of the Gallery format. The gallery category is the old way. */ ?>

	<?php if ( ( function_exists( 'get_post_format' ) && 'gallery' == get_post_format( $post->ID ) ) || in_category( _x( 'gallery', 'gallery category slug', 'goodtown' ) ) ) : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<div class="entry-meta">
				<?php goodtown_posted_on(); ?>
			</div><!-- .entry-meta -->

			<div class="entry-content">
				<?php if ( post_password_required() ) : ?>
					<?php the_content(); ?>
				<?php else : ?>
					<?php
					$images = goodtown_get_gallery_images();
					if ( $images ) :
						$total_images = count( $images );
						$image = reset( $images );
						?>
						<div class="gallery-thumb">
							<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image( $image, 'thumbnail' ); ?></a>
						</div><!-- .gallery-thumb -->
						<p><em><?php printf( _n( 'This gallery contains <a %1$s>%2$s photo</a>.', 'This gallery contains <a %1$s>%2$s photos</a>.', $total_images, 'goodtown' ),
									'href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( sprintf( __( 'Permalink to %s', 'goodtown' ), the_title_attribute( 'echo=0' ) ) ) . '" rel="bookmark"',
									number_format_i18n( $total_images )
								); ?></em></p>
					<?php endif; // end goodtown_get_gallery_images() check ?>
					<?php the_excerpt(); ?>
				<?php endif; ?>
			</div><!-- .entry-content -->

			<div class="entry-utility">
				<?php if ( function_exists( 'get_post_format' ) && 'gallery' == get_post_format( $post->ID ) ) : ?>
					<a href="<?php echo esc_url( get_post_format_link( 'gallery' ) ); ?>" title="<?php esc_attr_e( 'View Galleries', 'goodtown' ); ?>"><?php _e( 'More Galleries', 'goodtown' ); ?></a>
					<span class="meta-sep">|</span>
				<?php elseif ( $gallery = get_term_by( 'slug', _x( 'gallery', 'gallery category slug', 'goodtown' ), 'category' ) && in_category( $gallery->term_id ) ) : ?>
					<a href="<?php echo esc_url( get_category_link( $gallery ) ); ?>" title="<?php esc_attr_e( 'View posts in the Gallery category', 'goodtown' ); ?>"><?php _e( 'More Galleries', 'goodtown' ); ?></a>
					<span class="meta-sep">|</span>
				<?php endif; ?>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'goodtown' ), __( '1 Comment', 'goodtown' ), __( '% Comments', 'goodtown' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'goodtown' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->
		</div><!-- #post-## -->

		<?php /* How to display posts of the Aside format. The asides category is the old way. */ ?>

	<?php elseif ( ( function_exists( 'get_post_format' ) && 'aside' == get_post_format( $post->ID ) ) || in_category( _x( 'asides', 'asides category slug', 'goodtown' ) )  ) : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
			<?php else : ?>
				<div class="entry-content">
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'goodtown' ) ); ?>
				</div><!-- .entry-content -->
			<?php endif; ?>

			<div class="entry-utility">
				<?php goodtown_posted_on(); ?>
				<span class="meta-sep">|</span>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'goodtown' ), __( '1 Comment', 'goodtown' ), __( '% Comments', 'goodtown' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'goodtown' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div>
		</div><!-- #post-## -->

		<?php /* How to display all other posts. */ ?>

	<?php else : ?>

		<div class="col-md-6 posting">
			<div class="imgnews">
				<a href="<?php the_permalink(); ?>"title="<?php the_title(); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
			</div>
			<div class="title-news">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</div>
			<div class="comments">
				<div class="comment-left"><?php goodtown_posted_on(); ?></div>
				<div class="comment-right">
					<span class="watch"><a href="<?php the_permalink(); ?>"> Переглядів (<?php echo getPostViews(get_the_ID()); ?>)</a></span>
					<span class="comments">
						<?php comments_popup_link( __( 'Написати коментар', 'goodtown' ), __( 'Коментарі (1)', 'goodtown' ), __( 'Коментарі (%)', 'goodtown' ) ); ?>
					</span></div>

				<?php if ( is_archive() || is_search() ) : ?>
				<?php else : ?>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'goodtown' ), 'after' => '</div>' ) ); ?>
				<?php endif; ?>


				<?php edit_post_link( __( 'Редагувати', 'goodtown' ), '', '' ); ?>

				<?php comments_template( '', true ); ?>
			</div>
		</div>

	<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>

<?php endwhile; // End the loop. Whew. ?>

<?php if (  $wp_query->max_num_pages > 1 ) : ?>

						<div class="row">
							<div class="col-md-12">
								<div class="more"><?php next_posts_link( __( '<img src="/wp-content/themes/goodtown/img/arrow-left.png" alt="more"> Старіші новини', 'goodtown' ) ); ?></div>
								<div class="more newer"><?php previous_posts_link( __( 'Новіші новини <img src="/wp-content/themes/goodtown/img/arrow-right.png" alt="more">', 'goodtown' ) ); ?></div>
							</div>
						</div>
					<?php endif; ?>


