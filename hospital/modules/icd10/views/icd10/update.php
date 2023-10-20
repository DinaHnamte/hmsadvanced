<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Icd10 $model */

$this->title = 'Update Icd10: ' . $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Icd10s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'Id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="icd10-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
