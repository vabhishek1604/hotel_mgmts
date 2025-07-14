<!-- Hero Slider Area -->
<?php

use app\models\Company;
use app\models\Projectavailabilities;
use app\models\Projectimages;
use app\models\Slider;
?>
<section class="hero-slider-wrapper ">
    <!-- Hero Slider Images -->
    <div class="hero-slider-images v1 wow fadeIn" data-wow-delay="0.3s">
        <!-- single Image -->
        <?php
        $slider = Slider::find(['slid_isactive' => 1])->all();
        foreach ($slider as $sl) {
            ?>

            <div class="single-hero-img background-image" data-src="<?php echo Yii::$app->request->baseUrl . $sl->slid_url; ?>"></div>
            <!-- single Image -->
        <?php } ?>
    </div>
    <!-- Hero Slider Images end -->
    <!-- single hero slide -->
    <div class="single-hero-slide-wrap ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 wow fadeInUp" data-wow-delay="0.3s">
                    <!-- Hero slide content -->
                    <div class="hero-slide-content text-center">
                      <!--<h2><span>Find Your Dream</span> Home for Living</h2>
                      <p>It is a long established fact that a reader will be distracted by the readable content of a
                        page when
                        looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                        distribution of
                        letters, as opposed</p>-->
                        <!-- hero search form -->
                        <form action="#" class="hero-search-form d-md-flex justify-content-center">
                            <!-- single input -->
                            <div class="hero-search-input">
                                <label class="sr-only">Keyword</label>
                                <input type="text" placeholder="Search Keyword">
                                <i class="fas fa-search"></i>
                            </div>
                            <!-- single input -->
                            <div class="hero-search-input">
                                <label class="sr-only">City</label>
                                <!-- Select box -->
                                <select class="hero-select-box">
                                    <option>City</option>
                                    <option>Room</option>
                                    <option>New York</option>
                                    <option>Barsolona</option>
                                    <option>Paris</option>
                                    <option>Dhaka</option>
                                </select>
                            </div>
                            <!-- single input -->
                            <div class="hero-search-input">
                                <label class="sr-only">State</label>
                                <!-- Select box -->
                                <select class="hero-select-box">
                                    <option>State</option>
                                    <option>Room</option>
                                    <option>New York</option>
                                    <option>Barsolona</option>
                                    <option>Paris</option>
                                    <option>Dhaka</option>
                                </select>
                            </div>
                            <!-- single input -->
                            <div class="hero-search-input">
                                <button type="submit">Search</button>
                            </div>

                        </form>
                    </div>
                    <!-- Hero slide content end -->
                </div>
            </div>
        </div>
    </div>
    <!-- single hero slide end -->


</section>
<!-- Hero Slider Area end -->



<!-- About us section -->
<section class="about-us-wrapper">
    <div class="container">
        <div class="row">
            <!-- about us img -->
            <div class="col-lg-6 col-xl-7 wow fadeInLeft" data-wow-delay="0.3s">
                <div class="about-us-img">
                    <?php
                    $images = Projectimages::get_random_image(2);
                    foreach ($images as $image) {
                        if (!empty($image->pimg_url)) {
                            ?>              
                            <img src="<?= Yii::$app->request->baseUrl; ?><?= $image->pimg_url; ?>" class="sm-img" alt="About us image">
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- about us img end -->
            <!-- about us content area -->
            <div class="col-lg-6 col-xl-5 wow fadeInRight" data-wow-delay="0.3s">
                <div class="about-us-content">
                    <h3><span><?php echo Company::getCompanyData('company_title'); ?></span></h3>
                    <p><?php echo Company::getCompanyData('company_desc'); ?></p>
                    <a href="<?= Yii::$app->urlManager->createUrl(["web/aboutus"]); ?>" class="def-btn">Read More</a>
                </div>
            </div>
            <!-- about us content area end -->

        </div>
    </div>
</section>
<!-- About us section end -->


<!-- Top Properties Area -->
<section class="top-properties-area pt-100 pb-100">
    <div class="container">
        <div class="row justify-content-center text-center">
            <!-- Section Title -->
            <div class="col-md-10 col-lg-8 col-xl-6  wow fadeInUp" data-wow-delay="0.3s">
                <div class="section-title">
                    <h2>OUR Projects</h2>
                    <p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                      dummy text</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row top-properties-slider slick-initialized slick-slider">
<!--            <button type="button" class="slick-prev slick-arrow" style="display: block;"><i class="fas fa-arrow-left"></i></button>
            <button type="button" class="slick-next slick-arrow" style="display: block;"><i class="fas fa-arrow-right"></i></button>-->
            <div class="slick-list draggable">
                <div class="slick-track" style="opacity: 1; width: 5850px; transform: translate3d(-3150px, 0px, 0px);">
                    <?php
                    $c = 0;
                    foreach (Projectavailabilities::findAll(['avail_isactive' => 1]) as $value) {
                        $c++;
                        ?>


                        <div class="col-xl-4  wow fadeIn slick-slide slick-cloned" data-wow-delay="0.3s" style="width: 450px; visibility: visible; animation-delay: 0.3s; animation-name: fadeIn;" data-slick-index="-3" aria-hidden="true" tabindex="-1">
                            <div class="single-top-properties">
                                <div class="top-properties-img">
                                    <?php
                                    $img_url = Projectimages::get_random_image('', $value->avail_id, 'Main');
                                    if (!empty($img_url)) {
                                        ?>
                                        <img src="<?php echo Yii::$app->request->baseUrl . $img_url; ?>" alt="Property Images" class="img-fluid">
                                    <?php } else { ?>
                                        <img src="<?php echo Yii::$app->request->baseUrl . '/web/images/prop_default.jpg'; ?>" alt="Property Images" class="img-fluid">
                                    <?php } ?>
                                    <a href="<?= Yii::$app->urlManager->createUrl(["projectdetail/" . $value->avail_slug]); ?>">For Sale</a>
                                </div>
                                <div class="top-properties-contents">
                                    <div class="top-properties-meta">
                                        <span><i class="fas fa-bed"></i><?= $value->avail_bedroom; ?> Badroom</span>
                                        <span><i class="fas fa-bath"></i><?= $value->avail_bathroom; ?> Bathroom</span>
                                        <span><i class="fas fa-expand-arrows-alt"></i><?= $value->avail_area_in_sqft; ?> Sqft.</span>
                                    </div>
                                    <a href="<?= $value->avail_slug; ?>">
                                        <h4><?= $value->avail_title; ?></h4>
                                        <!--<h4>Modern <?= $value->avail_type; ?> <?= ($value->avail_type != 'Apartment') ? 'House' : ''; ?></h4>-->
                                    </a>
                                    <?= substr($value->availProj->proj_remark, 0, 110) . '...'; ?>
                                    <div class="price-box">
                                        <!--<span class="price">&#8377; <?= $value->avail_price; ?></span>-->
                                        <span class="location"><?= $value->availProj->proj_city; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?> 

                </div>
            </div>
        </div>

    </div>
</section>
<!-- Top Properties Area end -->  
