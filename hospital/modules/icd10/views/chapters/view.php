<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Chapters $model */

$this->title = $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Chapters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="chapters-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ChapterId' => $model->ChapterId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ChapterId' => $model->ChapterId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ChapterId',
            'Title',
        ],
    ]) ?>

</div>
