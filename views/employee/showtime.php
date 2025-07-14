<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'][1] = 'employee';
$this->params['menu'][2] = 'employee_index';
?>

<script>
setInterval(getInterval, 10000);

function getInterval() {

    var url = "<?php echo \Yii::$app->getUrlManager()->createUrl('employee/attendance'); ?>";
    $.post(url, function(res) {

        //  alert(res);

    });
}
</script>