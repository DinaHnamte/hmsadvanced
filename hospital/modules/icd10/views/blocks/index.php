<?php

use app\models\Blocks;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Blocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blocks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Blocks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'BlockId',
            'BlockIdEnd',
            'ChapterId',
            'Title',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Blocks $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'BlockId' => $model->BlockId]);
                 }
            ],
        ],
    ]); ?>


</div>
