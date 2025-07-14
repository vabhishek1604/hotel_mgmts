<?php

use app\models\Company;
use app\models\Projectimages;
use app\models\Slider;
use app\models\Pagecontent;

?>
<!-- Hero Banner -->
<section class="hero-banner-wrapper background-image"
  data-src="<?php echo Yii::$app->request->baseUrl . Slider::get_random_image(); ?>">
  <div class="container">
    <!-- Banner Content -->
    <div class="banner-content text-center wow fadeInUp" data-wow-delay="0.3s">
      <h2>About Us</h2>
      <!-- Breadcrumb -->
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a href="<?= Yii::$app->urlManager->createUrl(["web/index"]); ?>">Home</a>
        </li>
        <li class="breadcrumb-item active"><a href="<?= Yii::$app->urlManager->createUrl(["web/aboutus"]); ?>">About</a>
        </li>
      </ol>


    </div>
    <!-- Banner Content end -->
  </div>
</section>
<!-- Hero Banner end -->

<!-- About us section -->
<section class="about-us-wrapper">
  <div class="container">
    <div class="row">
      <!-- about us img -->
      <div class="col-lg-6 col-xl-7 wow fadeInLeft mb-10" data-wow-delay="0.3s" style="margin-bottom: 10px !important;">
        <div class="about-us-img">
          <?php
          $images = Projectimages::get_random_image(2);
          foreach ($images as $image) {
            if (!empty($image->pimg_url)) {
              ?>
              <img src="<?= Yii::$app->request->baseUrl; ?><?= $image->pimg_url; ?>" class="sm-img" alt="About us image">
            <?php }
          } ?>
        </div>
      </div>
      <!-- about us img end -->
      <!-- about us content area -->
      <div class="col-lg-6 col-xl-5 wow fadeInRight" data-wow-delay="0.3s">
        <div class="about-us-content">
          <h3><span>
              <?php echo Company::getCompanyData('company_title'); ?>
            </span></h3>
          <p>
            <?php echo Company::getCompanyData('company_desc'); ?>
          </p>
        </div>
      </div>
      <!-- about us content area end -->

    </div>
  </div>

  <!-- About us section end -->
  <?php foreach (Pagecontent::find()->where(['cont_menuid' => 2, 'cont_status' => 1])->orderBy(['cont_order' => SORT_ASC])->all() as $value) { ?>

    <div class="container">
      <div class="row">
        <?php if (!empty($value->cont_image) && !empty($value->cont_desc)) { ?>
          <div class="col-lg-6 col-xl-7 wow fadeInLeft" data-wow-delay="0.3s">
            <div class="about-us-img">
              <?= $value->cont_image ?>
            </div>
          </div>
          <!-- about us img -->
          <div class="col-lg-6 col-xl-5 wow fadeInRight" data-wow-delay="0.3s">
            <div class="about-us-content">
              <h3><span>
                  <?= $value->cont_title; ?>
                </span></h3>
              <p>
                <?= $value->cont_desc ?>
              </p>
            </div>
          </div>
        <?php } else if (!empty($value->cont_image) && empty($value->cont_desc)) { ?>
            <div class="col-lg-12 col-xl-12 wow fadeInLeft" data-wow-delay="0.3s">
              <div class="about-us-img">
              <?= $value->cont_image ?>
              </div>
            </div>
        <?php } else if (empty($value->cont_image) && !empty($value->cont_desc)) { ?>
              <div class="col-lg-12 col-xl-12 wow fadeInRight" data-wow-delay="0.3s">
                <div class="about-us-content">
                  <h3><span>
                  <?= $value->cont_title; ?>
                    </span></h3>
                  <p>
                <?= $value->cont_desc ?>
                  </p>
                </div>
              </div>
        <?php } ?>
      </div>
    </div>
  </section>
<?php } ?>
<!-- About us section end -->