<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users & Roles';
$this->params['breadcrumbs'][] = ['label' => 'HSP Admin', 'url' => ['employee/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'idinstitution',
            //'salute',
            //'name',
			[
				'label'=>'Name',
				'format'=>'raw',
				'value' => function($data){
					return $data->salute .' '. $data->name; 
				}
			],
            'email:email',
            //'dob',
            //'sex',
            //'mobno',
			[
				'label'=>'',
				'format'=>'raw',
				'value' => function($data){
					$url =Url::to(['userroles','iduser' =>$data->id]) ;
					
					return Html::a('Roles', $url, []); 
				}
			],
        ],
    ]); ?>


</div>
