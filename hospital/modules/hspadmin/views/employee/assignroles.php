<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assign Roles';
$this->params['breadcrumbs'][] = ['label' => 'Institute Admin', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Users Roles', 'url' => ['employee/usersroles']];
$this->params['breadcrumbs'][] = ['label' => 'User Roles', 'url' => ['employee/userroles','iduser' => $user->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sessiondtl-index">
	
    <h3><?= Html::encode('Roles assigned to : '. $user->username ) ?></h3>
		
		<?= GridView::widget([
        'dataProvider' => $dataProvider,
		'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
			[
				'label'=>'Role Name',
				'format'=>'raw',
				'value' => function($data){
					return $data->name; 
				}
			],
			[
				'label'=>'Role Description',
				'format'=>'raw',
				'value' => function($data){
					return $data->description; 
				}
			],
					
            [
				'label'=>'Name',
				'format'=>'raw',
				'value' => function($data){					
					return Html::a('Assign', ['assignroles', 'iduser' => Yii::$app->request->get('iduser')], [
						'data-confirm' => 'Are you sure you want to assign this role to the user?',
						'data-method' => 'POST',
						'data-params' => [
							'role' => $data->name,
							'iduser' => Yii::$app->request->get('iduser'),
						],
					]); 	 
				}
			],
        ],
    ]); ?>

</div>
