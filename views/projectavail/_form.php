<?php

use app\models\Amenities;
use app\models\Project;
use app\models\ProjectAvailabilities;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model ProjectAvailabilities */
/* @var $form ActiveForm */
?>

<div class="project-availabilities-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'avail_projid')->dropDownList(ArrayHelper::map(Project::find()->where(['proj_isactive'=>1])->asArray()->all(), 'proj_id', 'proj_title'), ['prompt' => '--Select Project--'])->label('Avilable Projects') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'avail_title')->textInput(['placeholder'=>'Avilable Title'])->label('Avilable Title') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'avail_type')->dropDownList([ 'Apartment' => 'Apartment', 'Singlex' => 'Singlex', 'Duplex' => 'Duplex', 'Other' => 'Other', ], ['prompt' => 'Select'])->label('Avilable Type') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'avail_bedroom')->textInput(['placeholder'=>'Avilable Bedroom'])->label('Avilable Bedroom') ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'avail_bathroom')->textInput(['placeholder'=>'Avilable Bathroom'])->label('Avilable Bathroom') ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'avail_area_in_sqft')->textInput(['placeholder'=>'Avilable Area in Sqft'])->label('Avilable Area in Sqft') ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'avail_qty')->textInput(['placeholder'=>'Avilable Qty'])->label('Avilable Qty') ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'avail_price')->textInput(['maxlength' => true,'placeholder'=>'Avilable Price'])->label('Avilable Price') ?>
        </div>
    </div>
    <div class="row">
        
        <div class="col-lg-12">
            <?= $form->field($model, 'avail_other_features')->checkboxList(ArrayHelper::map(Amenities::find()->where(['am_isactive'=>1])->asArray()->all(), 'am_id', 'am_name'))->label(FALSE) ?>
        </div>
        <div class="col-lg-12">
            <?= $form->field($model, 'avail_prop_dec')->textarea(['rows' => 2]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script src="<?php echo Yii::$app->request->baseUrl; ?>/web/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode: "exact",
        elements: "projectavailabilities-avail_prop_dec",
        theme: "advanced",
        plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
        // Theme options
        //theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect,forecolor,backcolor",
        theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect,link,unlink",
        theme_advanced_toolbar_location: "top",
        theme_advanced_toolbar_align: "left",
        theme_advanced_statusbar_location: "bottom",
        theme_advanced_resizing: true,
        // Example content CSS (should be your site CSS)
        //content_css: "css/content.css",
        // Drop lists for link/image/media/template dialogs
        template_external_list_url: "lists/template_list.js",
        external_link_list_url: "lists/link_list.js",
        external_image_list_url: "lists/image_list.js",
        media_external_list_url: "lists/media_list.js",
        // Style formats
        style_formats: [
            {title: 'Bold text', inline: 'b'},
            {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
            {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
            {title: 'Example 1', inline: 'span', classes: 'example1'},
            {title: 'Example 2', inline: 'span', classes: 'example2'},
            {title: 'Table styles'},
            {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],
        // Replace values for the template plugin
        template_replace_values: {
            username: "Some User",
            staffid: "991234"
        }
    });
</script>
