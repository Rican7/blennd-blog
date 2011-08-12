	<div id="main-container"> 
		<div id="design-container"></div>
		<div id="main-content-inner-container">
			<header id="page-header"> 
				<div id="page-logo"> 
					<a href="/">ble<span>nn</span>d</a> 
					<span class="logo-stroke" id="stroke-upleft">ble<span>nn</span>d</span> 
					<span class="logo-stroke" id="stroke-downright">ble<span>nn</span>d</span> 
				</div> 
				<aside id="top-quote">A whole mess of me, all ble<span>nn</span>d'd together</aside> 
			</header> 
			<nav id="page-nav"> 
				<div id="page-nav-inner">
					<ul id="main-navigation">
						<?php
							// Include the middle section	
							get_template_part( 'navlinks' );
						?>
					</ul>
					<label id="site-search">
						<form action="/" method="get">
							<input type="search" name="s" placeholder="Search" x-webkit-speech />
						</form>
					</label>
				</div>
			</nav> 
			<div id="content-container">
