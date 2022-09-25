<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <base href="<?=base_url()?>">
		<title>Imsupex</title>
		<meta name="description" content="Imsufex">
		<meta name="author" content="Imsufex">
		
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
                <link rel="shortcut icon" href="assets/frontend/images/favicon.ico">
		
		    	
		<!-- CSS StyleSheets -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&amp;amp;subset=latin,latin-ext">
		<link rel="stylesheet" href="assets/frontend/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/frontend/css/animate.css">
		<link rel="stylesheet" href="assets/frontend/css/prettyPhoto.css">
		<link rel="stylesheet" href="assets/frontend/css/slick.css">
		<link rel="stylesheet" href="assets/frontend/rs-plugin/css/settings.css">
                
                <!-- Gallery CSS -->
		<link rel="stylesheet" href="assets/frontend/css/gallery.css">
		<!-- End of Gallery CSS -->
                
		<link rel="stylesheet" href="assets/frontend/css/style.css">
		<link rel="stylesheet" href="assets/frontend/css/responsive.css">
		<!--[if lt IE 9]>
	    	<link rel="stylesheet" href="assets/frontend/css/ie.css">
	    	<script type="text/javascript" src="assets/frontend/js/html5.js"></script>
	    <![endif]-->


		<!-- Skin style (** you can change the link below with the one you need from skins folder in the css folder **) -->
		<link rel="stylesheet" href="assets/frontend/css/skins/default.css">
	
	</head>
	<body>
	    
	    <!-- site preloader start -->
	    <div class="page-loader">
	    	<div class="loader-in"></div>
	    </div>
	    <!-- site preloader end -->
	    
	    <div class="pageWrapper">

			<!-- Header Start -->
			<div id="headWrapper" class="clearfix">
		    	
		    	<!-- top bar start -->
		    	<div class="top-bar">
				    <div class="container">
						<div class="row">
							<div class="cell-5">
							    <ul>
								    <li><a href="#"><i class="fa fa-envelope"></i>imsupexbd@gmail.com</a></li>
								    <li><span><i class="fa fa-phone"></i> Call Us: +88 01714 379 099</span></li>
							    </ul>
							</div>
						</div>
				    </div>
			    </div>
			    <!-- top bar end -->
			    
			    <!-- Logo, global navigation menu and search start -->
			    <header class="top-head" data-sticky="true">
				    <div class="container">
					    <div class="row">
					    	<div class="logo cell-3">
                                                    <a href=""><img src="assets/frontend/images/logo.png" style="width: 200px;"></a>
                                                </div>
                                                <div class="cell-9 top-menu">
                                                        <!-- top navigation menu start -->
                                                        <nav class="top-nav mega-menu">
                                                            <ul>
                                                              <li class="<?=($controller == 'home')?'selected':''?>"><a href="home"><i class="fa fa-home"></i><span>Home</span></a>
                                                              </li>
                                                              <li class="<?=($controller == 'about')?'selected':''?>"><a href="about"><i class="fa fa-info"></i><span>About Us</span></a>
                                                              </li>
                                                              <li class="<?php if($controller == 'products'){foreach($Imported_categories as $cat){if($cat->url == $parameter){echo 'selected';break;}}} ?>"><a><i class="fa fa-arrow-circle-o-down"></i><span>Import</span></a>
                                                                    <ul>
                                                                        <?php foreach($Imported_categories as $cat){ ?>
                                                                            <li class="<?=($cat->url == $parameter)?'selected':''?>"><a href="products/category/<?=$cat->url?>"><?=$cat->title?></a></li>
                                                                        <?php } ?>
                                                                    </ul>
                                                              </li>
                                                              <li class="<?php if($controller == 'products'){foreach($Export_categories as $cat){if($cat->url == $parameter){echo 'selected';break;}}} ?>"><a><i class="fa fa-arrow-circle-o-up"></i><span>Export</span></a>
                                                                    <ul>
                                                                        <?php foreach($Export_categories as $cat){ ?>
                                                                            <li class="<?=($cat->url == $parameter)?'selected':''?>"><a href="products/category/<?=$cat->url?>"><?=$cat->title?></a></li>
                                                                        <?php } ?>
                                                                    </ul>
                                                              </li>
                                                              <li class="<?php if($controller == 'products'){foreach($Interior_categories as $cat){if($cat->url == $parameter){echo 'selected';break;}}} ?>"><a><i class="fa fa-object-ungroup"></i><span>Interior</span></a>
                                                                    <ul>
                                                                        <?php foreach($Interior_categories as $cat){ ?>
                                                                            <li class="<?=($cat->url == $parameter)?'selected':''?>"><a href="products/category/<?=$cat->url?>"><?=$cat->title?></a></li>
                                                                        <?php } ?>
                                                                    </ul>
                                                              </li>
                                                              <li class="<?php if($controller == 'products'){foreach($Agro_categories as $cat){if($cat->url == $parameter){echo 'selected';break;}}} ?>"><a><i class="fa fa-delicious"></i><span>Agro</span></a>
                                                                    <ul>
                                                                        <?php foreach($Agro_categories as $cat){ ?>
                                                                            <li class="<?=($cat->url == $parameter)?'selected':''?>"><a href="products/category/<?=$cat->url?>"><?=$cat->title?></a></li>
                                                                        <?php } ?>
                                                                    </ul>
                                                              </li>
                                                              <li><a href="gallery"><i class="fa fa-photo"></i><span>Gallery</span></a>
                                                              </li>
                                                              <li class="<?=($controller == 'contact')?'selected':''?>"><a href="contact"><i class="fa fa-envelope-o"></i><span>Contact</span></a>
                                                              </li>
                                                            </ul>
                                                        </nav>
                                                        <!-- top navigation menu end -->
                                                    </div>
					    </div>
				    </div>
			    </header>
			    <!-- Logo, Global navigation menu and search end -->
			</div>
			<!-- Header End -->
			