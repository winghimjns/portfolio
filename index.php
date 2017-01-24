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
						<div class="col-sm-3 col-sm-offset-1 col-lg-2 col-lg-offset-2 hidden-xs">
							<div id="programmer-svg-wrap" ee>
								<img id="exclamation_mark-svg" src="./img/exclamation_mark.svg<?php v(); ?>" />
							</div>
						</div>
						<div class="col-sm-7 col-md-6 col-md-offset-1 text-justify">
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
										<div class="techniques-name pointer-cursor bg-color-b-4 color-5">
											<h1 class="color-5" wg-text="techniques_php_title"><?php text("techniques_php_title"); ?></h1>
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
										<div class="techniques-name pointer-cursor bg-color-b-4 color-5">
											<h1 class="color-5" wg-text="techniques_html_title"><?php text("techniques_html_title"); ?></h1>
										</div>
									</div>
								</div>
							</div>
							<div class="visible-xs">
								<div class="techniques-details techniques-display-area-xs techniques-display-area color-2">
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
								<div class="techniques-display-area-sm techniques-display-area color-2">
									<!-- empty first -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-6 row no-gutter">
						<div class="col-sm-6">
							<div class="block-16-9-wrap">
								<div id="techniques-css" class="techniques-block block-16-9 no-overflow bg-color-3">
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
										<div class="techniques-name pointer-cursor bg-color-b-4 color-5">
											<h1 class="color-5" wg-text="techniques_css_title"><?php text("techniques_css_title"); ?></h1>
										</div>
									</div>
								</div>
							</div>
							<div class="visible-xs">
								<div class="techniques-details techniques-display-area-xs techniques-display-area color-2">
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
										<div class="techniques-name pointer-cursor bg-color-b-4 color-5">
											<h1 class="color-5" wg-text="techniques_js_title"><?php text("techniques_js_title"); ?></h1>
										</div>
									</div>
								</div>
							</div>
							<div class="visible-xs">
								<div class="techniques-details techniques-display-area-xs techniques-display-area color-2">
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
								<div class="techniques-display-area-sm techniques-display-area color-2">
									<!-- empty first -->
								</div>
							</div>
						</div>
					</div>
				</div><!-- .row.no-gutter -->
				
				
				<div class="row no-gutter hidden-xs hidden-sm">
					<div class="techniques-display-area-wrap">
						<div class="techniques-display-area-xl techniques-display-area color-2">
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
					
					<hr />
					
				</div>
					
				<div class="container">
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
		
		<!-- custom script -->
		<script type="text/javascript" language="javascript" src="./js/main.js<?php v(); ?>"></script>
		
		<!-- resources preload -->
		<img class="preload" src="./img/programmer_stop.svg" />

		<!-- :D -->
		<script type="text/javascript">eval(atob("dmFyIGU9MzskKCJbZWVdIikuY2xpY2soZnVuY3Rpb24oKXshLS1lJiYkKHRoaXMpLmNzcyh7YmFja2dyb3VuZEltYWdlOiJ1cmwoLi9pbWcvcnIuZ2lmKSJ9KXwobmV3IEF1ZGlvKCIuL2Fzc2V0cy9yci5tcDMiKSkucGxheSgpfSk7"));</script>
	</body>
</html>
