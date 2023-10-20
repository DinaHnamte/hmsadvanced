<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Blocks $model */

$this->title = $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Blocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="blocks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'BlockId' => $model->BlockId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'BlockId' => $model->BlockId], [
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
            'BlockId',
            'BlockIdEnd',
            'ChapterId',
            'Title',
        ],
    ]) ?>

</div>
