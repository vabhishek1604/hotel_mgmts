<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-search">
    <div class="row">
        <div class="col-lg-4">

            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>


            <?= $form->field($model, 'cat_name') ?>
        </div>

        <div class="form-group" style="margin-top: 22px;">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
            <?php echo Html::a('Create Category', ['create'], ['class' => 'btn btn-success', 'style' => 'margin-bottom: 5px;']);
            ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>