<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Chapters $model */

$this->title = 'Update Chapters: ' . $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Chapters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Title, 'url' => ['view', 'ChapterId' => $model->ChapterId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="chapters-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
