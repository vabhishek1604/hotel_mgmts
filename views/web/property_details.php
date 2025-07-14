<?php

use app\models\Amenities;
use app\models\Project;
use app\models\Projectimages;
use app\models\Slider;

$project = Project::findOne(['proj_id'=>$property->avail_projid]);
//$property_mages = Projectimages::find()->where(['pimg_propid'=>$property->avail_id])->andWhere(['!=', 'pimg_type', 'Floor Plan'])->all();
$property_images = Projectimages::find()->where(['pimg_propid'=>$property->avail_id])->all();
$property_images_thumbnail = Projectimages::find()->where(['pimg_propid'=>$property->avail_id,'pimg_type'=>'Thumbnail'])->all();

 ?>
 <!-- Hero Banner -->
  <section class="hero-banner-wrapper background-image" data-src="<?php echo Yii::$app->request->baseUrl.Slider::get_random_image(); ?>">
    <div class="container">
      <!-- Banner Content -->
      <div class="banner-content text-center wow fadeInUp" data-wow-delay="0.3s">
        <h2>Property Details</h2>
        <!-- Breadcrumb -->
        <ol class="breadcrumb justify-content-center">
          <li class="breadcrumb-item"><a href="<?= Yii::$app->urlManager->createUrl(["web/index"]); ?>">Home</a></li>
          <li class="breadcrumb-item active"><a href="#">Property Details</a></li>
        </ol>


      </div>
      <!-- Banner Content end -->
    </div>
  </section>
  <!-- Hero Banner end -->
  

  <!-- Properties Details -->
  <div class="property-details-slider-wrapper pt-100 bg-gray">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.3s">
          <!-- Properties Details slider -->
          <div class="property-details-slider">
              <?php if(!empty($property_images)){
                    foreach ($property_images as $img) { ?>
                    <!-- single slider -->
                    <div class="single-property-slide">
                      <!--<span class="meta">DNG</span>-->
                      <img src="<?php echo Yii::$app->request->baseUrl.$img->pimg_url; ?>" class="w-100" alt="Property Details">
                    </div>
              <?php } } ?>


          </div>
          <!-- Properties Details slider end -->

        </div>

      </div>
      <!-- Property details thumb slider -->
      <div class="property-details-slider-nav row wow fadeInUp" data-wow-delay="0.3s">
        <?php if(!empty($property_images_thumbnil)){
            foreach ($property_images_thumbnil as $img_thumb) { ?>
              <!-- single thumb -->
              <div class="col-xl-2 ">
                <img src="<?php echo Yii::$app->request->baseUrl.$img_thumb->pimg_url; ?>" alt="Property thumb" class="w-100">
              </div>
        <?php } } ?>
      </div>
      <!-- Property details thumb slider end -->
    </div>
  </div>
  <!-- Properties Details end -->



  <!-- Property Details -->
  <section class="property-details-wrapper pb-100 bg-gray">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10 ">
          <!-- Property Details content -->
          <?php if(!empty($property)){ ?>
          <div class="property-details-content wow fadeInUp" data-wow-delay="0.3s">
            <div class="property-details-top d-lg-flex justify-content-between ">
            <?php if($project->proj_type==''){ ?>
              <div class="property-details-title">
                <h4>Modern <?= $property->avail_type; ?> In <?= $property->availProj->proj_city; ?> </h4>
                <h5><i class="fas fa-map-marker-alt"></i><?= $property->availProj->proj_address; ?>, <?= $property->availProj->proj_city; ?>, <?= $property->availProj->proj_state; ?>. Bed : <?= $property->avail_bedroom; ?>, Bath : <?= $property->avail_bathroom; ?>
                  Sqr : <?= $property->avail_area_in_sqft; ?></h5>
              </div>
              <div class="property-details-btn">
                <a href="#" class="def-btn"> &#8377; <?= $property->avail_price; ?></a>
              </div>
            <?php }else{ ?>
                <div class="property-details-title">
                <h4> <?= $property->avail_title; ?> In <?= $property->availProj->proj_city; ?> </h4>
                <h5><i class="fas fa-map-marker-alt"></i><?= $property->availProj->proj_address; ?>, <?= $property->availProj->proj_city; ?>, <?= $property->availProj->proj_state; ?>.
                  </h5>
              </div>
            <?php } ?>
            </div>
            <?= $property->availProj->proj_remark; ?>
           <?= $property->avail_prop_dec; ?>
            <?php if($project->proj_type=='residential'){ ?>
            <div class="floor-plan-content-wrap d-md-flex align-items-center">
              <div class="floor-plan-img wow fadeInLeft" data-wow-delay="0.3s">
                  <?php if(!empty(Projectimages::get_random_image('',$project->proj_id,'Floor Plan'))){ ?>
                  <img src="<?php echo Yii::$app->request->baseUrl.Projectimages::get_random_image('',$project->proj_id,'Floor Plan'); ?>" alt="Floor Plan">
                  <?php } ?>
              </div>
              <div class="floor-plan-content wow fadeInRight" data-wow-delay="0.3s">
                  <?php if(!empty($property->avail_other_features)){ ?>
                <h4>Features of <?= $property->avail_title; ?></h4>
                <ul class="floor-features-list">
                    <?php $features = explode(',', $property->avail_other_features); ?>
                  <!--<li>
                    <p><i class="fas fa-check"></i><?= $property->avail_bedroom; ?> Bedroom.</p>
                  </li>
                  <li>
                    <p><i class="fas fa-check"></i><?= $property->avail_bathroom; ?> Bathroom.</p>
                  </li>
                  <li>
                    <p><i class="fas fa-check"></i><?= $property->avail_area_in_sqft; ?> Sq. ft</p>
                  </li>-->
                  <?php foreach ($features as $feature) { ?>
                  <li>
                      <p><i class="fas fa-check"></i><?= Amenities::findOne($feature)->am_name; ?></p>
                  </li>                       
                    <?php } } ?>
                  <li>
                </ul>
              </div>
            </div>
            <?php }?><br>
              <div class="addthis_inline_share_toolbox"></div>
                <a addthis:url="<?= Yii::$app->urlManager->createUrl(["web/property_detail/$property->avail_slug"]); ?>" addthis:title="Project Title: <?php echo $property->avail_title .' '. $property->availProj->proj_title; ?>" class="addthis_button_compact"></a>
            </div>
          <!-- Property Details content end -->
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  <!-- Property Details end -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5ed9e919ba0e0327"></script>
