<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12">
                    <?= $form->field($model, 'proj_title')->textInput(['maxlength' => true,'placeholder'=>'Project Title']) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'proj_type')->dropDownList([ 'government' => 'Government Project', 'educational' => 'Educational Project', 'residential' => 'Residential Project']) ?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'proj_status')->dropDownList([ 'Upcoming' => 'Upcoming Project', 'Ongoing' => 'Ongoing Project', 'Completed' => 'Completed Project']) ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <?= $form->field($model, 'proj_address')->textarea(['rows' => 5,'placeholder'=>'Address']) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'proj_landmark')->textInput(['maxlength' => true,'placeholder'=>'Land Mark']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'proj_city')->textInput(['maxlength' => true,'placeholder'=>'City']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'proj_state')->textInput(['maxlength' => true,'placeholder'=>'State']) ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <?= $form->field($model, 'proj_remark')->textarea(['rows' => 3]) ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <?= Html::submitButton('Save & Submit', ['class' => 'btn btn-success']) ?>
    </div>
</div>

<?php ActiveForm::end(); ?>

</div>


<script src="<?php echo Yii::$app->request->baseUrl; ?>/web/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode: "exact",
        elements: "project-proj_remark",
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
