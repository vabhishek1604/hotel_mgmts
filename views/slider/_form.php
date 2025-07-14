<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">
    
    <?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'slid_title')->textInput(['maxlength' => true, 'placeholder' => 'Title']) ?>
        </div>
        <div class="col-lg-8">
            <?= $form->field($model, 'slid_desc')->textarea(['rows' => 6, 'placeholder' => 'Description'])->label('Description') ?>
        </div>
        
        <div class="col-lg-6" style="height: 10%;width: 50%;">
            <?php
            echo $form->field($model, 'slid_url')->widget(FileInput::classname(), [
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
            <?php if ($model->slid_url) { ?>
        <div class="col-lg-6"><br><br>
                <img src="<?php echo Yii::$app->request->baseUrl; ?><?php echo $model->slid_url; ?>" style="width:100%;height:300px">

            </div>
        <?php } ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Upload & Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
