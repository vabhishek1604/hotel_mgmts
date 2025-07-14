<?php

use app\models\Company;
use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model Company */
/* @var $form ActiveForm */
?>

<div class="company-form">

    <?php
    $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
    ?>

    <?php // $form->field($model, 'user_id')->textInput() ?>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'company_name')->textInput(['maxlength' => true, 'placeholder' => 'Company Name']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'company_title')->textInput(['maxlength' => true, 'placeholder' => 'Company Title']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'company_gstin')->textInput(['maxlength' => true, 'placeholder' => 'Company GSTIN']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true, 'placeholder' => 'Contact Number']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'official_email_id')->textInput(['maxlength' => true, 'placeholder' => 'Official Mail']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'support_mail')->textInput(['maxlength' => true, 'placeholder' => 'Support Mail']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'website_url')->textInput(['maxlength' => true, 'placeholder' => 'Website Url']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'company_address')->textarea(['maxlength' => true, 'rows' => 6, 'placeholder' => 'Company Address']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?= $form->field($model, 'company_desc')->textarea(['rows' => 6, 'placeholder' => 'Company Description'])->label('Company Description') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3" style="height: 10%">
            <?php
            echo $form->field($model, 'company_favicon')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions' => [
                    'allowedFileExtensions' => ['jpg', 'png', 'jpeg', 'ico'],
                    'maxFileSize' => 5000,
                    'showCaption' => false,
                    'showRemove' => false,
                    'showUpload' => false,
                    'showCancel' => false,
                    'browseClass' => 'btn btn-primary btn-block',
                    'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                    'browseLabel' => 'Select Image'
                ]
            ]);
            ?>
        </div>
        <?php if ($model->id) { ?>
            <div class="col-lg-3"><br><br>
                <img src="<?php echo Yii::$app->request->baseUrl; ?><?php echo $model->company_favicon; ?>"
                    style="width:100px;height:100px">

            </div>
        <?php } ?>
        <div class="col-lg-3" style="height: 10%">
            <?php
            echo $form->field($model, 'company_logo')->widget(FileInput::classname(), [
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
                ]
            ]);
            ?>
        </div>
        <?php if ($model->id) { ?>
            <div class="col-lg-3"><br><br>
                <img src="<?php echo Yii::$app->request->baseUrl; ?><?php echo $model->company_logo; ?>"
                    style="width:100px;height:100px">

            </div>
        <?php } ?>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <?= $form->field($model, 'company_facebook')->textInput(['maxlength' => true, 'placeholder' => 'Facebook Url']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'company_twitter')->textInput(['maxlength' => true, 'placeholder' => 'Twitter Url']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'company_linkedin')->textInput(['maxlength' => true, 'placeholder' => 'LinkedIn Url']) ?>
        </div>
        <div class="col-lg-3">
            <?= $form->field($model, 'company_skype')->textInput(['maxlength' => true, 'placeholder' => 'Skype Id']) ?>
        </div>
    </div>
    <?php // $form->field($model, 'company_logo')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'company_logo_lg')->textInput(['maxlength' => true]) ?>


    <?php // $form->field($model, 'is_running')->textInput() ?>

    <?php // $form->field($model, 'is_active')->textInput() ?>

    <?php // $form->field($model, 'created_by')->textInput() ?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'updated_by')->textInput() ?>

    <?php // $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save & Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script src="<?php echo Yii::$app->request->baseUrl; ?>/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode: "exact",
        elements: "company-company_address,company-company_desc",
        theme: "advanced",
        plugins: "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
        // Theme options
        theme_advanced_buttons1: "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect,forecolor,backcolor",
        //  theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect,link,unlink",
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
        style_formats: [{
            title: 'Bold text',
            inline: 'b'
        },
        {
            title: 'Red text',
            inline: 'span',
            styles: {
                color: '#ff0000'
            }
        },
        {
            title: 'Red header',
            block: 'h1',
            styles: {
                color: '#ff0000'
            }
        },
        {
            title: 'Example 1',
            inline: 'span',
            classes: 'example1'
        },
        {
            title: 'Example 2',
            inline: 'span',
            classes: 'example2'
        },
        {
            title: 'Table styles'
        },
        {
            title: 'Table row 1',
            selector: 'tr',
            classes: 'tablerow1'
        }
        ],
        // Replace values for the template plugin
        template_replace_values: {
            username: "Some User",
            staffid: "991234"
        }
    });
</script>