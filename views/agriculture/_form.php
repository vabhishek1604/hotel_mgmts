<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Agriculture */
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
<div class="agriculture-form">

    <?php $form = ActiveForm::begin(); ?>
    <h4>
        <strong>1. <?php echo Yii::t('app', 'Property Details'); ?></strong>
    </h4>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'pro_type')->radioList(array('Agriculture' => 'Agriculture')); ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'land_type1')->radioList(array('Irrigated' => 'Irrigated', 'Non-Irrigated' => 'Non-Irrigated')) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'soil_type')->radioList(array('Black' => 'Black', 'Red' => 'Red', 'Brown' => 'Brown')); ?>
        </div>
        <?= $form->field($model, 'owner_type')->radioList(array('General' => 'General', 'OBC' => 'OBC', 'SC' => 'SC', 'ST' => 'ST')); ?>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h4>
                <strong>2. <?php echo Yii::t('app', 'Property Seller'); ?></strong>
            </h4>
            <?= $form->field($model, 'pro_seller')->radioList(array('Owner' => 'Owner', 'Builder' => 'Builder', 'Broker' => 'Broker', 'Agreement' => 'Agreement', 'Other' => 'Other')) ?>
        </div>
        <div class="col-lg-6">
            <h4>
                <strong>3. <?php echo Yii::t('app', 'Contact Number');
                            ?></strong>
            </h4>
            <?= $form->field($model, 'contact_no')->textInput(['maxlength' => true, 'placeholder' => 'Enter contact number'])->label(false) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h4>
                <strong>4. <?php echo Yii::t('app', 'Property Address'); ?></strong>
            </h4>
            <div class="col-lg-3">
                <?= $form->field($model, 'pro_landmark')->textInput(['maxlength' => true, 'placeholder' => 'Landmark']) ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'pro_village')->textInput(['maxlength' => true, 'placeholder' => 'Village']) ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'pro_tehsil')->textInput(['maxlength' => true, 'placeholder' => 'Tehsil']) ?>
            </div>
            <div class="col-lg-3">
                <?= $form->field($model, 'pro_district')->textInput(['maxlength' => true, 'placeholder' => 'District']) ?>
            </div>
        </div>
    </div>

    <h4>
        <strong>5. <?php echo Yii::t('app', 'Land Details'); ?></strong>
    </h4>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'area')->textInput(['maxlength' => true, 'placeholder' => 'Enter Only Number']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'area_unit')->dropDownList(['Acre' => 'Acre', 'Hectare' => 'Hectare'], ['prompt' => 'select']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'ph_no')->textInput(['maxlength' => true, 'placeholder' => 'Ph Number']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'khasra_no')->textInput(['maxlength' => true, 'placeholder' => 'Khasra Number']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'diversion_type')->radioList(array('Diverted' => 'Diverted', 'Non-Diverted' => 'Non-Diverted')) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'diversion_no')->textInput(['maxlength' => true, 'placeholder' => 'Diversion Number']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <h4>
                <strong>6. <?php echo Yii::t('app', 'Water Level'); ?></strong>
            </h4>
            <?= $form->field($model, 'water_level')->textInput(['maxlength' => true, 'placeholder' => 'Water Level'])->label(false) ?>
        </div>
        <div class="col-lg-4">
            <h4>
                <strong>7. <?php echo Yii::t('app', 'Sources Of Water'); ?></strong>
            </h4>
            <?= $form->field($model, 'water_source')->checkboxList(
                ['Tubewell' => 'Tubewell', 'Canal' => 'Canal', 'Pond' => 'Pond', 'Other' => 'Other']
            )->label(false); ?>
        </div>
        <div class="col-lg-5">
            <h4>
                <strong>8. <?php echo Yii::t('app', 'Land Type'); ?></strong>
            </h4>
            <?= $form->field($model, 'land_type')->radioList(array('Agriculture' => 'Agriculture', 'Greenbelt' => 'Greenbelt', 'Residential' => 'Residential', 'Commercial' => 'Commercial'))->label(false) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-7">
        <h4>
            <strong>9. <?php echo Yii::t('app', 'Road Connectivity'); ?></strong>
        </h4>
        <div class="col-lg-4">
            <?= $form->field($model, 'road_connectivity')->radioList(array('TAR' => 'TAR', 'WBM' => 'WBM')) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'dist_from_front')->textInput(['maxlength' => true, 'placeholder' => 'Distance from Front']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'dist_from_road')->textInput(['maxlength' => true, 'placeholder' => 'Distance from Road']) ?>
        </div>
    </div>
    <div class="col-lg-5">
        <h4>
            <strong>10. <?php echo Yii::t('app', 'Electricity Available'); ?></strong>
        </h4>
        <div class="col-lg-5">
            <?= $form->field($model, 'electricity_avail')->radioList(array('YES' => 'YES', 'NO' => 'NO')) ?>
        </div>
        <div class="col-lg-7">
            <?= $form->field($model, 'dist_from_high_tension_line')->textInput(['maxlength' => true, 'placeholder' => 'Distance from High Tension Line']) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <h4>
            <strong>11. <?php echo Yii::t('app', 'Land Distance in (KM)'); ?></strong>
        </h4>
        <div class="col-lg-4">
            <?= $form->field($model, 'district_centre')->textInput(['maxlength' => true, 'placeholder' => 'District Centre']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'tehsil')->textInput(['maxlength' => true, 'placeholder' => 'Tehsil']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'village')->textInput(['maxlength' => true, 'placeholder' => 'Village']) ?>
        </div>
    </div>
    <div class="col-lg-6">
        <h4>
            <strong>12. <?php echo Yii::t('app', 'Ownership'); ?></strong>
        </h4>
        <div class="col-lg-12">
            <?= $form->field($model, 'ownership_type')->checkboxList(['Single' => 'Single', 'CO-Owners' => 'CO-Owners', 'Multiple' => 'Multiple', 'Freehold' => 'Freehold', 'Leased' => 'Leased', 'POA' => 'POA', 'Hypothecated' => 'Hypothecated',], ['prompt' => ''])->label(false) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h4>
            <strong>13. <?php echo Yii::t('app', 'Pricing'); ?></strong>
        </h4>
        <div class="col-lg-4">
            <?= $form->field($model, 'govt_guideline')->textInput(['maxlength' => true, 'placeholder' => 'Govt. Guideline']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'market_value')->textInput(['maxlength' => true, 'placeholder' => 'Market Value']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'selling_price')->textInput(['maxlength' => true, 'placeholder' => 'Selling Price']) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <h4>
            <strong>14. <?php echo Yii::t('app', 'Expected Property Value In Next 2 Years'); ?></strong>
        </h4>
        <div class="col-lg-8">
            <?= $form->field($model, 'expected_property_valuation')->textInput(['maxlength' => true])->label(false) ?>
        </div>
    </div>
    <div class="col-lg-6">
        <h4>
            <strong>15. <?php echo Yii::t('app', 'Any New Project Coming Nearby'); ?></strong>
        </h4>
        <div class="col-lg-12">
            <?= $form->field($model, 'new_project_coming')->radioList(array('YES' => 'YES', 'NO' => 'NO')) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <h4>
            <strong>16. <?php echo Yii::t('app', 'Any Other Social Points To Mention'); ?></strong>
        </h4>
        <div class="col-lg-12">
            <?= $form->field($model, 'special_points')->textarea(['rows' => 6]) ?>
        </div>
    </div>
    <div class="col-lg-6">
        <h4>
            <strong>17. <?php echo Yii::t('app', 'Required Selling Time  As Per Landlord'); ?></strong>
        </h4>
        <div class="col-lg-12">
            <?= $form->field($model, 'selling_time_req')->textInput(['maxlength' => true, 'placeholder' => 'Selling Time Required'])->label(false) ?>
        </div>
    </div>
</div>
<h4>
    <strong>18. <?php echo Yii::t('app', 'If Any Other Dispute Related to Property Given Below'); ?></strong>
</h4>
<div class="row">
    <div class="col-lg-3">
        <?= $form->field($model, 'claims_from_co_owners')->radioList(array('YES' => 'YES', 'NO' => 'NO')) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'family')->radioList(array('YES' => 'YES', 'NO' => 'NO')) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'legal_heirs')->radioList(array('YES' => 'YES', 'NO' => 'NO')) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'misrepresentation_by_seller')->radioList(array('YES' => 'YES', 'NO' => 'NO')) ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <?= $form->field($model, 'bad_title_of_property')->radioList(array('YES' => 'YES', 'NO' => 'NO')) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'disputes_related_to_property_acquired_as_a_gift_or_through_will')->radioList(array('YES' => 'YES', 'NO' => 'NO')) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'disputes_related_to_easements_rights')->radioList(array('YES' => 'YES', 'NO' => 'NO')) ?>
    </div>
    <div class="col-lg-3">
        <?= $form->field($model, 'Others')->radioList(array('YES' => 'YES', 'NO' => 'NO')) ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <h4>
            <strong>19. <?php echo Yii::t('app', '
            Adviser Details'); ?></strong>
        </h4>
        <div class="col-lg-8">
            <?= $form->field($model, 'advisor_id')->textInput(['maxlength' => true, 'placeholder' => 'Enter Advisor Name']) ?>
        </div>
    </div>
</div>

<!-- <?= $form->field($model, 'prop_code')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'prop_secret_code')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'is_active')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'is_verified')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?> -->

<div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'style' => 'margin-left: 15px;']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>