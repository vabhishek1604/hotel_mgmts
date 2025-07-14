<?php

use app\models\Projectavailabilities;
use app\models\Projectimages;
use app\models\Slider;

 ?>
 <!-- Hero Banner -->
  <section class="hero-banner-wrapper background-image" data-src="<?php echo Yii::$app->request->baseUrl.Slider::get_random_image(); ?>">
    <div class="container">
      <!-- Banner Content -->
      <div class="banner-content text-center wow fadeInUp" data-wow-delay="0.3s">
          <h2><?php echo strtoupper(implode(' ', $type)); ?></h2>
        <!-- Breadcrumb -->
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="<?= Yii::$app->urlManager->createUrl(["web/index"]); ?>">Home</a></li>
          <li class="breadcrumb-item active"><a href="#">Projects</a></li>
        </ol>


      </div>
      <!-- Banner Content end -->
    </div>
  </section>
  <!-- Hero Banner end -->
  
  <!-- Our Properties -->
  <section class="our-properties-wrapper pb-100 pt-100 all-properry-wrapper">
    <div class="container">

      <!-- Property Filter From -->
      <!--<div class="row justify-content-center">
        <div class="col-xl-10  wow fadeInUp" data-wow-delay="0.3s">
          <form action="#" class="property-filter-form-wrap">
            <div class="row no-gutters">
              <div class="col-md-12 col-lg-3 single-property-input">
                <label class="sr-only">Flat/House</label>
                <input type="text" placeholder="Flat/House">
                <i class="fas fa-search"></i>
              </div>
              <div class="col-md-6 col-lg-2 single-property-input">
                <label class="sr-only">City</label>
                <select class="hero-select-box">
                  <option>City</option>
                  <option>City</option>
                  <option>City</option>
                  <option>City</option>
                  <option>City</option>
                </select>
              </div>
              <div class="col-md-6 col-lg-2 single-property-input">
                <label class="sr-only">State</label>
                <select class="hero-select-box">
                  <option>State</option>
                  <option>State</option>
                  <option>State</option>
                  <option>State</option>
                  <option>State</option>
                </select>
              </div>
              <div class="col-md-12 col-lg-3 single-property-input d-flex align-items-center price-select">
                <label>Price</label>
                <div class="range-slider-wrap">
                  <div id="slider-range"></div>
                  <div class="price-area">
                    <input type="text" id="amount">
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-2 single-property-input mb-0">
                <button type="submit">Search</button>
              </div>


            </div>

          </form>
        </div>
      </div>-->
      <!-- Property Filter From end -->
      
      <div class="row justify-content-center">
        <div class="col-xl-10">
          <div class="row">
            <?php 
            if (!empty($project)) {
            foreach ($project as $pro) {
            foreach (Projectavailabilities::findAll(['avail_isactive'=>1,'avail_projid'=>$pro->proj_id]) as $value) {
                ?>
            <!-- single Properties -->
            <div class="col-lg-6  wow fadeInLeft" data-wow-delay="0.3s">
              <div class="single-our-properties d-md-flex">
                <div class="our-properties-img">
                  <img src="<?php echo Yii::$app->request->baseUrl.Projectimages::get_random_image('',$value->avail_id,'Main'); ?>" alt="Properties Image" class="img-fluid">
                  <span>View</span>
                </div>
                <div class="our-properties-content">
                  <h5><?= $value->avail_title; ?></h5>
                  <p><i class="fas fa-map-marked-alt"></i><?= $value->availProj->proj_address; ?>, <?= $value->availProj->proj_city; ?>, <?= $value->availProj->proj_state; ?>
                    </p>
                  <a href="<?= Yii::$app->urlManager->createUrl(["projectdetail/" . $value->avail_slug]); ?>" class="def-btn">More Details</a>
                </div>
              </div>
            </div>
            <!-- single Properties end -->          
            <?php  } } }else{ ?>
            <div class="col-lg-6  wow fadeInLeft" data-wow-delay="0.3s">No Projects Are There</div>
            <?php  } ?>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- Our Properties end -->