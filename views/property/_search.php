<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Advisor;

/* @var $this yii\web\View */
/* @var $model app\models\PropertySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="property-search">
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
                    <?php echo $form->field($model, 'advisor_id')->dropDownList(ArrayHelper::map(Advisor::find()->asArray()->all(), 'id', 'name'), ['prompt' => '--select--', 'class' => 'form-control'])->label('Advisor Name'); ?>
                </div>
            </div>
            <!-- <?= $form->field($model, 'id') ?> -->

            <!-- <?= $form->field($model, 'property_type') ?> -->

            <!-- <?= $form->field($model, 'types') ?> -->

            <!-- <?= $form->field($model, 'property_name') ?> -->

            <!-- <?= $form->field($model, 'project_name') ?> -->

            <?php // echo $form->field($model, 'land_mark') 
            ?>

            <?php // echo $form->field($model, 'locality') 
            ?>

            <?php // echo $form->field($model, 'city') 
            ?>

            <?php // echo $form->field($model, 'state') 
            ?>

            <?php // echo $form->field($model, 'industrial_area_name') 
            ?>

            <?php // echo $form->field($model, 'ward_number') 
            ?>

            <?php // echo $form->field($model, 'ward_name') 
            ?>

            <?php // echo $form->field($model, 'special_economic_zone') 
            ?>

            <?php // echo $form->field($model, 'ph_no') 
            ?>

            <?php // echo $form->field($model, 'diversion_no') 
            ?>

            <?php // echo $form->field($model, 'carpet_area') 
            ?>

            <?php // echo $form->field($model, 'super_built') 
            ?>

            <?php // echo $form->field($model, 'hall') 
            ?>

            <?php // echo $form->field($model, 'washrooms') 
            ?>

            <?php // echo $form->field($model, 'pantry') 
            ?>

            <?php // echo $form->field($model, 'promoter_name') 
            ?>

            <?php // echo $form->field($model, 'furnishing') 
            ?>

            <?php // echo $form->field($model, 'add_other_rooms') 
            ?>

            <?php // echo $form->field($model, 'total_floors') 
            ?>

            <?php // echo $form->field($model, 'prop_on_which-floor') 
            ?>

            <?php // echo $form->field($model, 'dedicated_trnsformer') 
            ?>

            <?php // echo $form->field($model, 'reserved_parking') 
            ?>

            <?php // echo $form->field($model, 'dedicated_transformer') 
            ?>

            <?php // echo $form->field($model, 'availability') 
            ?>

            <?php // echo $form->field($model, 'possession_by') 
            ?>

            <?php // echo $form->field($model, 't_and_cp') 
            ?>

            <?php // echo $form->field($model, 'nagar_nigam_approved') 
            ?>

            <?php // echo $form->field($model, 'ownership_type') 
            ?>

            <?php // echo $form->field($model, 'selling_price') 
            ?>

            <?php // echo $form->field($model, 'collectrate_rate_sqft') 
            ?>

            <?php // echo $form->field($model, 'collectrate_rate_type') 
            ?>

            <?php // echo $form->field($model, 'price_negotiable') 
            ?>

            <?php // echo $form->field($model, 'water_source') 
            ?>

            <?php // echo $form->field($model, 'over_looking') 
            ?>

            <?php // echo $form->field($model, 'expected_property_valuation') 
            ?>

            <?php // echo $form->field($model, 'commercial_project_coming') 
            ?>

            <?php // echo $form->field($model, 'special_points') 
            ?>

            <?php // echo $form->field($model, 'hypothecation_details') 
            ?>

            <?php // echo $form->field($model, 'ownership') 
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