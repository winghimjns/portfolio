<?php

$debug = !isset($_GET["nodebug"]);
//$debug = isset($_GET["debug"]);
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
		
		<!-- styles for loading background -->
		<style type="text/css">
			
			html {
				overflow-x: hidden;
			}
			
			@-webkit-keyframes loading-icon {
				0% {
					-webkit-transform: rotate(0deg);
					   -moz-transform: rotate(0deg);
						 -o-transform: rotate(0deg);
							transform: rotate(0deg);
				}
				50% {
					-webkit-transform: rotate(400deg);
					   -moz-transform: rotate(400deg);
						 -o-transform: rotate(400deg);
							transform: rotate(400deg);
				}
				100% {
					-webkit-transform: rotate(0deg);
					   -moz-transform: rotate(0deg);
						 -o-transform: rotate(0deg);
							transform: rotate(0deg);
				}
			}
			
			@keyframes loading-icon {
				0% {
					-webkit-transform: rotate(0deg);
					   -moz-transform: rotate(0deg);
						 -o-transform: rotate(0deg);
							transform: rotate(0deg);
				}
				50% {
					-webkit-transform: rotate(400deg);
					   -moz-transform: rotate(400deg);
						 -o-transform: rotate(400deg);
							transform: rotate(400deg);
				}
				100% {
					-webkit-transform: rotate(0deg);
					   -moz-transform: rotate(0deg);
						 -o-transform: rotate(0deg);
							transform: rotate(0deg);
				}
			}
			
			#loading-background {
				position: fixed;
				z-index: 9999; /** the most top **/
				top: 0; left: 0;
				width: 100%; height: 100%;
				background-color: rgba(45,45,45,1);
				text-align: right;
				-webkit-transition: top .5s .5s, background-color .5s .5s;
				   -moz-transition: top .5s .5s, background-color .5s .5s;
				     -o-transition: top .5s .5s, background-color .5s .5s;
				        transition: top .5s .5s, background-color .5s .5s;
				
				-webkit-animation: loading-bg .5s linear;
				   -moz-animation: loading-bg .5s linear;
				     -o-animation: loading-bg .5s linear;
				        animation: loading-bg .5s linear;
			}
			
			#loading-background:before {
				font-family: Calibri, Arial;
				content: 'Portfolio - Wing Him Liu  ';
				color: #FFF;
				font-size: 6rem;
				text-align: right;
				font-weight: bold;
				margin-right: 2rem;
				width: 100%;
			}
			
			#loading-background:after {
				position: absolute;
				bottom: 1rem;
				left: 1rem;
				height: 6rem;
				width: 6rem;
				content: '';
				background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEsAAABICAQAAAAU08DPAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAJcEhZcwAAeiAAAHogAWkzVdMAAAAHdElNRQfhARUVCA8J4BqYAAAGYElEQVRo3s2aT4gl1RWHv7r12u6hh5DGSSAmGSeDDjijzqyGQBCyCJK4yE4huJOAoAuDW4UQ3CrM6CLjQlyIzFZ6oSIRAhIngsb/MQ5o4iQhkAx0K93aPa+qviyqXv3pV6+qXjsO79Sm+3HuOb977r3nnHvuiZibBIiQ7/ELjnOMH/JdvsUyIxJ2+YL/8k8u8hEv828ihGh+JfuBVXwvq6ntlKgviZH5NOakUY9VGhRVf8gKPwLS4ueoMUwyYo6ywk5urx55w2FZjY3IWgRnjIGY0KIr1zduHQeBwoTOBBbafqwZPgAZYWp8xKh9bEP2qGVcIKv0zlriFtE1xpiMVU42likwAmRM2gMrZYxQm0Au5ySrZMQt+mZTuaEjY/GUF9SzYjAyGIs48rSPuqlmM7Z8pm76qKcdiRgX4/FJ9XVPiXF+IAYcihJUMIgPul2ctmeMi3N1xEd8a+YJ3Eupb/mIR4qxsc8U8rZ9sNTSB6wGCpc9p6amZo7V8468zWf9vLDGeKalKotNeD73WW9z5Hl1bGZiqp5zudDVBawB6npfKURMZq1vu6Gl0KGUmpipG75d83P5VF/x+h5gDVA3+KY63iM+h9Rno3a75eOa0xmrb3pDB7A9oN6ZApUD2w+kCtq0jcfqOx3AaqDWfKMV1DdDY/UN1ypg06Aig8H1awhqAmzdYJi4izZbPX6NQU2APd5ir8Lh4T3msf9aU6LeU2Aow0GeEskyf+E4WW+su/qUEfgbp9glwogqJkrELq/BJOrPQSIZKSkp2ZBY0gIL/piDajuJkU/PtYyZSSt3Mpd/S9Snmxt+soj53xEZZ3ho0EJaZgFX+Bf/YINdllnjCD/gOgDSloSofQHP8psqC4sqDY2s4akBFssD0JYveJ/HXSlzgcgVj3ufL7hlHnj6LfXUzGyiBBaLz/XCStQtz3jzJFsvfF4o/8ObPePWIEnPTc7gLC8fi3dq577ITNRXPVGAGVWOsAQ4+e2Er2rPPsvUOytg7Vse1ztnmEe2x4rsKdTg7P1CkaE9Znc0TdT10upTy5d72dOdRs9BPTANqWU7VNAesC/MJ56uh2up74sl8Qm7gk+iPiyO6svW7shK+4/EhztXYKw+IS5V+5PaGcIDftKxsxL1XBNUt4+tATvXASxTP/GANSyR8G2+Q0Zgmzs4P9PTZAQ+4idsTHxxv0sq/aGs8Sdu6fCH8iteY5WUmMts4E1+bOqX7vhVZ+6QqndLcZPphdSw2Ui8WzuT7bFfueOXpl70KN7fw16BujDHFarNUV8YrOn+wK1QBNgubQLPk04unUNrMCVfTMrz0KnBIujDrYFjQCAqvllDYrZ5kbwUMldhqOBNgRfZJp4JbIIgAMcChwfoEXiPzxh4M58h4TPeGyAhAg4HDg0QmgEfTpZw3iJawR+T8iHD8rlDgYMDNV3aB6K96C4N5DsYityonza+BqR5ZVx37fP2QRS4MpBz7SpoGyrjSmCLYefr8EC+WWQhYwjfVuDyANYAnCDOvda82Ar+lJgTMOi6dzlwaYCmCLidG9n/WYyAG7l9gASBS4GL9AefiJRV7oLcc81jr4I3Bu5ilbQjklTB52LgA/qDTz7HeyfLOBxYyZcSc2+nrerB5wM86sUFS2w+9qZIWOMQKfFCpIEZgf+xuaBJ88JeMRbzQtYQtjjX1wasBb3sL0xpZNRwevmZ3+w9+TEpB3iIX/MH1vkzn7JbZJ0RKxzlx/ySn7FKVl1KOmizdCNM3hgXuey2eEXKClQk/t79VOUzM1MTExNTs308wYzNHXX54D55q84L4D9lWD7UpOYT+n4oAHewXNWaqwJ4zC6/5etloPslgd+xu+dyW/PyC/e4snhPUQv6cLewz5wL+ig8BWxRntCngE0aDpJvoOEgnaPhYA+wxWnPaACbNLO8rj7p1WtmOatemLOZpQEsz4IOetLYqBQRikx+yfedfcVK1fddKrL5UE41MvakB+sZVhuolv6t2hNoSmCbdwlUQSkjIyJiqTeTilkiAZLajCPkXSJC1c/UFk5bA3Ptep33WmVTU5Kkt9yYkbSMy4qesL2a+qy1x2Y1K0fFD8WElpjdhJcSWJpMujGuVj2dnXZ0pDHR1NdYjB0+BUJRv2gOC8TA39mhkZHPlNeie24qGzy/z8+5ZWaD5195if/st8Hz/3aeHFcgNFYfAAAAJXRFWHRkYXRlOmNyZWF0ZQAyMDE3LTAxLTIxVDIxOjA4OjE1LTA1OjAw4iyBSwAAACV0RVh0ZGF0ZTptb2RpZnkAMjAxNy0wMS0yMVQyMTowODoxNS0wNTowMJNxOfcAAAAZdEVYdFNvZnR3YXJlAHd3dy5pbmtzY2FwZS5vcmeb7jwaAAAAD3RFWHRUaXRsZQBCbHVlIEdlYXI4yzfBAAAAAElFTkSuQmCC');
				background-size: contain;
				background-repeat: no-repeat;
				background-position: 50% 50%;
				
				-webkit-transform: rotate(0deg);
				   -moz-transform: rotate(0deg);
				     -o-transform: rotate(0deg);
				        transform: rotate(0deg);
				
				-webkit-animation: loading-icon 3s infinite;
				   -moz-animation: loading-icon 3s infinite;
					 -o-animation: loading-icon 3s infinite;
						animation: loading-icon 3s infinite;
				
				-webkit-transition: -webkit-transform .5s .5s;
				   -moz-transition:    -moz-transform .5s .5s;
				     -o-transition: 	 -o-transform .5s .5s;
				        transition: 		transform .5s .5s;
			}
			
			html.load-done #loading-background {
				top: -100%;
				background-color: rgba(255,255,255,1);
			}
			
			html.load-done #loading-background:after {
				-webkit-transform: rotate(400deg);
				   -moz-transform: rotate(400deg);
					 -o-transform: rotate(400deg);
						transform: rotate(400deg);
			}
			
		</style>
		
	</head>
	<body>
		
		<!-- loading background -->
		<div id="loading-background"></div>
		
		<!-- particles-js background -->
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
						<div class="col-sm-6 col-sm-offset-5 text-justify">
							<p wg-text="about_paragraph_1"><?php text("about_paragraph_1"); ?></p>
							<p wg-text="about_paragraph_2"><?php text("about_paragraph_2"); ?></p>
							<p wg-text="about_paragraph_3"><?php text("about_paragraph_3"); ?></p>
						</div>
					</div>
					<div class="row hidden-xs">
						<div class="col-sm-2 col-sm-offset-2 fill-height text-justify">
							<div id="programmer-svg-wrap">
								<img id="programmer-svg" src="./img/programmer.svg<?php v(); ?>" />
								<img id="exclamation_mark-svg" src="./img/exclamation_mark.svg<?php v(); ?>" />
							</div>
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
