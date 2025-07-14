<?php

use app\models\Projectavailabilities;
use app\models\Projectimages;
use kartik\widgets\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model ProjectImages */
/* @var $form ActiveForm */
?>

<div class="project-images-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'pimg_propid')->dropDownList(ArrayHelper::map(Projectavailabilities::find()->where(['avail_isactive' => 1])->asArray()->all(), 'avail_id', 'avail_title'), ['prompt' => '--Select Property--'])->label('Property Name') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'pimg_type')->dropDownList(['Floor Plan' => 'Floor Plan', 'Other' => 'Other', 'Thumbnail' => 'Other Thumbnail', 'Main' => 'Main',], ['prompt' => '--Select--'])->label('Image Type') ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6" style="height: 10%;width: 50%;">
                <?php
                echo $form->field($model, 'pimg_url')->widget(FileInput::classname(), [
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
                ])->label('Select Image');
                ?>
            </div>
            <?php if ($model->pimg_url) { ?>
                <div class="col-lg-6"><br><br>
                    <img src="<?php echo Yii::$app->request->baseUrl; ?><?php echo $model->pimg_url; ?>"
                        style="width:100%;height:300px">
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?= Html::submitButton('Save & Upload', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>