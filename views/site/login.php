<?php
/* @var $this View */
/* @var $form ActiveForm */
/* @var $model LoginForm */

use app\models\Company;
use app\models\LoginForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\web\View;

$this->title = Company::getCompanyData('company_name') . ' Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="panel panel-default form-container">
        <div class="panel-body">
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

            <form role="form">
                <h3 class="text-center margin-xl-bottom"><?= Html::encode($this->title) ?></h3>

                <div class="form-group text-center">
                    <label class="sr-only" for="email">Email Address</label>
                    <input class="form-control input-lg" type="text" name="LoginForm[username]"
                        placeholder="Enter Username" value="<?php echo $model->username; ?>">
                </div>
                <div class="form-group text-center">
                    <label class="sr-only" for="password">Password</label>
                    <input type="password" class="form-control input-lg" placeholder="Password"
                        name="LoginForm[password]">
                </div>

                <button type="submit" id="login" class="btn btn-primary btn-block btn-lg">SIGN IN</button>
            </form>
        </div>
        <div class="panel-body text-center">
            <div class="margin-bottom">
                <a class="text-muted text-underline" href="javascript:;">Forgot Password?</a>
            </div>

        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>