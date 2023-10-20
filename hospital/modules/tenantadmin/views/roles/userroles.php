<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Roles';
$this->params['breadcrumbs'][] = ['label' => 'HSP Admin', 'url' => ['employee/index']];
$this->params['breadcrumbs'][] = ['label' => 'Users Roles', 'url' => ['employee/usersroles']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sessiondtl-index">
	
    <h4><?= Html::encode('Roles assigned to : '. $user->username) ?></h4>
		<p>
			<?= Html::a('Assign Role', ['assignroles', 'iduser' => $user->id], ['class' => 'btn btn-success']) ?>
		</p>
		<?= GridView::widget([
        'dataProvider' => $dataProvider,
		'summary' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
			[
				'label'=>'Role Name',
				'format'=>'raw',
				'value' => function($data){
					return $data->role->description; 
				}
			],
					
            [
				'label'=>'Name',
				'format'=>'raw',
				'value' => function($data){					
					return Html::a('Remove', ['userroles', 'iduser' => $data->user_id], [
						'data-confirm' => 'Are you sure you want to remove this role from the user?',
						'data-method' => 'POST',
						'data-params' => [
							'role' => $data->item_name,
							'userid' => $data->user_id,
						],
					]); 	 
				}
			],
        ],
    ]); ?>

</div>
