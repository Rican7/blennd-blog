		<aside id="sidebar">
			<?php if ( !function_exists('dynamic_sidebar')
			   || !dynamic_sidebar(1) ) : ?>
				<!-- Sidebar Placeholder -->
				<section class="widget" id="category-list">
					<header>
						<h1>Widget Title</h1>
					</header>
					<div class="widget-content">
						<ul>
							<li>
								<a href="#">Link</a>
							</li>
							<li>
								<a href="#">Link</a>
							</li>
							<li>
								<a href="#">Link</a>
							</li>
						</ul>
					</div>

				</section>
				<section class="widget">
					<!-- Widget Content Here -->
				</section>
			<?php endif; ?>
			<?php if ( !function_exists('dynamic_sidebar')
			   || !dynamic_sidebar(2) ) : ?>
				<!-- Sidebar Placeholder -->
			<?php endif; ?>
			<?php if ( !function_exists('dynamic_sidebar')
			   || !dynamic_sidebar(3) ) : ?>
				<!-- Sidebar Placeholder -->
			<?php endif; ?>
		</aside>
