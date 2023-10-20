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
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'diagnose';
//$this->params['breadcrumbs'][] = $this->title;
?>
    
   <div>
	
   
        <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'id' => 'mydiagnosis',
        //'caption' => Html::a('New Application', ['applicant/selectinst','sid' => '$stumodel->id'], ['title' => '','class' => 'btn btn-default']),
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label'=>'Diagnosis/Impression',
                'attribute'=>'diag',
				    
            ],
            [
                'label'=>'Remove',
                'format'=>'raw',
                'value' => function($data)use($idopd){
                    return Html::a('<i class="fa fa-times" style="color:red"></i>', ['get-diagnosis', 'idopd'=>$idopd], 
                    [     
                        'class' => 'loadDiag',
                        'pdata' => [ 'iddiag' => $data->id, 'idopd'=>$data->idopd, 'action'=>"delete"]                        
                    ]);
              }
            ],
        ],
    ]); 
    ?>
    
</div>
<div class="container d-flex align-items-center justify-content-center" style = "position: fixed; bottom: 120px;">
    <?=Html::Button('Remove', ['id' => 'deldiag', 'class' => 'btn btn-primary']);?>
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
                //$("#diagnosistable" ).html(data);
                $.pjax.reload({ container: "#diagnosistable"});
                return false;
            });
        //};
    
		});
    
    
        return false;
    });
    '
);
?>
   
<?php 


// $this->registerJs(

//     '$("document").ready(function(){
//      $(document).on("diagnosisAdded", function() {
//      $.pjax.reload({ container: "#diagnosistable" });
//      });'

//  );
 

 