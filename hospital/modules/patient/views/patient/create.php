<?php
use app\components\widgets\encounter\OpdAppointment;
use app\components\widgets\encounter\OpdIndex;
use yii\helpers\Html;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\OpdReg $model */


?>
<div class="opd-reg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= OpdAppointment::widget(['model'=> $model]) ?>
    <?php Pjax::begin(['id' => 'patient-encounter-pjax']); ?>
    <?= OpdIndex::widget(['dataProvider'=> $dataProvider]) ?>
    <?php Pjax::end(); ?>
</div>
