<!-- Slider -->
<?php
    $category_parents = Category::getListParent();
?>
<div class="container">
    <div class="row home_Slider">
        <div class="row">

            <div class="col-sm-3 col-md-3 col-lg-3 top_category">
                <div class="block block-category">
                    <div class="block-head">
                        <ul class="nav-tab">
                            <li><a> <span class="fa fa-bars"></span> MARKETS</a></li>
                        </ul>
                    </div>
                    <div class="block-inner">
                        <div class="tab-container">
                            <div id="tab-categories" class="tab-panel active">
                                <ul class="home_categories">
                                    <!-- @foreach( array_slice($category_field,0,7) as $category ) -->
                                    <?php foreach($category_parents as $parent){ ?>
                                    <li style="position: relative;">
                                        <a class="dropdown-toggle" href="<?=Config::$urlbase.'views/pages/product_of_category.php?category='.$parent->id?>" title="">
                                            <img src="<?=$parent->icon?>" alt="<?=$parent->name ?>">
                                            <span><?=$parent->name ?></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <?php 
                                                $category_childs = Category::getListChild($parent->id);
                                                foreach($category_childs as $child){
                                            ?>
                                            <li>
                                                <a href="<?=Config::$urlbase.'views/pages/product_of_category.php?category='.$child->id?>" style="vertical-align: middle; font-weight: bold;" title="">
                                                    <img src="<?=$child->icon?>" alt="">
                                                    <span class="text"><?=$child->name?></span>
                                                </a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9 col-md-9 col-lg-9">
                <!-- Home slide -->
                <div class="block block-slider ">
                    <ul class="home-slider kt-bxslider">
                        <li>
                            <a href="">
                                <img src="https://images.unsplash.com/photo-1499084732479-de2c02d45fcc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="https://p.bigstockphoto.com/GeFvQkBbSLaMdpKXF1Zv_bigstock-Aerial-View-Of-Blue-Lakes-And--227291596.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="https://helpx.adobe.com/content/dam/help/en/stock/how-to/visual-reverse-image-search/jcr_content/main-pars/image/visual-reverse-image-search-v2_intro.jpg" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- ./Home slide -->
            </div>
        </div>
    </div>
</div>

<!-- ./Slider -->