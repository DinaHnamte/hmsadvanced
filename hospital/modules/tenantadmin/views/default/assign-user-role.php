<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assign Roles';
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['get-employee-index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sessiondtl-index">
	
    <h4><?= Html::encode('Roles assigned to : '. $regUser->name) ?></h4>
		
		<?= GridView::widget([
        'dataProvider' => $dataProvider,
		'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'role.name',
			[
				'label'=>'Role Name',
				'format'=>'raw',
				'attribute' => 'role_d',
				'value' => function($data){
					if($data->role!=null){
						return $data->role->name;
					}
					return ''; 
				}
			],
					
            [
				'label'=>'Name',
				'format'=>'raw',
				'value' => function($data){					
					return Html::a('Remove', ['del-user-role', 'user_id' => $data->user_id], [
						'data-confirm' => 'Are you sure you want to remove this role from the user?',
						'data-method' => 'POST',
						'data-params' => [
							'id' => $data->id,
							'user_id' => $data->user_id,
						],
					]); 	 
				}
			],
        ],
    ]); ?>

</div>
