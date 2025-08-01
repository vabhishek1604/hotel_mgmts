<?php

use app\models\Menues;
use app\models\Pagecontent;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Pagecontent */
/* @var $form ActiveForm */
?>

<div class="pagecontent-form">

    <?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'cont_menuid')->dropDownList(ArrayHelper::map(Menues::find()->where(['menu_status'=>1,'menu_linktype'=>'editable'])->asArray()->all(), 'menu_id', 'menu_title'), ['prompt' => '--Select Menu--']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'cont_order')->textInput(['placeholder'=>'Content Order']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'cont_title')->textInput(['maxlength' => true,'Placeholder'=>'content Title']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6" style="height: 10%;width: 50%;">
                <?php
                    echo $form->field($model, 'cont_image')->widget(FileInput::classname(), [
                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => [
                            'allowedFileExtensions' => ['jpg', 'png', 'jpeg'],
                            'maxFileSize' => 5000,
                            'showCaption' => false,
                            'showRemove' => false,
                            'showUpload' => false,
                            'showCancel' => false,
                            'browseClass' => 'btn btn-primary btn-block',
                            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                            'browseLabel' => 'Select Image'
                    ]]);
                ?>
            </div>
            <?php if ($model->cont_image) { ?>
            <div class="col-lg-6"><br><br>
                <img src="<?php echo Yii::$app->request->baseUrl; ?><?php echo $model->cont_image; ?>" style="width:100%;height:300px">

            </div>
            <?php } ?>
        </div>
        <div class="col-lg-12">
            <?= $form->field($model, 'cont_desc')->textarea(['rows' => 3]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?= Html::submitButton('Save & Upload', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script src="<?php echo Yii::$app->request->baseUrl; ?>/web/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode: "exact",
        elements: "pagecontent-cont_desc",
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
