
<!-- Content Start -->
<div id="contentWrapper">

        <!-- Revolution slider start -->
				<div class="tp-banner-container">
					<div class="tp-banner" >
						<ul>
                                                    <?php foreach ($sliders as $slider):?>
							<li data-slotamount="7" data-transition="incube" data-masterspeed="1000" data-saveperformance="on">
                                                            <img alt="" src="assets/frontend/images/slider/dummy.png" data-lazyload="uploads/sliders/<?=$slider->name?>">
							</li>
                                                    <?php endforeach;?>
						</ul>
					</div>
				</div>
				<!-- Revolution slider end -->
				

        <!-- Welcome Box start -->
        <div class="welcome">
                <div class="container">
                        <h3 class="center block-head"><span class="main-color">Welcome To IMSUPEX Bangladesh</h3>
                        <p class="margin-bottom-0"><?=$site->greeting?></p>
                </div>
        </div>
        <!-- Welcome Box end -->

        <!-- Services boxes style 1 start -->
        <div class="gry-bg">
                <div class="container">
                    <h3 class="block-head">Featured Product</h3>
                        <div class="row">
                            <?php foreach ($products as $product):?>
                                <div class="cell-3 service-box-1 fx" data-animate="fadeInUp" data-animation-delay="200">
                                        <div class="box-top">
                                            <img style="height: 300px; width: 400px;" src="uploads/products/<?=$product->image?>" alt="<?=$product->name?>">
                                                <h4><?=$product->code?> | <?=$product->name?></h4>
                                                <p><?=$product->description?></p>
                                        </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                </div>
        </div>
        <!-- Services boxes style 1 start -->
        
        <div class="padd-top-30">
                <hr class="hr-style3">
        </div>

        <!-- our clients block start -->
        <div class="sectionWrapper gry-bg">
                <div class="container">
                    <h3 class="block-head">Our Clients</h3>
                    <div class="clients">
                        <?php foreach ($clients as $client):?>
                            <div>
                                    <a class="white-bg" href="http://<?=$client->link?>"><img alt="" src="uploads/client/<?=$client->logo?>"></a>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
        </div>
        <!-- our clients block end -->
        
        <!-- our Recent Product block start -->
        <div class="sectionWrapper">
                <div class="container">
                        <h3 class="block-head">Recent Product</h3>
                        <div class="portfolioGallery portfolio">
                            <?php foreach ($recents as $recent):?>
                                <div>
                                        <div class="portfolio-item">
                                                <div class="img-holder">
                                                        <div class="img-over">
                                                                <a href="uploads/products/<?=$recent->image?>" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Product Code: <?=$recent->code?>"><b class="fa fa-search-plus"></b></a>
                                                        </div>
                                                        <img style="height: 250px; width: 400px;" alt="" src="uploads/products/<?=$recent->image?>">
                                                </div>
                                                <div class="name-holder">
                                                        <a class="project-name"><?=$recent->code?> | <?=$recent->name?></a>
                                                        <span class="project-options"><?=$categories[$recent->category_url]->title?></span>
                                                </div>
                                        </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                        <div class="clearfix"></div>
                </div>
        </div>
	<!-- our Recent Product block start -->			

        <!-- FUN Staff start -->
        <div class="fun-staff staff-1 block-bg-2 sectionWrapper">
                <div class="container">
                        <!-- staff item start -->
                        <div class="cell-2 fx" data-animate="fadeInDown" data-animation-delay="200">
                                <div class="fun-number"><?=$counters->c1number?></div>
                                <div class="fun-text main-bg"><?=$counters->c1name?></div>
                                <div class="fun-icon"><i class="fa fa-leaf"></i></div>
                        </div>
                        <!-- staff item end -->

                        <!-- staff item start -->
                        <div class="cell-2 fx" data-animate="fadeInDown" data-animation-delay="400">
                                <div class="fun-number"><?=$counters->c2number?></div>
                                <div class="fun-text main-bg"><?=$counters->c2name?></div>
                                <div class="fun-icon"><i class="fa fa-clock-o"></i></div>
                        </div>
                        <!-- staff item end -->

                        <!-- staff item start -->
                        <div class="cell-4 fx" data-animate="fadeInDown">
                                <div class="fun-title extraBold"><?=$counters->title?></div>
                        </div>
                        <div class="cell-2 fx" data-animate="fadeInDown" data-animation-delay="600">
                                <div class="fun-number"><?=$counters->c3number?></div>
                                <div class="fun-text main-bg"><?=$counters->c3name?></div>
                                <div class="fun-icon"><i class="fa fa-group"></i></div>
                        </div>
                        <!-- staff item end -->

                        <!-- staff item start -->
                        <div class="cell-2 fx" data-animate="fadeInDown" data-animation-delay="800">
                                <div class="fun-number"><?=$counters->c4number?></div>
                                <div class="fun-text main-bg"><?=$counters->c4name?></div>
                                <div class="fun-icon"><i class="fa fa-bell"></i></div>
                        </div>
                        <!-- staff item end -->

                </div><!-- .container end -->
        </div>
        <!-- FUN Staff end -->

</div>
<!-- Content End -->