<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'SELECT roles';
$this->params['breadcrumbs'][] = ['label' => 'Institute Admin', 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => 'Users Roles', 'url' => ['employee/usersroles']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sessiondtl-index">
	
    <h1><?= Html::encode('Select roles for : '. $username .' : '. $s) ?></h1>
		
		<?=Html::beginForm(['selectroles', 'iduser' => Yii::$app->request->get('iduser')],'post');?>
		<?=Html::hiddenInput('iduser',Yii::$app->request->get('iduser')); ?>
		<?=Html::checkboxList('roles',null, ArrayHelper::map($chkitem,'name','description'),['separator' => '<br/>']);?>
	
	<div class="col-md-12 text-center">
		<?=Html::submitButton('Save', ['class' => 'btn btn-primary']);?>
	</div>
	<?= Html::endForm();?> 
</div>
