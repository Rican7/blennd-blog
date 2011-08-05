<?php

/*
Template Name: Archives
*/

?>
<?php get_header(); ?>
		<!-- Begin Content -->
			<div id="main-content">
				<header>
					<h1>
						<?php
						// Echo wrapper
						echo '<a href="'.get_permalink().'" class="TitleLink" rel="bookmark" title="Permanent Link to '.the_title_attribute('echo=0').'">';
						
						echo single_post_title('', false);

						// Echo wrapper end
						echo '</a>';
						?>
					</h1>
				</header>
				<article id="post-<?php the_ID(); ?>" class="post" <?php //post_class(); ?>>
					<div class="post-content">
						<?php the_post(); ?>
						<h2>Archives by Month:</h2>
						<ul>
							<?php wp_get_archives('type=monthly'); ?>
						</ul>
					</div>
				</article>
			</div>
		<!-- End Content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
