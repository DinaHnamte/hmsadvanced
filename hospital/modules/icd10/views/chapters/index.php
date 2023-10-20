<?php

use app\models\Chapters;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Chapters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chapters-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Chapters', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ChapterId',
            'Title',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Chapters $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ChapterId' => $model->ChapterId]);
                 }
            ],
        ],
    ]); ?>


</div>
