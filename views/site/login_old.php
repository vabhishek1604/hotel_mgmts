<?php
/* @var $this View */
/* @var $form ActiveForm */
/* @var $model LoginForm */

use app\models\LoginForm;
use yii\bootstrap\ActiveForm;
use yii\web\View;
use yii\widgets\Pjax;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12">
            <div id="login-box">
                <div id="login-box-holder">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <header id="login-header">
                                <div id="login-logo">
                                    Login
                                </div>
                            </header>
                            <div id="login-box-inner">


                                <?php
                                $form = ActiveForm::begin([
                                            'id' => 'login-form',
                                            'options' => ['class' => 'fsorm-control'],
                                            'action' => ['site/login'],
                                            'fieldConfig' => [
                                                'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>\n",
                                                'labelOptions' => ['class' => 'col-lg-12 control-label'],
                                            ],
                                ]);
                                ?>
                                <?= $form->errorSummary($model, ['class' => 'alert alert-danger']); ?>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-mobile mx-auto"></i>
                                        </div>
                                    </div>
                                    <input class="form-control" type="text" name="LoginForm[username]" placeholder="Enter Mobile no" value="<?php echo $model->username; ?>">
                                    <?php // $form->field($model, 'username')->textInput(['placeholder' => 'Enter Mobile no', 'maxlength' => true, 'title' => 'Enter Mobile no']);  ?>

                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fa fa-key mx-auto"></i>
                                        </div>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Password" name="LoginForm[password]">

                                </div>
                                <div id="remember-me-wrapper">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="checkbox-nice">
                                                <input type="checkbox" id="remember-me" />
                                                <label for="remember-me">
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>                                                  
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input class="btn btn-success col-12" type="submit" id="login" value="Login">

                                    </div>
                                </div>

                                <?php ActiveForm::end(); ?>


                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
</div>







