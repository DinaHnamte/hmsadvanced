<?php

use app\models\Reguser;
use app\models\Employee;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Regusers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reguser-index">

    <h1><?= Html::encode($this->title) ?></h1>

    

    <p>
        <?= Html::a('Add Employee', ['create-employee'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(['id' => 'regusers']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            //'pwd:boolean',
            'regUser.name',
            'regUser.fname',
            'regUser.dob',
            'regUser.sex',
            //'tribe',
            //'commu',
            'regUser.bg',
            'regUser.mobno',
            'regUser.add1',
            //'dist',
            [
				'label'=>'Roles',
				'format'=>'raw',
				'value' => function($data){					
					return Html::a('Roles', ['roles/userroles','iduser' => $data->user_id], ); 	 
				}
			],
            [
				'label'=>'Remove',
				'format'=>'raw',
				'value' => function($data){					
					return Html::a('Remove', ['userroles', 'iduser' => $data->id], [
						'data-confirm' => 'Are you sure you want to remove this Employee?',
						'data-method' => 'POST',
						'data-params' => [
							'emp-id' => $data->id,
						],
					]); 	 
				}
			],
            
        ],
    ]); ?>
    <?php Pjax::end() ?>

</div>
