<?php

//$debug = !isset($_GET["nodebug"]);
$debug = isset($_GET["debug"]);

$script_dir = str_replace([realpath($_SERVER["DOCUMENT_ROOT"]), "\\"], ["","/"],realpath(__DIR__));
$base = "//{$_SERVER["SERVER_NAME"]}{$script_dir}/";
$time = time();
$texts = json_decode(file_get_contents(__DIR__."/assets/text/text-en.json"), true);
$text_json = json_encode(json_encode($texts));

if($debug) {
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
} // end if


// ================================================================================
//    FUNCTIONS
// ================================================================================

function decache_param() {
	global $debug, $time;
	if($debug) {
		echo("?_=".$time);
	} // end if
} // end decache_param()

function v() {
	return decache_param();
} // end v()

function text($name) {
	global $texts;
	echo(@$texts["texts"][$name]);
} // end text($)

?><!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		
		<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
		<!--                                                      -->
		<!-- DEVELOPER IS SLEEPLY, DON'T WAKE HIM UP (ABOUT PAGE) -->
		<!--                                                      -->
		<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
		
		<!-- version -->
		<meta name="version" content="1.0.0" />
		
		<!-- og data -->
		<meta property="og:image" content="https://winghimjns.com/img/portfolio9-og-img.png" />
		<meta property="og:title" content="Wing Him Liu - Web Developer" />
		<meta property="og:description" content="Wing Him Liu - Web Developer" />
		<meta property="og:url" content="https://winghimjns.com" />
		
		<!-- meta -->
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="icon" type="image/ico" href="./favicon.ico">
		
		<!-- base url directory -->
        <base href="<?php echo($base); ?>" />
		
<?php
	if($debug) {
?>
		<!-- meta for no-cache -->
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<meta http-equiv="Page-Enter" content="blendTrans(Duration=1.0)">
		<meta http-equiv="Page-Exit" content="blendTrans(Duration=1.0)">
		<meta http-equiv="Site-Enter" content="blendTrans(Duration=1.0)">
		<meta http-equiv="Site-Exit" content="blendTrans(Duration=1.0)">
<?php
	} // end if
?>
		
		<!-- title -->
		<title>Wing Him Liu - My Portfolio</title>
		
		<!-- style for loading cover -->
		<style type="text/css">
			
			#loading-cover {
				position: fixed;
				z-index: 9999; /** always the top **/
				top: 0;
				left: 0;
				height: 100%;
				width: 100%;
				background-color: #FFF;
			}
			
			html.load-done #loading-cover {
				display: none;
			}
			
			/** no scroll bar when loading **/
			html:not(.load-done) {
				overflow: hidden;
			}
			
		</style>
		
	</head>
	<body class="color-3 bg-color-5">
		
		<!-- loading cover -->
		<div id="loading-cover"></div>
		
		<!-- particles-js backgrougnd -->
		<div id="particles-js"></div>
		
		<!-- copyright statement -->
		<div id="copyright-statement" class="color-2 bg-color-a-1">Wing Him Liu © 2017 All Rights Reserved&nbsp;&nbsp;</div>
		
		<!-- cv-nav -->
		<nav class="cd-vertical-nav">
			<ul>
				<li><a href="#home" class="active"><span wg-text="home_title" class="label"><?php text("home_title"); ?></span></a></li>
				<li><a href="#about"><span wg-text="about_title" class="label"><?php text("about_title"); ?></span></a></li>
				<li><a href="#techniques"><span wg-text="techniques_title" class="label"><?php text("techniques_title"); ?></span></a></li>
				<li><a href="#interested"><span wg-text="interested_title" class="label"><?php text("interested_title"); ?></span></a></li>
				<li><a href="#contact"><span wg-text="contact_title" class="label"><?php text("contact_title"); ?></span></a></li>
			</ul>
		</nav><!-- .cd-vertical-nav -->
		<button class="cd-nav-trigger cd-image-replace">Open navigation<span aria-hidden="true"></span></button>
		
		<!-- cookie statement -->
		<div id="cookie_statement" class="color-5 bg-color-3 text-center" style="display: none;">
			<h5><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;&nbsp;Wing Him uses Cookies on this website for analytical purposes.</h5>
			<a class="btn btn-primary" href="javascript:void(0);" onclick="hideCookieNotice();"><i class="fa fa-smile-o" aria-hidden="true"></i>&nbsp;Accept and Close</a>&nbsp;<a class="btn btn-warning" href="./cookie-policy/" target="_blank"><i class="fa fa-question-circle-o" aria-hidden="true"></i>&nbsp;More Info</a>
		</div>
		
		<!-- home -->
		<section id="home" class="cd-section">
			<div class="content-wrapper">
				<span class="portfolio-title"><span>Web<br />Developer</span></span>
				<span class="portfolio-subtitle"><span>Wing Him Liu</span></span>
				<br />
				<br />
				<a href="#about" class="cd-scroll-down cd-image-replace">scroll down</a>
			</div>
		</section><!-- #home.cd-section -->
		
		<!-- about -->
		<section id="about" class="cd-section">
			<div class="content-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-4 col-sm-push-1 col-lg-push-0 sm-text-right">
							<h1 class="about-title" wg-text="about_title"><?php text("about_title"); ?></h1>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-3 col-sm-offset-1 col-lg-offset-1 hidden-xs">
							<div id="programmer-svg-wrap" ee class="color-svg-3">
								<div id="programmer-svg">
									<svg viewBox="0 0 207.60913 226.90083" xmlns="http://www.w3.org/2000/svg">
										<g transform="translate(-40,-45.38248)">
											<circle id="programmers-head" r="20" cx="65" cy="66" />
											<animate href="#programmers-head" attributeName="cx" from="65" to="65" dur=".7s" repeatCount="indefinite" d="circ-anim" values="65; 80; 65" keyTimes="0; 0.5; 1" />
											<animate href="#programmers-head" attributeName="cy" from="66" to="66" dur=".7s" repeatCount="indefinite" d="circ-anim" values="66; 67; 66" keyTimes="0; 0.5; 1" />
											<path d="m57.17259,87.6665h14.64721a17.17259,17.17259 0 0,1 17.17259,17.17259v80.35049a17.17259,17.17259 0 0,1 -17.17259,17.17259h-14.64721a17.17259,17.17259 0 0,1 -17.17259-17.17259v-80.35049a17.17259,17.17259 0 0,1 17.17259-17.17259"/>
											<path d="m55.05331,173.79344h80.81221a14.64721,14.64721 0 0,1 14.64721,14.64721 14.64721,14.64721 0 0,1 -14.64721,14.64721h-80.81221a14.64721,14.64721 0 0,1 -14.64721-14.64721 14.64721,14.64721 0 0,1 14.64721-14.64721"/>
											<path d="m139.40105,179.34927a11.11168,11.11168 0 0,1 11.11168,11.11168v70.71068a11.11168,11.11168 0 0,1 -11.11168,11.11168 11.11168,11.11168 0 0,1 -11.11168-11.11168v-70.71068a11.11168,11.11168 0 0,1 11.11168-11.11168"/>
											<path d="m107.915,142.98378h130.30968a7.82868,7.82868 0 0,1 7.82868,7.82868v.50508a7.82868,7.82868 0 0,1 -7.82868,7.82868h-130.30968a7.82868,7.82868 0 0,1 -7.82868-7.82868v-.50508a7.82868,7.82868 0 0,1 7.82868-7.82868"/>
											<path d="m116.44169,127.04215h21.17001a8.35536,7.32361 0 0,1 8.35536,7.32361 8.35536,7.32361 0 0,1 -8.35536,7.32361h-21.17001a8.35536,7.32361 0 0,1 -8.35536-7.32361 8.35536,7.32361 0 0,1 8.35536-7.32361"/>
											<path d="m127.41818,6.81552h43.89845a10.37567,6.99607 0 0,1 10.37567,6.99607v1.16015a10.37567,6.99607 0 0,1 -10.37567,6.99607h-43.89845a10.37567,6.99607 0 0,1 -10.37567-6.99607v-1.16015a10.37567,6.99607 0 0,1 10.37567-6.99607" transform="rotate(44.48978)"/>
											<path d="m152.55332,127.54723h18.68782a5.05076,6.81853 0 0,1 5.05076,6.81853 5.05076,6.81853 0 0,1 -5.05076,6.81853h-18.68782a5.05076,6.81853 0 0,1 -5.05076-6.81853 5.05076,6.81853 0 0,1 5.05076-6.81853"/>
											<path d="m195.28432,132.0726h42.93148a1.51523,4.79822 0 0,1 1.51523,4.79822 1.51523,4.79822 0 0,1 -1.51523,4.79822h-42.93148a1.51523,4.79822 0 0,1 -1.51523-4.79822 1.51523,4.79822 0 0,1 1.51523-4.79822"/>
											<path d="m210.01276,118.94063h15.15229a1.51523,8.71078 0 0,1 1.51523,8.71078 1.51523,8.71078 0 0,1 -1.51523,8.71078h-15.15229a1.51523,8.71078 0 0,1 -1.51523-8.71078 1.51523,8.71078 0 0,1 1.51523-8.71078"/>
											<path d="m181.26401,63.66166h7.57614a1.51523,9.59645 0 0,1 1.51523,9.59645v50.50763a1.51523,9.59645 0 0,1 -1.51523,9.59645h-7.57614a1.51523,9.59645 0 0,1 -1.51523-9.59645v-50.50763a1.51523,9.59645 0 0,1 1.51523-9.59645"/>
											<path d="m187.83001,70.81624 59.27912,16.16244v31.8198l-58.77404,8.5863-.50508-56.56854z" fill-rule="evenodd" />
											<path d="m44.42641,205.87465h63.63961a1.51523,5.55584 0 0,1 1.51523,5.55584 1.51523,5.55584 0 0,1 -1.51523,5.55584h-63.63961a1.51523,5.55584 0 0,1 -1.51523-5.55584 1.51523,5.55584 0 0,1 1.51523-5.55584"/>
											<path d="m71.74113,211.4305h8.5863a1.51523,9.59645 0 0,1 1.51523,9.59645v40.91118a1.51523,9.59645 0 0,1 -1.51523,9.59645h-8.5863a1.51523,9.59645 0 0,1 -1.51523-9.59645v-40.91118a1.51523,9.59645 0 0,1 1.51523-9.59645"/>
										</g>
									</svg>
								</div>
								<div id="programmer_stop-svg">
									<svg viewBox="0 0 207.60913 226.90083" xmlns="http://www.w3.org/2000/svg">
										<g transform="translate(-40,-45.38248)">
											<circle id="programmers-head" r="20" cx="65" cy="66" />
											<path d="m57.17259,87.6665h14.64721a17.17259,17.17259 0 0,1 17.17259,17.17259v80.35049a17.17259,17.17259 0 0,1 -17.17259,17.17259h-14.64721a17.17259,17.17259 0 0,1 -17.17259-17.17259v-80.35049a17.17259,17.17259 0 0,1 17.17259-17.17259"/>
											<path d="m55.05331,173.79344h80.81221a14.64721,14.64721 0 0,1 14.64721,14.64721 14.64721,14.64721 0 0,1 -14.64721,14.64721h-80.81221a14.64721,14.64721 0 0,1 -14.64721-14.64721 14.64721,14.64721 0 0,1 14.64721-14.64721"/>
											<path d="m139.40105,179.34927a11.11168,11.11168 0 0,1 11.11168,11.11168v70.71068a11.11168,11.11168 0 0,1 -11.11168,11.11168 11.11168,11.11168 0 0,1 -11.11168-11.11168v-70.71068a11.11168,11.11168 0 0,1 11.11168-11.11168"/>
											<path d="m107.915,142.98378h130.30968a7.82868,7.82868 0 0,1 7.82868,7.82868v.50508a7.82868,7.82868 0 0,1 -7.82868,7.82868h-130.30968a7.82868,7.82868 0 0,1 -7.82868-7.82868v-.50508a7.82868,7.82868 0 0,1 7.82868-7.82868"/>
											<path d="m116.44169,127.04215h21.17001a8.35536,7.32361 0 0,1 8.35536,7.32361 8.35536,7.32361 0 0,1 -8.35536,7.32361h-21.17001a8.35536,7.32361 0 0,1 -8.35536-7.32361 8.35536,7.32361 0 0,1 8.35536-7.32361"/>
											<path d="m127.41818,6.81552h43.89845a10.37567,6.99607 0 0,1 10.37567,6.99607v1.16015a10.37567,6.99607 0 0,1 -10.37567,6.99607h-43.89845a10.37567,6.99607 0 0,1 -10.37567-6.99607v-1.16015a10.37567,6.99607 0 0,1 10.37567-6.99607" transform="rotate(44.48978)"/>
											<path d="m152.55332,127.54723h18.68782a5.05076,6.81853 0 0,1 5.05076,6.81853 5.05076,6.81853 0 0,1 -5.05076,6.81853h-18.68782a5.05076,6.81853 0 0,1 -5.05076-6.81853 5.05076,6.81853 0 0,1 5.05076-6.81853"/>
											<path d="m195.28432,132.0726h42.93148a1.51523,4.79822 0 0,1 1.51523,4.79822 1.51523,4.79822 0 0,1 -1.51523,4.79822h-42.93148a1.51523,4.79822 0 0,1 -1.51523-4.79822 1.51523,4.79822 0 0,1 1.51523-4.79822"/>
											<path d="m210.01276,118.94063h15.15229a1.51523,8.71078 0 0,1 1.51523,8.71078 1.51523,8.71078 0 0,1 -1.51523,8.71078h-15.15229a1.51523,8.71078 0 0,1 -1.51523-8.71078 1.51523,8.71078 0 0,1 1.51523-8.71078"/>
											<path d="m181.26401,63.66166h7.57614a1.51523,9.59645 0 0,1 1.51523,9.59645v50.50763a1.51523,9.59645 0 0,1 -1.51523,9.59645h-7.57614a1.51523,9.59645 0 0,1 -1.51523-9.59645v-50.50763a1.51523,9.59645 0 0,1 1.51523-9.59645"/>
											<path d="m187.83001,70.81624 59.27912,16.16244v31.8198l-58.77404,8.5863-.50508-56.56854z" fill-rule="evenodd" />
											<path d="m44.42641,205.87465h63.63961a1.51523,5.55584 0 0,1 1.51523,5.55584 1.51523,5.55584 0 0,1 -1.51523,5.55584h-63.63961a1.51523,5.55584 0 0,1 -1.51523-5.55584 1.51523,5.55584 0 0,1 1.51523-5.55584"/>
											<path d="m71.74113,211.4305h8.5863a1.51523,9.59645 0 0,1 1.51523,9.59645v40.91118a1.51523,9.59645 0 0,1 -1.51523,9.59645h-8.5863a1.51523,9.59645 0 0,1 -1.51523-9.59645v-40.91118a1.51523,9.59645 0 0,1 1.51523-9.59645"/>
										</g>
									</svg>
								</div>
								<div id="exclamation_mark-svg">
									<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
										<metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
										<g>
											<path d="M500,10C229.4,10,10,229.3,10,499.9C10,770.6,229.4,990,500,990c270.6,0,490-219.4,490-490.1C990,229.3,770.7,10,500,10z M500,939.8c-243,0-439.8-197-439.8-440C60.2,257,257,60.1,500,60.1c242.9,0,439.8,196.9,439.8,439.8C939.8,742.9,742.9,939.8,500,939.8z"/>
											<polygon points="556,611.3 577.4,170.5 423.7,170.5 445,611.3 "/>
											<path d="M500.6,660c-51.6,0-87.6,36.1-87.6,88.5c0,50.6,35,88.6,85.7,88.6h2c52.5,0,86.5-38,86.5-88.6C586.2,696,552.1,660,500.6,660z"/>
										</g>
									</svg>
								</div>
							</div>
						</div>
						<div class="col-sm-7 col-md-7 col-lg-7 text-justify">
							<p wg-text="about_paragraph_1"><?php text("about_paragraph_1"); ?></p>
							<p wg-text="about_paragraph_2"><?php text("about_paragraph_2"); ?></p>
							<p wg-text="about_paragraph_3"><?php text("about_paragraph_3"); ?></p>
						</div>
					</div>
				</div>
				<a href="#techniques" class="cd-scroll-down cd-image-replace">scroll down</a>
			</div>
		</section><!-- #about.cd-section -->
		
		<!-- techniques -->
		<section id="techniques" class="cd-section cd-scroll-down-clear">
			<div class="content-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-md-6">
							<div class="techniques-title-wrap">
								<div class="techniques-title">
									<h1 class="color-3" wg-text="techniques_title"><?php text("techniques_title"); ?></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<p class="color-3" wg-text="techniques_paragraph_1"><?php text("techniques_paragraph_1"); ?></p>
					<br />
					<br />
				</div>
				<div class="row no-gutter">
					<div class="col-sm-12 col-md-6 row no-gutter">
						<div class="col-sm-6">
							<div class="block-16-9-wrap">
								<div id="techniques-php" class="techniques-block block-16-9">
									<video autoplay loop id="techniques-php-video" class="techniques-video">
										<source src="./video/programming.mp4" type="video/mp4">
										Your browser does not support the video tag.
									</video>
									<div class="techniques-name-wrap">
										<div class="techniques-name pointer-cursor bg-color-b-4">
											<h1 wg-text="techniques_php_title"><?php text("techniques_php_title"); ?></h1>
										</div>
									</div>
								</div>
							</div>
							<div class="visible-xs">
								<div class="techniques-details techniques-display-area-xs techniques-display-area color-2 bg-color-3">
									<div class="techniques-display-area-php color-b-4 color-a-4 techniques-display-area-technique">
										<div class="container">
											<h1 wg-text="techniques_php_title"><?php text("techniques_php_title"); ?></h1>
											
											<div class="row">
												<div class="col-md-6">
													<p class="text-justify" wg-text="techniques_php_paragraph_1"><?php text("techniques_php_paragraph_1"); ?></p>
													<p class="text-justify" wg-text="techniques_php_paragraph_2"><?php text("techniques_php_paragraph_2"); ?></p>
													<p class="text-justify" wg-text="techniques_php_paragraph_3"><?php text("techniques_php_paragraph_3"); ?></p>
												</div>
												<div class="col-md-6">
													<div>
														<div class="progress">
															<div class="progress-bar progress-bar-danger" style="width: 20%;" wg-text="techniques_php_learn_from_school_percentage"><?php text("techniques_php_learn_from_school_percentage"); ?></div>
															<div class="progress-bar progress-bar-success" style="width: 60%;" wg-text="techniques_php_self_study_percentage"><?php text("techniques_php_self_study_percentage"); ?></div>
														</div>
													</div>
													<div class="row no-gutter">
														<div class="col-md-6 col-sm-4 techniques-php-baby-background">
															<h3 class="pt0" wg-text="techniques_php_learn_from_school_title"><?php text("techniques_php_learn_from_school_title"); ?></h3>
															<ul class="list-disc">
																<li wg-text="techniques_php_learn_from_school_item_1"><?php text("techniques_php_learn_from_school_item_1"); ?></li>
																<li wg-text="techniques_php_learn_from_school_item_2"><?php text("techniques_php_learn_from_school_item_2"); ?></li>
																<li wg-text="techniques_php_learn_from_school_item_3"><?php text("techniques_php_learn_from_school_item_3"); ?></li>
																<li wg-text="techniques_php_learn_from_school_item_4"><?php text("techniques_php_learn_from_school_item_4"); ?></li>
															</ul>
														</div>
														<div class="col-md-6 col-sm-4 techniques-php-suit-background">
															<h3 class="pt0" wg-text="techniques_php_self_study_title"><?php text("techniques_php_self_study_title"); ?></h3>
															<ul class="list-disc">
																<li wg-text="techniques_php_self_study_item_1"><?php text("techniques_php_self_study_item_1"); ?></li>
																<li wg-text="techniques_php_self_study_item_2"><?php text("techniques_php_self_study_item_2"); ?></li>
																<li wg-text="techniques_php_self_study_item_3"><?php text("techniques_php_self_study_item_3"); ?></li>
																<li wg-text="techniques_php_self_study_item_4"><?php text("techniques_php_self_study_item_4"); ?></li>
															</ul>
														</div>
														<div class="col-md-6 col-md-push-3 col-sm-4 techniques-php-code-background">
															<br class="hidden-sm hidden-xs" />
															<h3 class="pt0" wg-text="techniques_php_libraries_title"><?php text("techniques_php_libraries_title"); ?></h3>
															<ul class="list-disc">
																<li wg-text="techniques_php_libraries_item_1"><?php text("techniques_php_libraries_item_1"); ?></li>
																<li wg-text="techniques_php_libraries_item_2"><?php text("techniques_php_libraries_item_2"); ?></li>
																<li wg-text="techniques_php_libraries_item_3"><?php text("techniques_php_libraries_item_3"); ?></li>
																<li wg-text="techniques_php_libraries_item_4"><?php text("techniques_php_libraries_item_4"); ?></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											
											<br />
											<p><a class="techniques-display-area-close btn btn-default btn-sm" href="javascript:void(0);">&laquo; back</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="block-16-9-wrap">
								<div id="techniques-html" class="techniques-block block-16-9">
									<video autoplay loop id="techniques-html-video" class="techniques-video">
										<source src="./video/keyboard.mp4" type="video/mp4">
										Your browser does not support the video tag.
									</video>
									<div class="techniques-name-wrap">
										<div class="techniques-name pointer-cursor bg-color-b-4">
											<h1 wg-text="techniques_html_title"><?php text("techniques_html_title"); ?></h1>
										</div>
									</div>
								</div>
							</div>
							<div class="visible-xs">
								<div class="techniques-details techniques-display-area-xs techniques-display-area color-2 bg-color-3">
									<div class="techniques-display-area-html color-b-4 color-a-4 techniques-display-area-technique">
										<div class="container">
											<h1 wg-text="techniques_html_title"><?php text("techniques_html_title"); ?></h1>
											<div class="row">
												<div class="col-md-6">
													<p class="text-justify" wg-text="techniques_html_paragraph_1"><?php text("techniques_html_paragraph_1"); ?></p>
													<p class="text-justify" wg-text="techniques_html_paragraph_2"><?php text("techniques_html_paragraph_2"); ?></p>
												</div>
												<div class="col-md-6">
													<div class="row no-gutter">
														<div class="col-xs-5">
															<a class="techniques-html-switch-page btn btn-primary btn-lg" href="javascript:void(0);" onclick="$('#techniques-css').click()" wg-text="techniques_html_to_css_page"><?php text("techniques_html_to_css_page"); ?></a>
															<br />
															<br />
														</div>
														<div class="col-xs-5 col-xs-push-1">
															<a class="techniques-html-switch-page btn btn-success btn-lg" href="javascript:void(0);" onclick="$('#techniques-js').click()" wg-text="techniques_html_to_js_page"><?php text("techniques_html_to_js_page"); ?></a>
															<br />
															<br />
														</div>
													</div>
												</div>
											</div>
											
											<br />
											<p><a class="techniques-display-area-close btn btn-default btn-sm" href="javascript:void(0);">&laquo; back</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 visible-sm">
							<div class="techniques-display-area-wrap">
								<div class="techniques-display-area-sm techniques-display-area color-2 bg-color-3">
									<!-- empty first -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 row no-gutter">
						<div class="col-sm-6">
							<div class="block-16-9-wrap">
								<div id="techniques-css" class="techniques-block block-16-9 no-overflow">
									<style id="cool-style-0_0" class="pre-like pointer-cursor">
  #cool-style-0_0 {
      /** Look! I am styling myself! **/
      display: block;
      font-size: 1.4rem;
      font-family: monospace;
      position: absolute;
      top: -1.4em;
      color: #e3827f;
      text-shadow:
          .3px .3px .3px rgba(155,155,155,.4),
          .3px -.3px .3px rgba(155,155,155,.4),
          -.3px .3px .3px rgba(155,155,155,.4),
          -.3px -.3px .3px rgba(155,155,155,.4);
      -webkit-transition: color 1s, top 1s;
         -moz-transition: color 1s, top 1s;
           -o-transition: color 1s, top 1s;
              transition: color 1s, top 1s;
  }
  
  :hover > #cool-style-0_0 {
      /** I love css ._. **/
      color: #fcf8e3;
      top: -28em;
  }

									</style>
									<div class="techniques-name-wrap">
										<div class="techniques-name pointer-cursor bg-color-b-4">
											<h1 wg-text="techniques_css_title"><?php text("techniques_css_title"); ?></h1>
										</div>
									</div>
								</div>
							</div>
							<div class="visible-xs">
								<div class="techniques-details techniques-display-area-xs techniques-display-area color-2 bg-color-3">
									<div class="techniques-display-area-css color-b-4 color-a-4 techniques-display-area-technique">
										<div class="container">
											<h1 wg-text="techniques_css_title"><?php text("techniques_css_title"); ?></h1>
											
											<div class="row no-gutter">
												<div class="col-md-6">
													<div class="row">
														<div class="col-xs-12">
															<p class="text-justify" wg-text="techniques_css_paragraph_1"><?php text("techniques_css_paragraph_1"); ?></p>
															<p class="text-justify" wg-text="techniques_css_paragraph_2"><?php text("techniques_css_paragraph_2"); ?></p>
															<p class="text-justify" wg-text="techniques_css_paragraph_3"><?php text("techniques_css_paragraph_3"); ?></p>
															<p class="text-justify" wg-text="techniques_css_paragraph_4"><?php text("techniques_css_paragraph_4"); ?></p>
															<p class="text-justify" wg-text="techniques_css_paragraph_5"><?php text("techniques_css_paragraph_5"); ?></p>
														</div>
														<div class="col-xs-12">
															<div class="row no-gutter">
																<div class="col-sm-5 col-sm-offset-1 techniques-css-book-background">
																	<h3 wg-text="techniques_css_libraries_title"><?php text("techniques_css_libraries_title"); ?></h3>
																	<ul class="list-disc">
																		<li wg-text="techniques_css_libraries_item_1"><?php text("techniques_css_libraries_item_1"); ?></li>
																		<li wg-text="techniques_css_libraries_item_2"><?php text("techniques_css_libraries_item_2"); ?></li>
																		<li wg-text="techniques_css_libraries_item_3"><?php text("techniques_css_libraries_item_3"); ?></li>
																	</ul>
																</div>
																<div class="col-sm-5 techniques-css-wrench-background">
																	<h3 wg-text="techniques_css_other_techniques_title"><?php text("techniques_css_other_techniques_title"); ?></h3>
																	<ul class="list-disc">
																		<li wg-text="techniques_css_other_techniques_item_1"><?php text("techniques_css_other_techniques_item_1"); ?></li>
																		<li wg-text="techniques_css_other_techniques_item_2"><?php text("techniques_css_other_techniques_item_2"); ?></li>
																		<li wg-text="techniques_css_other_techniques_item_3"><?php text("techniques_css_other_techniques_item_3"); ?></li>
																		<li wg-text="techniques_css_other_techniques_item_4"><?php text("techniques_css_other_techniques_item_4"); ?></li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="container-fluid">
														<div class="row">
															<div class="col-md-8 col-md-push-2">
																<h3 wg-text="techniques_css_example_title"><?php text("techniques_css_example_title"); ?></h3>
																<div class="middle-wrap">
																	<div class="middle text-center">
																		<div class="techniques-css-transition-wrap">
																			<div class="techniques-css-transition">
																				<div class="techniques-css-transition-img transition-img-1"></div>
																				<div class="techniques-css-transition-img transition-img-2"></div>
																				<div class="techniques-css-transition-img transition-img-3"></div>
																				<div class="techniques-css-transition-img transition-img-4"></div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											
											<br />
											<p><a class="techniques-display-area-close btn btn-default btn-sm" href="javascript:void(0);">&laquo; back</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="block-16-9-wrap">
								<div id="techniques-js" class="techniques-block block-16-9">
									<div id="techniques-js-bg">
										<div></div>
										<div></div>
										<div></div>
										<div></div>
										<div></div>
										<div></div>
										<div></div>
										<div></div>
										<div></div>
										<div></div>
									</div>
									<div class="techniques-name-wrap">
										<div class="techniques-name pointer-cursor bg-color-b-4">
											<h1 wg-text="techniques_js_title"><?php text("techniques_js_title"); ?></h1>
										</div>
									</div>
								</div>
							</div>
							<div class="visible-xs">
								<div class="techniques-details techniques-display-area-xs techniques-display-area color-2 bg-color-3">
									<div class="techniques-display-area-js color-b-4 color-a-4 techniques-display-area-technique">
										<div class="container">
											<h1 wg-text="techniques_js_title_full"><?php text("techniques_js_title_full"); ?></h1>
											<div class="row">
												<div class="col-md-6">
													<p wg-text="techniques_js_paragraph_1" class="text-justify"><?php text("techniques_js_paragraph_1"); ?></p>
													<p wg-text="techniques_js_paragraph_2" class="text-justify"><?php text("techniques_js_paragraph_2"); ?></p>
													<p wg-text="techniques_js_paragraph_3" class="text-justify"><?php text("techniques_js_paragraph_3"); ?></p>
												</div>
												<div class="col-md-6">
													<div class="row">
														<div class="col-md-5 col-md-offset-1 techniques-js-code-background">
															<h3 class="pt0" wg-text="techniques_js_frameworks_title"><?php text("techniques_js_frameworks_title"); ?></h3>
															<ul class="list-disc">
																<li wg-text="techniques_js_frameworks_item_1"><?php text("techniques_js_frameworks_item_1"); ?></li>
																<li wg-text="techniques_js_frameworks_item_2"><?php text("techniques_js_frameworks_item_2"); ?></li>
															</ul>
														</div>
														<div class="col-md-5 techniques-js-book-background">
															<h3 class="pt0" wg-text="techniques_js_front_end_libraries_title"><?php text("techniques_js_front_end_libraries_title"); ?></h3>
															<ul class="list-disc">
																<li wg-text="techniques_js_front_end_libraries_item_1"><?php text("techniques_js_front_end_libraries_item_1"); ?></li>
																<li wg-text="techniques_js_front_end_libraries_item_2"><?php text("techniques_js_front_end_libraries_item_2"); ?></li>
																<li wg-text="techniques_js_front_end_libraries_item_3"><?php text("techniques_js_front_end_libraries_item_3"); ?></li>
																<li wg-text="techniques_js_front_end_libraries_item_4"><?php text("techniques_js_front_end_libraries_item_4"); ?></li>
																<li wg-text="techniques_js_front_end_libraries_item_5"><?php text("techniques_js_front_end_libraries_item_5"); ?></li>
																<li wg-text="techniques_js_front_end_libraries_item_6"><?php text("techniques_js_front_end_libraries_item_6"); ?></li>
															</ul>
														</div>
													</div>
													<div class="row">
														<div class="col-md-10 col-md-offset-1">
															<p class="text-justify" wg-text="techniques_js_libraries_paragraph_1"><?php text("techniques_js_libraries_paragraph_1"); ?></p>
														</div>
													</div>
												</div>
											</div>
											
											
											<br />
											<p><a class="techniques-display-area-close btn btn-default btn-sm" href="javascript:void(0);">&laquo; back</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 visible-sm">
							<div class="techniques-display-area-wrap">
								<div class="techniques-display-area-sm techniques-display-area color-2 bg-color-3">
									<!-- empty first -->
								</div>
							</div>
						</div>
					</div>
				</div><!-- .row.no-gutter -->
				
				
				<div class="row no-gutter hidden-xs hidden-sm">
					<div class="techniques-display-area-wrap">
						<div class="techniques-display-area-xl techniques-display-area color-2 bg-color-3">
							<!-- empty first -->
						</div>
					</div>
				</div>
				
				<!-- leave an empty space here for the anchor "scroll down" -->
				<!--<div class="cd-scroll-down-clear"></div>-->
				
				<a href="#interested" class="cd-scroll-down cd-image-replace">scroll down</a>
			</div>
		</section><!-- #techniques.cd-section -->
		
		<!-- interested -->
		<section id="interested" class="cd-section">
			<div class="content-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-1">
							<h1 wg-text="interested_title"><?php text("interested_title"); ?></h1>
						</div>
					</div>
				</div>
					
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-md-offset-1 md-text-right">
							<h2 class="slabo pt0" wg-text="interested_web_security_title"><?php text("interested_web_security_title"); ?></h2>
						</div>
						<div class="col-md-7">
							<p wg-text="interested_web_security_paragraph_1" class="text-justify"><?php text("interested_web_security_paragraph_1"); ?></p>
							<p wg-text="interested_web_security_paragraph_2" class="text-justify"><?php text("interested_web_security_paragraph_2"); ?></p>
							<p wg-text="interested_web_security_paragraph_3" class="text-justify"><?php text("interested_web_security_paragraph_3"); ?></p>
						</div>
					</div>
					
					<hr />
					
				</div>
					
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-md-push-7 col-md-offset-1">
							<h2 class="slabo pt0" wg-text="interested_cryptography_title"><?php text("interested_cryptography_title"); ?></h2>
						</div>
						<div class="col-md-7 col-md-pull-3">
							<p wg-text="interested_cryptography_paragraph_1" class="text-justify"><?php text("interested_cryptography_paragraph_1"); ?></p>
							<p wg-text="interested_cryptography_paragraph_2" class="text-justify"><?php text("interested_cryptography_paragraph_2"); ?></p>
						</div>
					</div>
					
				</div>
				
				<!-- slide down button for project example 1 -->
				<div class="container mt1 mb1">
					<div class="row">
						<div class="col-md-offset-1 col-md-10">
							<a href="javascript:void(0);" class="btn btn-default" onclick="showProjectExample('interested-cryptography-example-1');">
								<span wg-text="interested_project_example"><?php text("interested_project_example"); ?></span>
								<span wg-text="interested_cryptography_title"><?php text("interested_cryptography_title"); ?></span>:<br />
								<span><strong wg-text="interested_cryptography_example_1_title"><?php text("interested_cryptography_example_1_title"); ?></strong></span>
								&raquo;
							</a>
						</div>
					</div>
				</div>
				
				<!-- project example 1: php & javascript encrypter & decrypter -->
				<div id="interested-cryptography-example-1" class="interested-project-example bg-color-3 color-5" style="display: none;">
					<div class="container">
						<div class="row">
							<div class="col-lg-offset-1 col-lg-10 col-md-offset-0 col-md-12">
								<h2 wg-text="interested_cryptography_example_1_title"><?php text("interested_cryptography_example_1_title"); ?></h2>
								
								<div>
									<a href="https://portfolio.winghimjns.com/server_client_crypt/rsa.php" class="btn btn-link color-5 color-h-5 u" target="_blank">
										<i class="fa fa-external-link" aria-hidden="true"></i> &nbsp;<span wg-text="interested_cryptography_example_1_screen_product_1_title"><?php text("interested_cryptography_example_1_screen_product_1_title"); ?></span>
									</a>
								</div>
								<div>
									<a href="https://portfolio.winghimjns.com/server_client_crypt/aes.php" class="btn btn-link color-5 color-h-5 u" target="_blank">
										<i class="fa fa-external-link" aria-hidden="true"></i> &nbsp;<span wg-text="interested_cryptography_example_1_screen_product_2_title"><?php text("interested_cryptography_example_1_screen_product_2_title"); ?></span>
									</a>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<h4 wg-text="interested_project_introduction"><?php text("interested_project_introduction"); ?></h4>
										<p class="text-justify" wg-text="interested_cryptography_example_1_introduction_paragraph_1"><?php text("interested_cryptography_example_1_introduction_paragraph_1"); ?></p>
										<p class="text-justify" wg-text="interested_cryptography_example_1_introduction_paragraph_2"><?php text("interested_cryptography_example_1_introduction_paragraph_2"); ?></p>
										<p class="text-justify" wg-text="interested_cryptography_example_1_introduction_paragraph_3"><?php text("interested_cryptography_example_1_introduction_paragraph_3"); ?></p>
										<p class="text-justify" wg-text="interested_cryptography_example_1_introduction_paragraph_4"><?php text("interested_cryptography_example_1_introduction_paragraph_4"); ?></p>
										<ul class="list-disc">
											<li>
												<a href="https://code.google.com/archive/p/crypto-js/" class="btn btn-link btn-md color-5 color-h-5" target="_blank">
													<i class="fa fa-external-link" aria-hidden="true"></i> &nbsp;<span wg-text="interested_cryptography_example_1_introduction_item_1"><?php text("interested_cryptography_example_1_introduction_item_1");?></span>
												</a>
											</li>
											<li>
												<a href="https://github.com/travist/jsencrypt" class="btn btn-link color-5 btn-md color-h-5" target="_blank">
													<i class="fa fa-external-link" aria-hidden="true"></i> &nbsp;<span wg-text="interested_cryptography_example_1_introduction_item_2"><?php text("interested_cryptography_example_1_introduction_item_2");?></span>
												</a>
											</li>
											<li>
												<a href="http://phpseclib.sourceforge.net/" class="btn btn-link btn-md color-5 color-h-5" target="_blank">
													<i class="fa fa-external-link" aria-hidden="true"></i> &nbsp;<span wg-text="interested_cryptography_example_1_introduction_item_3"><?php text("interested_cryptography_example_1_introduction_item_3");?></span>
												</a>
											</li>
										</ul>
										<p class="text-justify" wg-text="interested_cryptography_example_1_introduction_paragraph_5"><?php text("interested_cryptography_example_1_introduction_paragraph_5"); ?></p>
									</div>
									<div class="col-md-6">
										
										<h4 wg-text="interested_project_screen_shots"><?php text("interested_project_screen_shots"); ?></h4>
										<div class="row">
											<div class="col-sm-6">
												<a href="./img/rsa_project_screen_shot.png" target="_blank">
													<img class="interested-project-img" src="./img/rsa_project_screen_shot.png" />
												</a>
												<h6 wg-text="interested_cryptography_example_1_screen_shot_description_1"><?php text("interested_cryptography_example_1_screen_shot_description_1"); ?></h6>
											</div>
											<div class="col-sm-6">
												<a href="./img/aes_project_screen_shot.png" target="_blank">
													<img class="interested-project-img" src="./img/aes_project_screen_shot.png" />
												</a>
												<h6 wg-text="interested_cryptography_example_1_screen_shot_description_2"><?php text("interested_cryptography_example_1_screen_shot_description_2"); ?></h6>
											</div>
										</div>
										
										<h4 wg-text="interested_project_guide"><?php text("interested_project_guide"); ?></h4>
										<ol class="list-decimal">
											<li><p wg-text="interested_cryptography_example_1_guild_paragraph_1"><?php text("interested_cryptography_example_1_guild_paragraph_1"); ?></p></li>
											<li><p wg-text="interested_cryptography_example_1_guild_paragraph_2"><?php text("interested_cryptography_example_1_guild_paragraph_2"); ?></p></li>
											<li><p wg-text="interested_cryptography_example_1_guild_paragraph_3"><?php text("interested_cryptography_example_1_guild_paragraph_3"); ?></p></li>
										</ol>
										<br />
										
									</div>
								</div>
								<div class="text-right">
									<a class="btn btn-default color-3 color-h-3" href="javascript:void(0);" onclick="hideProjectExample('interested-cryptography-example-1');">
										<i class="fa fa-window-close" aria-hidden="true"></i>&nbsp;Close
									</a>
								</div>
							</div>
						</div>
					</div>
					<br />
					<br />
				</div>
				
				<!-- slide down button for project example 2 -->
				<div class="container mt1 mb1">
					<div class="row">
						<div class="col-md-offset-1 col-md-10">
							<a href="javascript:void(0);" class="btn btn-default" onclick="showProjectExample('interested-cryptography-example-2');">
								<span wg-text="interested_project_example"><?php text("interested_project_example"); ?></span>
								<span wg-text="interested_cryptography_title"><?php text("interested_cryptography_title"); ?></span>:<br />
								<span><strong wg-text="interested_cryptography_example_2_title"><?php text("interested_cryptography_example_2_title"); ?></strong></span>
								&raquo;
							</a>
						</div>
					</div>
				</div>
				
				<!-- project example 2: ciphertext decryption online -->
				<div id="interested-cryptography-example-2" class="interested-project-example bg-color-3 color-5" style="display: none;">
					<div class="container">
						<div class="row">
							<div class="col-lg-offset-1 col-lg-10 col-md-offset-0 col-md-12">
								<h2 wg-text="interested_cryptography_example_2_title"><?php text("interested_cryptography_example_2_title"); ?></h2>
								
								<div>
									<a href="https://portfolio.winghimjns.com/password_crypt/" class="btn btn-link color-5 color-h-5 u" target="_blank">
										<i class="fa fa-external-link" aria-hidden="true"></i> &nbsp;<span wg-text="interested_cryptography_example_2_screen_product_title"><?php text("interested_cryptography_example_2_screen_product_title"); ?></span>
									</a>
									<br />
								</div>
								
								<div>
									<span wg-text="interested_cryptography_example_2_info_1"><?php text("interested_cryptography_example_2_info_1"); ?></span>: <code>Lyp9kHHHLB08qdIxI5bAcxIz1ie3On3r</code>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<h4 wg-text="interested_project_introduction"><?php text("interested_project_introduction"); ?></h4>
										<p wg-text="interested_cryptography_example_2_introduction_paragraph_1"><?php text("interested_cryptography_example_2_introduction_paragraph_1"); ?></p>
										<p wg-text="interested_cryptography_example_2_introduction_paragraph_2"><?php text("interested_cryptography_example_2_introduction_paragraph_2"); ?></p>
										<p wg-text="interested_cryptography_example_2_introduction_paragraph_3"><?php text("interested_cryptography_example_2_introduction_paragraph_3"); ?></p>
									</div>
									<div class="col-md-6">
										<h4 wg-text="interested_project_guide"><?php text("interested_project_guide"); ?></h4>
										<ol class="list-decimal">
											<li><span wg-text="interested_cryptography_example_2_guild_paragraph_1"><?php text("interested_cryptography_example_2_guild_paragraph_1"); ?></span></li>
											<li><span wg-text="interested_cryptography_example_2_guild_paragraph_2"><?php text("interested_cryptography_example_2_guild_paragraph_2"); ?></span></li>
										</ol>
										<h4 wg-text="interested_project_screen_shots"><?php text("interested_project_screen_shots"); ?></h4>
										<div class="row">
											<div class="col-sm-push-2 col-sm-8">
												<a href="./img/decryption_project_screen_shot.png" target="_blank">
													<img class="interested-project-img" src="./img/decryption_project_screen_shot.png" />
												</a>
												<h6 wg-text="interested_cryptography_example_2_screen_shot_description_1"><?php text("interested_cryptography_example_2_screen_shot_description_1"); ?></p>
											</div>
										</div>
										
									</div>
								</div>
								<div class="text-right">
									<a class="btn btn-default color-3 color-h-3" href="javascript:void(0);" onclick="hideProjectExample('interested-cryptography-example-2');">
										<i class="fa fa-window-close" aria-hidden="true"></i>&nbsp;Close
									</a>
								</div>
							</div>
						</div>
					</div>
					<br />
					<br />
				</div>
				
				<div class="container">
					<div class="row">
						<div class="col-md-offset-1 col-md-10">
							<hr />
						</div>
					</div>
				</div>
					
				<div class="container">
					<br />
					<div class="row">
						<div class="col-md-3 col-md-offset-1 md-text-right">
							<h2 class="slabo pt0" wg-text="interested_web_design_title"><?php text("interested_web_design_title"); ?></h2>
						</div>
						<div class="col-md-7">
							<p wg-text="interested_web_design_paragraph_1" class="text-justify"><?php text("interested_web_design_paragraph_1"); ?></p>
							<p wg-text="interested_web_design_paragraph_2" class="text-justify"><?php text("interested_web_design_paragraph_2"); ?></p>
							<p wg-text="interested_web_design_paragraph_3" class="text-justify"><?php text("interested_web_design_paragraph_3"); ?></p>
						</div>
					</div>
				</div>
				
				<!-- slide down button for project example 3 -->
				<div class="container mt1 mb1">
					<div class="row">
						<div class="col-md-offset-1 col-md-10">
							<a href="javascript:void(0);" class="btn btn-default" onclick="showProjectExample('interested-web_design-example-1');">
								<span wg-text="interested_project_example"><?php text("interested_project_example"); ?></span>
								<span wg-text="interested_web_design_title"><?php text("interested_web_design_title"); ?></span>:<br />
								<span><strong wg-text="interested_web_design_example_1_title"><?php text("interested_web_design_example_1_title"); ?></strong></span>
								&raquo;
							</a>
						</div>
					</div>
				</div>
				
				<!-- project example 3: soot sprites interactive animation -->
				<div id="interested-web_design-example-1" class="interested-project-example bg-color-3 color-5" style="display: none;">
					<div class="container">
						<div class="row">
							<div class="col-lg-offset-1 col-lg-10 col-md-offset-0 col-md-12">
								<h2 wg-text="interested_web_design_example_1_title"><?php text("interested_web_design_example_1_title"); ?></h2>
								
								<div>
									<a href="https://portfolio.winghimjns.com/sootsprites/" class="btn btn-link color-5 color-h-5 u" target="_blank">
										<i class="fa fa-external-link" aria-hidden="true"></i> &nbsp;<span wg-text="interested_web_design_example_1_screen_product_title"><?php text("interested_web_design_example_1_screen_product_title"); ?></span>
									</a>
									<br />
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<h4 wg-text="interested_project_introduction"><?php text("interested_project_introduction"); ?></h4>
										<p wg-text="interested_web_design_example_1_introduction_paragraph_1"><?php text("interested_web_design_example_1_introduction_paragraph_1"); ?></p>
										<a href="http://brm.io/matter-js/" class="btn btn-link color-5 color-h-5" target="_blank">
											<i class="fa fa-external-link" aria-hidden="true"></i> &nbsp;<span wg-text="interested_web_design_example_1_info_1"><?php text("interested_web_design_example_1_info_1"); ?></span>
										</a>
										<p wg-text="interested_web_design_example_1_introduction_paragraph_2"><?php text("interested_web_design_example_1_introduction_paragraph_2"); ?></p>
										<p wg-text="interested_web_design_example_1_introduction_paragraph_3"><?php text("interested_web_design_example_1_introduction_paragraph_3"); ?></p>
									</div>
									<div class="col-md-6">
										<h4 wg-text="interested_project_screen_shots"><?php text("interested_project_screen_shots"); ?></h4>
										<a href="./img/decryption_project_screen_shot.png" target="_blank">
											<img class="interested-project-img" src="./img/sootsprites_project_screen_shot.png" />
										</a>
										<h6 wg-text="interested_web_design_example_1_screen_shot_description_1"><?php text("interested_web_design_example_1_screen_shot_description_1"); ?></p>
									</div>
								</div>
								<div class="text-right">
									<a class="btn btn-default color-3 color-h-3" href="javascript:void(0);" onclick="hideProjectExample('interested-web_design-example-1');">
										<i class="fa fa-window-close" aria-hidden="true"></i>&nbsp;Close
									</a>
								</div>
							</div>
						</div>
					</div>
					<br />
					<br />
				</div>
				
				<!-- slide down button for project example 4 -->
				<div class="container mt1 mb1">
					<div class="row">
						<div class="col-md-offset-1 col-md-10">
							<a href="javascript:void(0);" class="btn btn-default" onclick="showProjectExample('interested-web_design-example-2');">
								<span wg-text="interested_project_example"><?php text("interested_project_example"); ?></span>
								<span wg-text="interested_web_design_title"><?php text("interested_web_design_title"); ?></span>:<br />
								<span><strong wg-text="interested_web_design_example_1_title"><?php text("interested_web_design_example_2_title"); ?></strong></span>
								&raquo;
							</a>
						</div>
					</div>
				</div>
				
				<!-- project example 4: soot sprites interactive animation -->
				<div id="interested-web_design-example-2" class="interested-project-example bg-color-3 color-5" style="display: none;">
					<div class="container">
						<div class="row">
							<div class="col-lg-offset-1 col-lg-10 col-md-offset-0 col-md-12">
								<h2 wg-text="interested_web_design_example_2_title"><?php text("interested_web_design_example_2_title"); ?></h2>
								
								<div>
									<a href="https://portfolio.winghimjns.com/index_v4.5.p.html" class="btn btn-link color-5 color-h-5 u" target="_blank">
										<i class="fa fa-external-link" aria-hidden="true"></i> &nbsp;<span wg-text="interested_web_design_example_2_screen_product_title"><?php text("interested_web_design_example_2_screen_product_title"); ?></span>
									</a>
									<br />
								</div>
								
								<div class="row">
									<div class="col-md-7">
										<h4 wg-text="interested_project_introduction"><?php text("interested_project_introduction"); ?></h4>
										<p wg-text="interested_web_design_example_2_introduction_paragraph_1"><?php text("interested_web_design_example_2_introduction_paragraph_1"); ?></p>
										<p wg-text="interested_web_design_example_2_introduction_paragraph_2"><?php text("interested_web_design_example_2_introduction_paragraph_2"); ?></p>
										<p wg-text="interested_web_design_example_2_introduction_paragraph_3"><?php text("interested_web_design_example_2_introduction_paragraph_3"); ?></p>
									</div>
									<div class="col-md-5">
										<h4 wg-text="interested_project_screen_shots"><?php text("interested_project_screen_shots"); ?></h4>
										<a href="./img/decryption_project_screen_shot.png" target="_blank">
											<img class="interested-project-img" src="./img/previous_portfolio_screen_shot.png" />
										</a>
										<h6 wg-text="interested_web_design_example_2_screen_shot_description_1"><?php text("interested_web_design_example_2_screen_shot_description_1"); ?></p>
									</div>
								</div>
								<div class="text-right">
									<a class="btn btn-default color-3 color-h-3" href="javascript:void(0);" onclick="hideProjectExample('interested-web_design-example-2');">
										<i class="fa fa-window-close" aria-hidden="true"></i>&nbsp;Close
									</a>
								</div>
							</div>
						</div>
					</div>
					<br />
					<br />
				</div>
				
				
				<div class="container">
					<div class="row">
						<div class="col-md-offset-1 col-md-10">
							<hr />
						</div>
					</div>
				</div>
				
				
				<br />
				<br />
				<br />
				
				<a href="#contact" class="cd-scroll-down cd-image-replace">scroll down</a>
			</div>
		</section><!-- #interested.cd-section -->
		
		<!-- contact -->
		<section id="contact" class="cd-section">
			
			<!-- background-image -->
			<div id="contact-background" class="bg-color-a-5"></div>
			
			<div class="content-wrapper">
				
				<div id="contact-middle-wrap" class="middle-wrap">
					<div id="contact-middle" class="middle">
						<div id="contact-content">
							
							
							<div class="container">
								
								<br />
								<br />
								<br />
							
								<div class="row">
									<div class="col-md-8 col-md-offset-2">
										<!-- contact title -->
										<h1 class="text-center" wg-text="contact_title"><?php text("contact_title"); ?></h1>
									</div>
								</div>
									
								<div class="row">
									<div class="col-md-4 col-md-offset-4">
										<p wg-text="contact_paragraph_1" class="text-center"><?php text("contact_paragraph_1"); ?></p>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-8 col-md-offset-2">
										<hr />
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-4 col-md-offset-4">
							
										<!-- items -->
										<ul id="contact-items">
											<li class="text-center"><strong wg-text="contact_item_1"><?php text("contact_item_1"); ?></strong></li>
											<li class="text-center"><strong wg-text="contact_item_2"><?php text("contact_item_2"); ?></strong></li>
											<li class="text-center"><strong wg-text="contact_item_3"><?php text("contact_item_3"); ?></strong></li>
										</ul>
									</div>
								</div>
								
								<br />
								<br />
								
								<br />
								<br />
								<br />
								
							</div>
							
						</div>
					</div>
				</div>
				
			</div>
		</section><!-- #contact.cd-section -->
		
		<!-- html5 reset -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" integrity="sha256-gvEnj2axkqIj4wbYhPjbWV7zttgpzBVEgHub9AAZQD4=" crossorigin="anonymous" />
		
		<!-- font awesome -->
		<!--
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
		-->
		
		<!-- bootstrap css -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha256-916EbMg70RQy9LHiGkXzG8hSg9EdNy97GazNG/aiY1w=" crossorigin="anonymous" />
		
		<!-- jquery -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js" integrity="sha256-gvQgAFzTH6trSrAWoH1iPo9Xc96QxSZ3feW6kem+O00=" crossorigin="anonymous"></script>
		
		<!-- detect mobile browser -->
		<script type="text/javascript" src="./js/detectmobilebrowser.js" onload="$('html').addClass($.browser.mobile ? 'mobile-browser' : 'not-mobile-browser');"></script>
		
		<!-- modernizr -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" integrity="sha256-0rguYS0qgS6L4qVzANq4kjxPLtvnp5nn2nB5G1lWRv4=" crossorigin="anonymous"></script>
		
		<!-- vertical-fixed-navigation-2 : a plugin for nav, please check it on https://github.com/CodyHouse/vertical-fixed-navigation-2 -->
		<link rel="stylesheet" href="./vertical-fixed-navigation-2/css/style.css<?php v(); ?>" />
		<script type="text/javascript" src="./vertical-fixed-navigation-2/js/main.js<?php v(); ?>"></script>
		
		<!-- bootstrap js -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha256-U5ZEeKfGNOja007MMD3YBI0A3OSZOQbeG6z2f2Y0hu8=" crossorigin="anonymous"></script>
		
		<!-- particle background plugin -->
		<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" type="text/javascript" language="javascript"></script>
		
		<!-- google fonts -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:700|Slabo+27px|Raleway" rel="stylesheet" />
		
		<!-- font awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
		
		<!-- custom css -->
		<link rel="stylesheet" href="./css/style.css<?php v(); ?>" />
		
		<!-- custom script -->
		<script type="text/javascript" language="javascript" src="./js/main.js<?php v(); ?>"></script>

		<!-- :D -->
		<script type="text/javascript">eval(atob("dmFyIGU9MzskKCJbZWVdIikuY2xpY2soZnVuY3Rpb24oKXshLS1lJiYkKHRoaXMpLmNzcyh7YmFja2dyb3VuZEltYWdlOiJ1cmwoLi9pbWcvcnIuZ2lmKSJ9KXwobmV3IEF1ZGlvKCIuL2Fzc2V0cy9yci5tcDMiKSkucGxheSgpfSk7"));</script>
		
		<!-- google analytics -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-90935716-1', 'auto');
			ga('send', 'pageview');
		</script>

	</body>
</html>
