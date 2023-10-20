<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Prescript;
use app\models\Diagnosis;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\Prescript $model */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'prescript';
$this->params['breadcrumbs'][] = $this->title;
?>

    <div id="prescript">
    <?= GridView::widget([
        'id' => 'prescript',
        'summary' => '',
        'dataProvider' => $prescriptDp,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => "Medicine",
                'format' => 'raw',
                'attribute' => 'myMedicines.name'
            ],
            [
                'label'=>'Dosage',
                'format'=>'raw',
                'attribute'=>'dose',				    
            ],
            ['class' => 'yii\grid\CheckboxColumn'],
        ],
    ]); ?>
    </div>
    
    <div class="container d-flex align-items-center justify-content-center" style = "position: fixed; bottom: 120px;">
    <?=Html::Button('Add Pres', ['id' => 'addpres', 'class' => 'btn btn-primary']);?>
    </div>


<?php 
$this->registerJs(
   '$("document").ready(function(){ 
		$("#addpres").on("click", function() {            
            var keys = $("#prescript").yiiGridView("getSelectedRows");
            $.post( "'.Url::to(['add-prescription']).'",
                {dosage_keys: keys,
                action: "save",
                idopd :"'. $idopd .'"},
                function( data ) {   
                
                $("#prescript" ).html(data);
                $.pjax({ container: "#prescripttable"});
                //history.go(0);
            });
		});
    });'
);
?>
