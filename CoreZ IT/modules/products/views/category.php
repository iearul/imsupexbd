    <!-- Content Start -->
    <div id="contentWrapper">
        <div class="page-title title-1">
                <div class="container">
                        <div class="row">
                                <div class="cell-12">
                                        <h1 class="fx" data-animate="fadeInLeft"> <?=$category->title?></h1>
                                        <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                                                <span class="bold">You Are In:</span><a href="">Home </a><span class="line-separate">/</span><a>Products </a><span class="line-separate">/</span><a href="#">Category </a><span class="line-separate">/</span><span><?=$category->title?></span>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>

        <div class="sectionWrapper">
            <div class="container">
                <div class="row">
                    <div class="cell-9">
                            <div class="grid-list">
                                <div class="row">
                                    <?php foreach($products as $product){ ?> 
                                        <div class="cell-4 fx shop-item" data-animate="fadeInUp">
                                            <div class="item-box">
                                                <h3 class="item-title"><a><?=$product->name?> | <?=$product->code?></a></h3>
                                                <div class="item-img">
                                                        <a href="uploads/products/<?=$product->image?>" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Product Code: <?=$product->code?>"><img  style="height: 250px; width: 400px;" alt="<?=$product->code?>" src="uploads/products/<?=$product->image?>"></a>
                                                </div>
                                                <div class="item-details">
                                                    <p><?=$product->description?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                    </div>
                    <aside class="cell-3 left-shop">
                        <div class="widget r-posts-w sale-widget fx" data-animate="fadeInRight">
                            <h3 class="widget-head">Product Catalogs</h3>
                            <div class="widget-content">
                                <ul>
                                        <?php if(!empty($attached)){ ?>
                                        <?php foreach($attached as $file){ ?>
                                        <li>
                                            <div class="post-img">
                                                    <a href="<?=site_url()?>fileupdown/download_attached/<?=$file->url?>" title="Download"><i class="fa fa-download"></i></a>
                                            </div>
                                            <div class="widget-post-info">
                                                    <h4>
                                                            <a href="<?=site_url()?>fileupdown/download_attached/<?=$file->url?>" title="Download"><?=$file->title?></a>
                                                    </h4>
                                            </div>
                                        </li>
                                        <?php } ?>    
                                        <?php }else{ ?>
                                        <li>
                                            N/A
                                        </li>
                                        <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- Content End -->
