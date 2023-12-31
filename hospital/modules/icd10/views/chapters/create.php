<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Chapters $model */

$this->title = 'Create Chapters';
$this->params['breadcrumbs'][] = ['label' => 'Chapters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chapters-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
