<!-- Content Start -->
<div id="contentWrapper">

        <div class="sectionWrapper">
                <div class="container">
                        <h3 class="block-head">Our Gallery</h3>
                        <!-- This is the gallery container -->
                        <div class="our_gallery">
                                <div id="gallery" class="content cell-9">
                                        <div id="controls" class="controls"></div>
                                        <div class="slideshow-container">
                                                <div id="loading" class="loader"></div>
                                                <div id="slideshow" class="slideshow"></div>
                                        </div>
                                        <div id="caption" class="caption-container"></div>
                                </div>
                                <div id="thumbs" class="navigation cell-3">
                                        <ul class="thumbs noscript">
                                            <?php foreach ($galleries as $gallery){ ?>
                                                <li>
                                                        <a class="thumb" name="leaf" href="uploads/gallery/<?=$gallery->name?>" title="<?=$gallery->title?>">
                                                                <img style="height:50px; width:50px;" src="uploads/gallery/<?=$gallery->name?>" alt="<?=$gallery->title?>" />
                                                        </a>
                                                        <div class="caption">
                                                                <div class="download">
                                                                        <a class="zoom" href="uploads/gallery/<?=$gallery->name?>">Download Original</a>
                                                                </div>
                                                                <div class="image-title"><?=$gallery->title?></div>
                                                                <div class="image-desc"><?=$gallery->description?><br></div>
                                                        </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                </div>
                                <div style="clear: both;"></div>
                        </div>


                        <!-- End of gallery container -->


                </div>
        </div>				
</div>
<!-- Content End -->