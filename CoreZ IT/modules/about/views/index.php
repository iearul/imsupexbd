<!-- Content Start -->
<div id="contentWrapper">
    <div class="page-title title-1">
            <div class="container">
                    <div class="row">
                            <div class="cell-12">
                                    <h1 class="fx" data-animate="fadeInLeft">About <span>Us</span></h1>
                                    <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                                            <span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><a href="#">Pages </a><span class="line-separate">/</span><span>About us</span>
                                    </div>
                            </div>
                    </div>
            </div>
    </div>
    <div class="sectionWrapper">
            <div class="container">
                    <div class="fx" data-animate="fadeInUp">
                            <h3 class="block-head">Introduction</h3>
                            <p><?=$site->introduction?>
                            </p>
                    </div>

                    <div class="clearfix"></div>

                    <div class="padd-top-50">
                            <div class="cell-12 fx" data-animate="fadeInLeft">
                                    <div class="row">
                                            <div id="tabs" class="tabs">
                                                    <h3 class="block-head">What we offer?</h3>
                                                    <ul>
                                                            <li class="skew-25 active"><a href="#" class="skew25"><i class="fa fa-android"></i>Mission</a></li>
                                                            <li class="skew-25"><a href="#" class="skew25"><i class="fa fa-download"></i> Vision</a></li>
                                                            <li class="skew-25"><a href="#" class="skew25"><i class="fa fa-envelope"></i> Objective</a></li>
                                                    </ul>
                                                    <div class="tabs-pane">
                                                            <div class="tab-panel active">
                                                                    <?=$site->mission?>
                                                            </div>
                                                            <div class="tab-panel">
                                                                    <?=$site->vision?>
                                                            </div>
                                                            <div class="tab-panel">
                                                                     <?=$site->objective?>
                                                            </div>
                                                    </div>
                                            </div>
                                    </div>
                            </div>
                    </div>
            </div>
    </div>


    <div class="sectionWrapper gry-pattern">
            <div class="container team-boxes">
                <h3 class="block-head">Meet Our Team</h3>
                <?php foreach ($teams as $team):?>
                <div class="cell-3 fx" data-animate="bounceIn">
                    <div class="team-box">
                        <div class="team-img">
                                <img alt="<?=$team->name?>" src="uploads/gallery/<?=$team->photo?>">
                                <h3><?=$team->name?></h3>
                        </div>
                        <div class="team-details">
                            <h3 class="gry-bg"><?=$team->name?></h3>
                            <div class="t-position"><?=$team->designation?></div>
                            <h5><?=$team->detail?></h5>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
    </div>

</div>
<!-- Content End -->