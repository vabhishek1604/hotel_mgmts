<?php

use app\models\Advisor;
use app\models\Amenities;
use app\models\PropAmenities;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Property */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
h4 {
    border-bottom: 2px solid #c9302c;
    padding-bottom: 9px;
    position: relative;
}

strong {
    font-size: 17px;
    font-weight: 700;
}
</style>
<div class="property-form">

    <?php $form = ActiveForm::begin(); ?>
    <h4>
        <strong>1. <?php echo Yii::t('app', 'Property Details'); ?></strong>
    </h4>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'property_type')->radioList(['Residential' => 'Residential', 'Commercial' => 'Commercial',], ['prompt' => '']) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'types')->dropDownList(['Office' => 'Office', 'Retail' => 'Retail', 'Commercial Land' => 'Commercial Land', 'Industrial Land' => 'Industrial Land', 'Warehouse' => 'Warehouse', 'Hotel & Restaurant' => 'Hotel & Restaurant', 'Apartment/Flat' => 'Apartment/Flat', 'Builder Floor' => 'Builder Floor', 'House/Villa' => 'House/Villa', 'Residential Plot' => 'Residential Plot', 'Duplex' => 'Duplex', 'Triplex' => 'Triplex', 'Others' => 'Others'], ['prompt' => 'select']) ?>
        </div>
    </div>
    <h4>
        <strong>2. <?php echo Yii::t('app', 'Property Address'); ?></strong>
    </h4>
    <div class="row">
        <div class="col-lg-3">
            <!-- <?= $form->field($model, 'property_name')->textInput(['maxlength' => true,]) ?> -->
            <?= $form->field($model, 'project_name')->textInput(['maxlength' => true, 'placeholder' => 'Propety Name']) ?>
        </div>
        <div class="col-lg-3">
            <!-- <?= $form->field($model, 'prop_code')->textInput(['maxlength' => true, 'placeholder' => 'Propety Code']) ?> -->
            <?= $form->field($model, 'house_no')->textInput(['maxlength' => true, 'placeholder' => 'Enter House /Street Number']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'land_mark')->textInput(['maxlength' => true, 'placeholder' => 'Landmark']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'locality')->textInput(['maxlength' => true, 'placeholder' => 'Locality']) ?>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'city')->textInput(['maxlength' => true, 'placeholder' => 'City']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'state')->textInput(['maxlength' => true, 'placeholder' => 'State']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'industrial_area_name')->textInput(['maxlength' => true, 'placeholder' => 'Industrial Area Name']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'ward_number')->textInput(['maxlength' => true, 'placeholder' => 'Ward Number']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'ward_name')->textInput(['maxlength' => true, 'placeholder' => 'Ward Name']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'special_economic_zone')->textInput(['maxlength' => true, 'placeholder' => 'Special Economic Zone']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'ph_no')->textInput(['maxlength' => true, 'placeholder' => 'Ph Number']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'diversion_no')->textInput(['maxlength' => true, 'placeholder' => 'Diversion Number']) ?>
        </div>
    </div>
    <h4>
        <strong>3. <?php echo Yii::t('app', 'Property Details'); ?></strong>
    </h4>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'carpet_area')->textInput(['maxlength' => true, 'placeholder' => 'Carpet Area']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'super_built')->textInput(['maxlength' => true, 'placeholder' => 'Super Built Up Area']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'hall')->textInput(['maxlength' => true, 'placeholder' => 'Hall']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'washrooms')->dropDownList(['Attached' => 'Attached', 'Standalone' => 'Standalone',], ['prompt' => 'select']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'promoter_name')->textInput(['maxlength' => true, 'placeholder' => 'Promoter Name']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'bedroom')->textInput(['maxlength' => true, 'placeholder' => 'Bedroom']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'pantry')->dropDownList(['Yes' => 'Yes', 'No' => 'No',], ['prompt' => 'select']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'furnishing')->dropDownList(['Fully Furnished' => 'Fully Furnished', 'Semi Furnished' => 'Semi Furnished', 'Unfurnished' => 'Unfurnished'], ['prompt' => 'select']) ?>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'add_other_rooms')->dropDownList(['Pooja' => 'Pooja', 'Study Room' => 'Study Room', 'Balcony' => 'Balcony', 'Others' => 'Others'], ['prompt' => 'select']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'total_floors')->textInput(['maxlength' => true, 'placeholder' => 'Total Floors']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'prop_on_which_floor')->textInput(['maxlength' => true, 'placeholder' => 'Property On Which Floor']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'dedicated_transformer')->dropDownList(['Yes' => 'Yes', 'No' => 'No',], ['prompt' => 'select']) ?>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'reserved_parking')->dropDownList(['Yes' => 'Yes', 'No' => 'No',], ['prompt' => 'select']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'availability')->dropDownList(['Under construction' => 'Under construction', 'Ready to Move in' => 'Ready to Move in',], ['prompt' => 'select']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'possession_by')->textInput(['maxlength' => true, 'placeholder' => 'Possession By']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <h4>
                <strong>4. <?php echo Yii::t('app', 'T & CP'); ?></strong>
            </h4>
            <div class="row">
                <div class="col-lg-5">
                    <?= $form->field($model, 't_and_cp')->radioList(['Yes' => 'Yes', 'No' => 'No',], ['prompt' => '']) ?>
                </div>
                <div class="col-lg-7">
                    <?= $form->field($model, 'nagar_nigam_approved')->dropDownList(['Yes' => 'Yes', 'No' => 'No',], ['prompt' => 'select']) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <h4>
                <strong>5. <?php echo Yii::t('app', 'Pricing'); ?></strong>
            </h4>
            <div class="col-lg-2">
                <?= $form->field($model, 'ownership_type')->dropDownList(['Freehold' => 'Freehold', 'Leasehold' => 'Leasehold', 'Hypothecated' => 'Hypothecated', 'POA' => 'POA',], ['prompt' => 'select']) ?>
            </div>
            <div class="col-lg-2">
                <?= $form->field($model, 'selling_price')->textInput(['maxlength' => true, 'placeholder' => 'Selling Price']) ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'collectrate_rate_sqft')->textInput(['maxlength' => true, 'placeholder' => 'Collectrate Rate Per Sqft']) ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'collectrate_rate_type')->dropDownList(['All Inclusive Price' => 'All Inclusive Price', 'Tax & Govt. Charges Excluded' => 'Tax & Govt. Charges Excluded',], ['prompt' => 'select']) ?>
            </div>
            <div class="col-lg-2">
                <?= $form->field($model, 'price_negotiable')->dropDownList(['Yes' => 'Yes', 'No' => 'No',], ['prompt' => 'select']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h4>
                <strong>6. <?php echo Yii::t('app', 'Features'); ?></strong>
            </h4>
            <div class="col-lg-12">
                <?php
                $cats = Amenities::find()->all();
                $amenities_ids = PropAmenities::find()->select('amenities_id')->where(['property_id' => $model->id])->asArray()->all();
                $values = [];
                foreach ($amenities_ids as  $v) {

                    array_push($values, $v['amenities_id']);
                }

                $model->amenities_ids = $values;

                foreach ($cats as $i => $category) {
                    $key = 0; ?>
                <div class="col-lg-6">
                    <?= $form
                            ->field($model, in_array("$category->id", $model->amenities_ids, TRUE) ? 'amenities_ids[' . array_search("$category->id", $model->amenities_ids) . ']' : 'amenities_ids[]')
                            ->checkbox([
                                'label' => $category->name,
                                'value' => $category->id
                            ])
                        ?>
                </div>
                <?php }
                if (count($cats) == 0) {
                    echo '<li>No Categories found.</li>';
                } ?>
            </div>
        </div>
        <div class="col-lg-6">
            <h4>
                <strong>7. <?php echo Yii::t('app', 'Overlooking'); ?></strong>
            </h4>
            <div class="col-lg-4">
                <?= $form->field($model, 'over_looking')->dropDownList(['Main Road' => 'Main Road', 'Club' => 'Club', 'Pool' => 'Pool', 'Others' => 'Others',], ['prompt' => 'select']) ?>
            </div>
            <div class="col-lg-8">
                <?= $form->field($model, 'water_source')->checkboxList(['Municipal Corporation' => 'Municipal Corporation', 'Bore Well/Tank' => 'Bore Well/Tank']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <h4>
                <strong>8. <?php echo Yii::t('app', 'Expected Property Valuation In Next Two(2) Years'); ?></strong>
            </h4>
            <div class="col-lg-12">
                <?= $form->field($model, 'expected_property_valuation')->textInput(['maxlength' => true, 'placeholder' => 'Expected Property Valuation'])->label(false) ?>
            </div>
        </div>
        <div class="col-lg-6">
            <h4>
                <strong>9. <?php echo Yii::t('app', 'Any New Commercial Project Coming Up Nearby'); ?></strong>
            </h4>
            <div class="col-lg-12">
                <?= $form->field($model, 'commercial_project_coming')->dropDownList(['Yes' => 'Yes', 'No' => 'No',], ['prompt' => 'select']) ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <h4>
                <strong>10. <?php echo Yii::t('app', 'Any Other Social Points To Mention'); ?></strong>
            </h4>
            <div class="col-lg-12">
                <?= $form->field($model, 'special_points')->textarea(['rows' => 6, 'placeholder' => 'Description'])->label(false) ?>
            </div>
        </div>
        <div class="col-lg-3">
            <h4>
                <strong>11. <?php echo Yii::t('app', 'Hypothecation Details'); ?></strong>
            </h4>
            <div class="col-lg-12">
                <?= $form->field($model, 'hypothecation_details')->textInput(['maxlength' => true, 'placeholder' => 'Hypothecation Details'])->label(false) ?>
            </div>
        </div>
        <div class="col-lg-2">
            <h4>
                <strong>12. <?php echo Yii::t('app', 'Ownership'); ?></strong>
            </h4>
            <div class="col-lg-12">
                <?= $form->field($model, 'ownership')->dropDownList(['Single Ownership' => 'Single Ownership', 'Multiple Ownership' => 'Multiple Ownership',], ['prompt' => 'select'])->label(false) ?>
            </div>
        </div>
        <div class="col-lg-3">
            <h4>
                <strong>13. <?php echo Yii::t('app', 'Advisor Details'); ?></strong>
            </h4>
            <div class="col-lg-12">
                <?= $form->field($model, 'advisor_id')->dropDownList(ArrayHelper::map(Advisor::find()->where(['type' => 'agent'])->asArray()->all(), 'id', 'name'), ['prompt' => '--Select--']) ?>
            </div>
        </div>
    </div>

    <!-- <?= $form->field($model, 'is_active')->textInput() ?>

        <?= $form->field($model, 'created_by')->textInput() ?>

        <?= $form->field($model, 'created_at')->textInput() ?>

        <?= $form->field($model, 'updated_by')->textInput() ?>

        <?= $form->field($model, 'updated_at')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'style' => 'margin-left:15px:']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>