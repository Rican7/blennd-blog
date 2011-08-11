		</div>
	</div>
	<div id="footer-container">
		<footer id="page-footer">
			<?php if ( !function_exists('dynamic_sidebar')
			   || !dynamic_sidebar('Left Footer Widget') ) : ?>
				<!-- Sidebar Placeholder -->
				<section class="widget footer-widget" id="category-list">
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
			<?php endif; ?>
			<?php if ( !function_exists('dynamic_sidebar')
			   || !dynamic_sidebar('Middle Footer Widget') ) : ?>
				<!-- Sidebar Placeholder -->
			<?php endif; ?>
			<?php if ( !function_exists('dynamic_sidebar')
			   || !dynamic_sidebar('Right Footer Widget') ) : ?>
				<!-- Sidebar Placeholder -->
			<?php endif; ?>
		</footer>
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="<?php bloginfo('template_directory'); ?>/scripts/libs/jquery-1.6.1.min.js"%3E%3C/script%3E'))</script>
	<script src="<?php bloginfo('template_directory'); ?>/scripts/plugins.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/scripts/globalfunctions.js"></script>
	<!--[if lt IE 7 ]>
	<script src="<?php bloginfo('template_directory'); ?>/scripts/libs/dd_belatedpng.js"></script>
	<script> DD_belatedPNG.fix('img, .png_bg');</script>
	<![endif]-->
	<script>
		var _gaq=[['_setAccount','UA-13134562-6'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
	<script>
		var addthis_config = {"data_track_clickback":true};
	</script>
	<script src="http://s7.addthis.com/js/250/addthis_widget.js#username=rican7"></script>

     <?php wp_footer(); ?>

</body>
</html>
