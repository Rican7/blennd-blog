		<!-- Begin Content -->
			<div id="main-content">
				<?php
					/*
				<h1 <?php if (is_single()) echo 'class="single_post"'; ?>>
					<?php
					// Display title based on type of page
					
					if (is_home()) {
						echo '<a href="/">Latest Posts</a>';
					}
					elseif (is_page()) {
						// Echo wrapper
						echo '<a href="'.get_permalink().'" class="title_link" rel="bookmark" title="Permanent Link to '.the_title_attribute('echo=0').'">';
						
						echo single_post_title('', false);

						// Echo wrapper end
						echo '</a>';
					}
					elseif (is_search()) {
						echo 'Search Results';
					}
					else {
						wp_title('');
					}
					
					?>
					
				</h1>
					*/
				?>
				<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
				<?php
				if (!is_search()) {
					// Get category parent
					$parentscategory ="";
					foreach((get_the_category()) as $category) {
						if ($category->category_parent == 0) {
							$parentscategoryid = $category->term_id;
							$parentscategoryname = $category->name;
						}
					}
					$currentParentCategoryID = $parentscategoryid;
					$currentParentCategoryName = $parentscategoryname;
				}
				?>
				
				<article id="post-<?php the_ID(); ?>" class="post" <?php //post_class(); ?>>
					<?php if (!is_page() && !is_search()) : ?>
						
						<header>
							<h1>
								<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
									<?php the_title(); ?>
										
								</a>
							</h1>
							<time datetime="<?php the_time( 'Y-m-d' ); ?>">
								<?php echo get_the_date(); ?>
									
							</time>
						</header>
					<? endif; ?>
					<div class="post-content">
						<?php
							
						if (function_exists('add_theme_support')) {
							if (function_exists('the_post_thumbnail') && has_post_thumbnail()) {
								
								$default_attr = array(
									'alt'	=> '',
									'title'	=> '',
								);
								
						?>

								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="featured-image">
									<?php
									
									if (!is_search()) {
										the_post_thumbnail('post-thumbnail', $default_attr);
									}
									else {
										the_post_thumbnail('thumbnail', $default_attr);
									}
									
									?>
								</a>
						
						<?php
								
							}
						}
						
						?>
						<?php if (is_search()) : ?>
							
							<header>
								<h1>
									<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
										<?php the_title(); ?>
											
									</a>
								</h1>
								<time datetime="<?php the_time( 'Y-m-d' ); ?>">
									<?php the_time( 'm/d/Y' ); ?>
										
								</time>
							</header>
						<? endif; ?>
						<?php
							
						if (is_category() || is_archive() || is_home() || is_search()) {
							the_excerpt();
							$excerptOnly = true;
						}
						else {
							the_content();
							wp_link_pages();
						}

						?>
						
					</div>
					<?php if ((!is_page() || comments_open()) && !is_search()) : ?>
						
						<div class="post-footer-container">
							<?php if (isset($excerptOnly) && $excerptOnly) : ?>
								
								<a href="<?php the_permalink(); ?>" class="read-more-link">Keep Reading</a>
							<? endif; ?>
							<footer>
								<?php if ( comments_open() ) : ?>
									
									<span class="comments-link"><?php comments_popup_link( 'Leave a Comment', '1 Comment', '% Comments' ); ?></span>
									<div class="share">
										<!-- AddThis Button BEGIN -->
										<div class="addthis_toolbox addthis_default_style " addthis:url="<?php the_permalink(); ?>" addthis:title="<?php the_title_attribute(); ?>">
											<a class="addthis_button_facebook"></a>
											<a class="addthis_button_twitter"></a>
											<a class="addthis_button_email"></a>
										</div>
										<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
										<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=rican7"></script>
										<!-- AddThis Button END -->
									</div>
								<? endif; ?>
								<span class="category">
									Posted in <?php the_category(', '); ?>
										
								</span>
								<span class="tags"><?php the_tags('Tags: ', ', ', ''); ?></span>
							</footer>
						</div>
					<? endif; ?>
					
				</article>
				<!--end post-->
				<?php endwhile; /* rewind or continue if all posts have been fetched */ ?>
				<?php if (is_category() || is_archive() || is_home() || is_search()) : ?>
					
					<div class="pages_navigation">
						<div class="pages-link-container" id="left-pages-container">
							<?php if (get_next_posts_link()) : ?>
								
								<span class="pages-arrow">&#8604;</span>
								<?php next_posts_link( 'Older Posts' ); ?>
									
							<?php endif; ?>
								
						</div>
						<div class="pages-link-container" id="right-pages-container">
							<?php if (get_previous_posts_link()) : ?>
								
								<span class="pages-arrow">&#8605;</span>
								<?php previous_posts_link( 'Newer Posts' ); ?>
									
							<?php endif; ?>
								
						</div>
					</div>
					<!--end navigation-->
				<?php elseif (is_single() || is_page()) : ?>
					<?php if ( comments_open() ) : ?>
						
						<div id="comment-container">
							<?php comments_template(); ?>
								
						</div>
					<?php endif; ?>
				<? endif; ?>
				<?php else : ?>
					<?php if (is_search()) : ?>
						
						<!-- No results -->
						<div class="article-container error-page">
							<article>
								<div class="post-content">
									<h3>Sorry, there were no results for your term</h3>
									<h5>Have you tried searching through our <a href="/tags/<?php the_search_query(); ?>">tags</a>?</h5>
								</div>
							</article>
						</div>
					<?php endif; ?>
				<?php endif; ?>

			</div>
		<!-- End Content -->
