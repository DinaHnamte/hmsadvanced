<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Blocks $model */

$this->title = 'Update Blocks: ' . $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Blocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'BlockId' => $model->BlockId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="blocks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
