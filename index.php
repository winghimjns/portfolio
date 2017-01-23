<?php

$debug = !isset($_GET["nodebug"]);
//$debug = isset($_GET["debug"]);

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
		
		<!-- meta -->
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
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
			
		</style>
		
	</head>
	<body>
		
		<!-- loading cover -->
		<div id="loading-cover"></div>
		
		<!-- particles-js backgrougnd -->
		<div id="particles-js"></div>
		
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
						<div class="col-sm-4 col-sm-push-1 sm-text-right">
							<h1 class="about-title" wg-text="about_title"><?php text("about_title"); ?></h1>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2 col-sm-offset-2">
							<div id="programmer-svg-wrap">
								<img id="exclamation_mark-svg" src="./img/exclamation_mark.svg<?php v(); ?>" />
							</div>
								
						</div>
						<div class="col-sm-6 col-sm-offset-1 text-justify">
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
									<h1 wg-text="techniques_title"><?php text("techniques_title"); ?></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<p wg-text="techniques_paragraph_1"><?php text("techniques_paragraph_1"); ?></p>
					<br />
					<br />
				</div>
				<div class="row no-gutter">
					<div class="col-sm-12 col-md-6 row no-gutter">
						<div class="col-sm-6">
							<div class="block-16-9-wrap">
								<div id="techniques-php" class="techniques-block block-16-9">
									<video autoplay loop id="techniques-php-video">
										<source src="./video/programming.mp4" type="video/mp4">
										Your browser does not support the video tag.
									</video>
									<div class="techniques-name-wrap">
										<div class="techniques-name pointer-cursor">
											<h1 wg-text="techniques_php_title"><?php text("techniques_php_title"); ?></h1>
										</div>
									</div>
								</div>
							</div>
							<div class="visible-xs">
								<div class="techniques-details techniques-display-area-xs techniques-display-area">
									<div class="techniques-display-area-php">
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
															<div class="progress-bar progress-bar-danger" style="width: 20%;">school 20%</div>
															<div class="progress-bar progress-bar-success" style="width: 60%;">self-study 60%</div>
														</div>
													</div>
													<div class="row no-gutter">
														<div class="col-md-6 col-sm-4 techniques-php-baby-background">
															<h3 class="pt0">Learn from school</h3>
															<ul class="list-disc">
																<li>Basic Syntax</li>
																<li>MySQL</li>
																<li>JSON</li>
																<li>etc.</li>
															</ul>
														</div>
														<div class="col-md-6 col-sm-4 techniques-php-suit-background">
															<h3 class="pt0">Self-study</h3>
															<ul class="list-disc">
																<li>Object-oriented (inc. namespace)</li>
																<li>PDO extension</li>
																<li>mcrypt extension</li>
																<li>etc.</li>
															</ul>
														</div>
														<div class="col-md-6 col-md-push-3 col-sm-4 techniques-php-code-background">
															<br class="hidden-sm hidden-xs" />
															<h3 class="pt0">Libraries / Tools</h3>
															<ul class="list-disc">
																<li>Phpseclib <small>(A PHP encryption library)</small></li>
																<li>Wordpress</li>
																<li>Owncloud</li>
																<li>etc.</li>
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
									<video autoplay loop id="techniques-html-video">
										<source src="./video/keyboard.mp4" type="video/mp4">
										Your browser does not support the video tag.
									</video>
									<div class="techniques-name-wrap">
										<div class="techniques-name pointer-cursor">
											<h1 wg-text="techniques_html_title"><?php text("techniques_html_title"); ?></h1>
										</div>
									</div>
								</div>
							</div>
							<div class="visible-xs">
								<div class="techniques-details techniques-display-area-xs techniques-display-area">
									<div class="techniques-display-area-html">
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
															<a class="techniques-html-switch-page btn btn-primary btn-lg" href="javascript:void(0);" onclick="$('#techniques-css').click()">Go to CSS page &raquo;</a>
															<br />
															<br />
														</div>
														<div class="col-xs-5 col-xs-push-1">
															<a class="techniques-html-switch-page btn btn-success btn-lg" href="javascript:void(0);" onclick="$('#techniques-js').click()">Go to JS page &raquo;</a>
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
								<div class="techniques-display-area-sm techniques-display-area">
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
										<div class="techniques-name pointer-cursor">
											<h1 wg-text="techniques_css_title"><?php text("techniques_css_title"); ?></h1>
										</div>
									</div>
								</div>
							</div>
							<div class="visible-xs">
								<div class="techniques-details techniques-display-area-xs techniques-display-area">
									<div class="techniques-display-area-css">
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
																	<h3>CSS Libraries</h3>
																	<ul class="list-disc">
																		<li>Bootstrap</li>
																		<li>Milligram</li>
																		<li>Pure.css</li>
																	</ul>
																</div>
																<div class="col-sm-5 techniques-css-wrench-background">
																	<h3>Other techniques</h3>
																	<ul class="list-disc">
																		<li>Transition / Animation</li>
																		<li>Transform</li>
																		<li>SCSS</li>
																		<li>LESS</li>
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
																<h3>Example for transition / animation</h3>
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
										<div class="techniques-name pointer-cursor">
											<h1 wg-text="techniques_js_title"><?php text("techniques_js_title"); ?></h1>
										</div>
									</div>
								</div>
							</div>
							<div class="visible-xs">
								<div class="techniques-details techniques-display-area-xs techniques-display-area">
									<div class="techniques-display-area-js">
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
															<h3 class="pt0">Frameworks</h3>
															<ul class="list-disc">
																<li>jQuery</li>
																<li>AngularJS</li>
															</ul>
														</div>
														<div class="col-md-5 techniques-js-book-background">
															<h3 class="pt0">Some Front-End Libraries</h3>
															<ul class="list-disc">
																<li>Matter.js</li>
																<li>Particle.js</li>
																<li>crypto-js</li>
																<li>parallex</li>
																<li>etc.</li>
															</ul>
														</div>
													</div>
													<div class="row">
														<div class="col-md-10 col-md-offset-1">
															<p wg-text="techniques_js_libraries_paragraph_1" class="text-justify">As there are different kind of JavaScript libraries and all of them have different purpose, we don't need to compare them. But those are all good and helpful for development. </p>
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
								<div class="techniques-display-area-sm techniques-display-area">
									<!-- empty first -->
								</div>
							</div>
						</div>
					</div>
				</div><!-- .row.no-gutter -->
				
				
				<div class="row no-gutter hidden-xs hidden-sm">
					<div class="techniques-display-area-wrap">
						<div class="techniques-display-area-xl techniques-display-area">
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
					<h1 wg-text="interested_title"><?php text("interested_title"); ?></h1>
					
					<p></p>
					
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
					
					<div class="row">
						<div class="col-md-3 col-md-push-7 col-md-offset-1">
							<h2 class="slabo pt0" wg-text="interested_cryptography_title"><?php text("interested_cryptography_title"); ?></h2>
						</div>
						<div class="col-md-7 col-md-pull-3">
							<p wg-text="interested_cryptography_paragraph_1" class="text-justify"><?php text("interested_cryptography_paragraph_1"); ?></p>
							<p wg-text="interested_cryptography_paragraph_2" class="text-justify"><?php text("interested_cryptography_paragraph_2"); ?></p>
						</div>
					</div>
					
					<hr />
					
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
					
					<hr />
					<br />
					<br />
					<br />
					
				</div>
				<a href="#contact" class="cd-scroll-down cd-image-replace">scroll down</a>
			</div>
		</section><!-- #interested.cd-section -->
		
		<!-- contact -->
		<section id="contact" class="cd-section">
			
			<!-- background-image -->
			<div id="contact-background"></div>
			
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
										<h1 wg-text="contact_title"><?php text("contact_title"); ?></h1>
									</div>
								</div>
									
								<div class="row">
									<div class="col-md-4 col-md-offset-2">
										<p wg-text="contact_paragraph_1" class="text-justify"><?php text("contact_paragraph_1"); ?></p>
									</div>
									<div class="col-md-4">
							
										<!-- items -->
										<ul id="contact-items">
											<li><strong>Wing Him Liu</strong></li>
											<li><strong>winghim@outlook.com</strong></li>
											<li><strong>(+44) 0786 469 8759</strong></li>
										</ul>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-8 col-md-offset-2">
										<hr />
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
		<!--link href="./vertical-fixed-navigation-2/css/style.css" rel="stylesheet" />-->
		<link rel="stylesheet" href="./vertical-fixed-navigation-2/css/style.css<?php v(); ?>" />
		<script type="text/javascript" src="./vertical-fixed-navigation-2/js/main.js<?php v(); ?>"></script>
		
		<!-- bootstrap js -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha256-U5ZEeKfGNOja007MMD3YBI0A3OSZOQbeG6z2f2Y0hu8=" crossorigin="anonymous"></script>
		
		<!-- particle background plugin -->
		<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" type="text/javascript" language="javascript"></script>
		
		<!-- parallax.js -->
		<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/2.1.3/jquery.parallax.min.js" integrity="sha256-4u4WqRB9kBJl3fq6NvRuyvScYg4BATiL6Smqh1bJB1s=" crossorigin="anonymous"></script>-->
		
		<!-- google fonts -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:700|Slabo+27px|Raleway" rel="stylesheet" />
		
		<!-- custom css -->
		<link rel="stylesheet" href="./css/style.css<?php v(); ?>" />
		
		<!-- text -->
		<script type="text/javascript">
			window.textsJson = <?php echo($text_json); ?>;
		</script>
		
		<!-- custom script -->
		<script type="text/javascript" language="javascript" src="./js/main.js<?php v(); ?>"></script>
		
		<!-- resources preload -->
		<img class="preload" src="./img/programmer_stop.svg" />
		
	</body>
</html>
