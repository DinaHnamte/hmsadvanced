<?php

use app\models\Icd10;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Icd10s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="icd10-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Icd10', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Level',
            'Category',
            'ChapterId',
            'BlockId',
            //'Dagger',
            //'Aster',
            //'WithoutDot',
            //'Title',
            //'Mortality1',
            //'Mortality2',
            //'Mortality3',
            //'Mortality4',
            //'Mortality5',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Icd10 $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
