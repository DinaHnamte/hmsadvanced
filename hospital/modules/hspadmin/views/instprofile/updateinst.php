<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Institution */

$this->title = 'Update Institution: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Institution Admin', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="institution-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
