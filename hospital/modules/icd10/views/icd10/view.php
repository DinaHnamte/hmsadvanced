<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Icd10 $model */

$this->title = $model->Title;
$this->params['breadcrumbs'][] = ['label' => 'Icd10s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="icd10-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Id' => $model->Id], [
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
            'Id',
            'Level',
            'Category',
            'ChapterId',
            'BlockId',
            'Dagger',
            'Aster',
            'WithoutDot',
            'Title',
            'Mortality1',
            'Mortality2',
            'Mortality3',
            'Mortality4',
            'Mortality5',
        ],
    ]) ?>

</div>
