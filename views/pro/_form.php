<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'commercial_type')->dropDownList([ 'Offices' => 'Offices', 'Retail' => 'Retail', 'Commercial Land' => 'Commercial Land', 'Industrial Land' => 'Industrial Land', 'Warehouse' => 'Warehouse', 'Hotel & Restaurant' => 'Hotel & Restaurant', 'Others' => 'Others', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'property_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'property_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'land_mark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'locality')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'industrial_area_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'wardnumber_and_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'special_economic_zone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ph_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diversion_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carpet_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'super_built')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hall')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'washrooms')->dropDownList([ 'Attached' => 'Attached', 'Standalone' => 'Standalone', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pantry')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'furnishing')->dropDownList([ 'Fully Furnished' => 'Fully Furnished', 'Semi Furnished' => 'Semi Furnished', 'Unfurnished' => 'Unfurnished', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'total_floors')->textInput() ?>

    <?= $form->field($model, 'reserved_parking')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'dedicated_transformer')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'availability')->dropDownList([ 'Under construction' => 'Under construction', 'Ready to Move in' => 'Ready to Move in', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'possession_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 't_and_cp')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nagar_nigam_approved')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ownership_type')->dropDownList([ 'Freehold' => 'Freehold', 'Leasehold' => 'Leasehold', 'Hypothecated' => 'Hypothecated', 'POA' => 'POA', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'selling_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'collectrate_rate_sqft')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'collectrate_rate_type')->dropDownList([ 'All Inclusive Price' => 'All Inclusive Price', 'Tax & Govt. Charges Excluded' => 'Tax & Govt. Charges Excluded', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'Price Negotiable')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'water_source')->dropDownList([ 'Municipal Corporation' => 'Municipal Corporation', 'Bore Well/Tank' => 'Bore Well/Tank', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'over_looking')->dropDownList([ 'Main Road' => 'Main Road', 'Club' => 'Club', 'Pool' => 'Pool', 'Others' => 'Others', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'expected_property_valuation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'commercial_project_coming')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'special_points')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hypothecation_details')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ownership')->dropDownList([ 'Single Ownership' => 'Single Ownership', 'Multiple Ownership' => 'Multiple Ownership', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'advisor_id')->textInput() ?>

    <?= $form->field($model, 'is_active')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
