<?php
// Generic error document handler
$error_code = 404;
$error_title = 'Page not found';
$error_message = 'The page you\'re looking for isn\'t here.<br />You either tried to access a page that doesn\'t exist,<br />or I\'ve moved or deleted something like an idiot. My bad.';

// Set error code locally, just cuz its cleaner
if (isset($_GET['code'])) {
	$error_code = $_GET['code'];
}

// Change title and message depending on the type of error
/*
switch ($error_code) {
	case 400:
		$error_title = 'Bad request';
		$error_message = 'Somehow or another, you made a request that I just don\t understand. Try again?';
		break;
	case 401:
		$error_title = 'Unauthorized';
		$error_message = 'Oooo... I see what\'s going on.';
		break;
}
*/

// Send header info	
header("HTTP/1.1 $error_code $error_title");
header("Status: $error_code $error_title");

?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<base href="<?php bloginfo('template_directory'); echo '/'; ?>" />
	<title><?php echo $error_code.' '.$error_title; ?></title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Arimo:regular,italic,bold,bolditalic&amp;v1">
	<style>
		body {
			margin: 0px;
			background-color: #A0A0A0;
			background-image: url(imgs/noise.png);
			font-family: 'Arimo', arial, serif;
			font-size: 14px;
			line-height: 19px;
			outline-color: #305EAA;
			text-shadow: rgba(0, 0, 0, 0.3) 0px 5px 8px;
		}
		article, #site-search {
			border-radius: 10px;
			-moz-border-radius: 10px;
			-webkit-border-radius: 10px;
			background-clip: border-box;
			-moz-background-clip: border-box;
			-webkit-background-clip: border-box;
			background-origin: border-box;
			-moz-background-origin: border-box;
			-webkit-background-origin: border-box;
		}
		#main-container {
			width: 100%;
			margin: 0px;
			position: relative;
			z-index: 2;
			background-color: #a0a0a0;
		}
		#design-container {
			width: 100%;
			height: 600px;
			position: absolute;
			z-index: -10;
			background: -moz-linear-gradient(top, #787878 0%, #a0a0a0 100%); /* FF3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#787878), color-stop(100%,#a0a0a0)); /* Chrome,Safari4+ */
			background: -webkit-linear-gradient(top, #787878 0%,#a0a0a0 100%); /* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(top, #787878 0%,#a0a0a0 100%); /* Opera11.10+ */
			background: -ms-linear-gradient(top, #787878 0%,#a0a0a0 100%); /* IE10+ */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#787878', endColorstr='#a0a0a0',GradientType=0 ); /* IE6-9 */
			background: linear-gradient(top, #787878 0%,#a0a0a0 100%); /* W3C */
		}
		#main-content-inner-container {
			height: 600px;
			background-image: url(imgs/noise.png);
		}
		#page-header {
			width: 660px;
			margin: auto;
		}
		#page-logo {
			height: 150px;
			line-height: 150px;
			padding-bottom: 10px;
			position: relative;
			font-size: 56pt;
		}
		#page-logo a {
			position: absolute;
			z-index: 10;
			color: #fff;
			text-decoration: none;
		}
		#page-logo a span {
			color: #305eaa;
			font-family: arial, serif;
		}
		#page-logo span.logo-stroke {
			position: absolute;
			z-index: 5;
			color: #222;
		}
		#page-logo span.logo-stroke span {
			font-family: arial, serif;
		}
		#page-logo #stroke-upleft {
			top: -1px;
			left: -1px;
		}
		#page-logo #stroke-downright {
			top: 1px;
			left: 1px;
		}
		#page-logo {
			font-smoothing: always;
			-webkit-font-smoothing: always;
			-webkit-background-clip: text;
			text-shadow: rgba(0, 0, 0, 0.3) 0px 5px 8px;
		}
		#page-logo a {
			text-stroke: 1px #222;
			-webkit-text-stroke: 1px #222;
		}
		article {
			width: 660px;
			height: 320px;
			margin: auto;
			position: relative;
			z-index: 1;
			background-color: #1D3865;
			overflow: hidden;
			color: #fff;
			text-align: center;
			background: -moz-linear-gradient(top, #3161af 0%, #182f55 100%); /* FF3.6+ */
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#3161af), color-stop(100%,#182f55)); /* Chrome,Safari4+ */
			background: -webkit-linear-gradient(top, #3161af 0%,#182f55 100%); /* Chrome10+,Safari5.1+ */
			background: -o-linear-gradient(top, #3161af 0%,#182f55 100%); /* Opera11.10+ */
			background: -ms-linear-gradient(top, #3161af 0%,#182f55 100%); /* IE10+ */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3161af', endColorstr='#182f55',GradientType=0 ); /* IE6-9 */
			background: linear-gradient(top, #3161af 0%,#182f55 100%); /* W3C */
			box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.6);
			-moz-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.6);
			-webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.6);
			-o-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.6);
		}
		#article-inner {
			width: 640px;
			height: 300px;
			padding: 10px;
			overflow: hidden;
			background-image: url(imgs/noise_scanlines.png);
		}
		article header {
			margin: auto;
			letter-spacing: 1px;
		}
		article header h1 {
			line-height: 40px;
			margin-top: 55px;
			margin-bottom: 0px;
			font-size: 36px;
			font-weight: bold;
		}
		article header h1 .error-code {
			color: #96BEFF;
		}
		article header h2 {
			line-height: 30px;
			margin-top: 0px;
			font-size: 24px;
			color: #b6b6b6;
		}
		article p {
			margin: 0px auto;
			padding: 0px 140px;
			font-size: 14px;
		}
		#search {
			width: 640px;
			position: absolute;
			bottom: 0px;
			margin-bottom: 20px;
		}
		#site-search {
			display: block;
			width: 350px;
			height: 30px;
			line-height: 30px;
			margin: auto;
			margin-top: 8px;
			background-color: #fff;
			background-image: url(imgs/icons/search_icon_gray_20.png);
			background-repeat: no-repeat;
			background-position: 4px 50%;
			border: 1px solid #000;
		}
		#site-search input {
			width: 315px;
			line-height: 20px;
			margin-top: 5px;
			margin-left: 25px;
			border: 0px none;
			font-family: 'Arimo', arial, serif;
			font-size: 15px;
			outline: none;
		}
		#site-search {
			box-shadow: inset 0px 2px 4px rgba(0, 0, 0, 0.6);
			-moz-box-shadow: inset 0px 2px 4px rgba(0, 0, 0, 0.6);
			-webkit-box-shadow: inset 0px 2px 4px rgba(0, 0, 0, 0.6);
			-o-box-shadow: inset 0px 2px 4px rgba(0, 0, 0, 0.6);
		}
		#site-search input {
			-moz-appearance: none;
			-webkit-appearance: none;
			-o-appearance:i none;
		}
		::-webkit-input-placeholder {
			color: #666;
			vertical-align: middle;
		}
		:-moz-placeholder {
			color: #666;
			vertical-align: middle;
		}
	</style>
</head>
<body>
	<div id="main-container">
		<div id="design-container"></div>
		<div id="main-content-inner-container">
			<header id="page-header">
				<div id="page-logo"> 
					<a href="/">ble<span>nn</span>d</a> 
					<span class="logo-stroke" id="stroke-upleft">ble<span>nn</span>d</span> 
					<span class="logo-stroke" id="stroke-downright">ble<span>nn</span>d</span> 
				</div>
			</header>
			<article>
				<div id="article-inner">
					<header>
						<h1><span class="error-code"><?php echo $error_code; ?></span> <?php echo $error_title; ?></h1>
						<h2 id="error-punchline">Houston, we have a problem</h2>
					</header>
					<section id="error-details">
						<p><?php echo $error_message; ?></p>
					</section>
					<section id="search">
						<label id="site-search">
							<form action="/" method="get">
								<input type="search" name="s" placeholder="Search" x-webkit-speech />
							</form>
						</label> 
					</section>
				</div>
			</article>
		</div>
	</div>
</body>
</html>
