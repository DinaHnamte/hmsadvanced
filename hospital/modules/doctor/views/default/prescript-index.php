<?php

use app\models\Prescript;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Prescripts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prescript-index">

        <?= Html::a('Add Prescription',
        ['add-prescription',
            'idopd' => Yii::$app->request->get('idopd')],
        [
            'value' => Url::to(['add-prescription','idopd' => Yii::$app->request->get('idopd')]), 
            'title' => 'Add Prescription', 
            'class' => 'showModalButton',
        ],
        ) 
        ?>

    <?= GridView::widget([
        "id" => 'prescript-table',
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'medi',
            'dose',
            [
                'label'=>'Remove',
                'format'=>'raw',
                'value' => function($data)use($idopd){
                    return Html::a('<i class="fa fa-times" style="color:red"></i>', ['delete-prescript', 'idopd' => $idopd], 
                    [   'id' => 'remove',
                        'class' => 'loadDiag',
                        'pdata' => [ 'idprescript' => $data->id, 'idopd'=>$data->encounter_id, 'action'=>"delete"]                        
                    ]);
              }
            ],
        ],
    ]); ?>
</div>

<?php 
$this->registerJs(
   '$("document").ready(function(){ 
		$(".loadDiag").on("click", function(e) {            
            e.preventDefault();
            //$(e.target.id).attr("id");
            //var result = confirm("Want to delete?");
            //if (result) {  
        //alert($(e.target).attr("href"));        
            $.post( $(this).attr("href"),
                jQuery.parseJSON($(this).attr("pdata")),
                function( data ) {
                //alert(data);
                //$("#prescripttable" ).html(data);
                $.pjax.reload({ container: "#prescripttable"});
                //return false;
            });
        //};
    
		});
    
    
        return false;
    });
    '
);
?>
