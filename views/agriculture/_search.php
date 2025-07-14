<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Advisor;

/* @var $this yii\web\View */
/* @var $model app\models\AgricultureSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="agriculture-search">
    <div class="row">
        <div class="col-lg-4">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>

            <div class="row">
                <div class="col-lg-6">
                    <?= $form->field($model, 'prop_code') ?>
                </div>
                <div class="col-lg-6">
                    <?php echo $form->field($model, 'advisor_id')->dropDownList(ArrayHelper::map(Advisor::find()->asArray()->all(), 'id', 'name'), ['prompt' => '--Select--', 'class' => 'form-control'])->label('Advisor Name'); ?>
                </div>
            </div>

            <!-- <?= $form->field($model, 'id') ?> -->

            <!-- <?= $form->field($model, 'prop_secret_code') ?> -->

            <!-- <?= $form->field($model, 'pro_type') ?> -->

            <!-- <?= $form->field($model, 'land_type1') ?> -->

            <!-- <?= $form->field($model, 'soil_type') ?> -->

            <?php // echo $form->field($model, 'owner_type') 
            ?>

            <?php // echo $form->field($model, 'pro_seller') 
            ?>
            <?php // echo $form->field($model, 'area') 
            ?>
            <?php // echo $form->field($model, 'area_unit') 
            ?>

            <?php // echo $form->field($model, 'pro_landmark') 
            ?>

            <?php // echo $form->field($model, 'pro_village') 
            ?>

            <?php // echo $form->field($model, 'pro_tehsil') 
            ?>

            <?php // echo $form->field($model, 'pro_district') 
            ?>

            <?php // echo $form->field($model, 'ph_no') 
            ?>

            <?php // echo $form->field($model, 'khasra_no') 
            ?>

            <?php // echo $form->field($model, 'diversion_type') 
            ?>

            <?php // echo $form->field($model, 'diversion_no') 
            ?>

            <?php // echo $form->field($model, 'water_level') 
            ?>

            <?php // echo $form->field($model, 'water_source') 
            ?>

            <?php // echo $form->field($model, 'land_type') 
            ?>

            <?php // echo $form->field($model, 'road_connectivity') 
            ?>

            <?php // echo $form->field($model, 'dist_from_front') 
            ?>

            <?php // echo $form->field($model, 'dist_from_road') 
            ?>

            <?php // echo $form->field($model, 'electricity_avail') 
            ?>

            <?php // echo $form->field($model, 'dist_from_high_tension_line') 
            ?>

            <?php // echo $form->field($model, 'district_centre') 
            ?>

            <?php // echo $form->field($model, 'tehsil') 
            ?>

            <?php // echo $form->field($model, 'village') 
            ?>

            <?php // echo $form->field($model, 'ownership_type') 
            ?>

            <?php // echo $form->field($model, 'govt_guideline') 
            ?>

            <?php // echo $form->field($model, 'market_value') 
            ?>

            <?php // echo $form->field($model, 'selling_price') 
            ?>

            <?php // echo $form->field($model, 'expected_property_valuation') 
            ?>

            <?php // echo $form->field($model, 'new_project_coming') 
            ?>

            <?php // echo $form->field($model, 'special_points') 
            ?>

            <?php // echo $form->field($model, 'selling_time_req') 
            ?>

            <?php // echo $form->field($model, 'if_dispute') 
            ?>

            <?php // echo $form->field($model, 'claims_from_co_owners') 
            ?>

            <?php // echo $form->field($model, 'family') 
            ?>

            <?php // echo $form->field($model, 'legal_heirs') 
            ?>

            <?php // echo $form->field($model, 'misrepresentation_by_seller') 
            ?>

            <?php // echo $form->field($model, 'bad_title_of_property') 
            ?>

            <?php // echo $form->field($model, 'disputes_related_to_property_acquired_as_a_gift_or_through_will') 
            ?>

            <?php // echo $form->field($model, 'disputes_related_to_easements_rights') 
            ?>

            <?php // echo $form->field($model, 'Others') 
            ?>

            <?php // echo $form->field($model, 'is_verified') 
            ?>

            <?php // echo $form->field($model, 'is_active') 
            ?>

            <?php // echo $form->field($model, 'created_by') 
            ?>

            <?php // echo $form->field($model, 'created_at') 
            ?>

            <?php // echo $form->field($model, 'updated_by') 
            ?>

            <?php // echo $form->field($model, 'updated_at') 
            ?>
        </div>
        <div class="form-group" style="margin-top: 22px;">
            <?= Html::submitButton('', ['class' => 'btn btn-primary fa fa-search']) ?>
            <?= Html::resetButton('', ['class' => 'btn btn-secondary fa fa-refresh', 'style' => 'margin-left:10px;']) ?>
            <?= Html::a(Yii::t('app', 'Create Property'), ['create'], ['class' => 'btn btn-success', 'style' => 'margin-left:10px;']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>