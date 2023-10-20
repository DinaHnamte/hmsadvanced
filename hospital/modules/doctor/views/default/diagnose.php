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
$this->params['breadcrumbs'][] = $this->title;
?>
    
    

    <div class="form-group">
        <?= Html::a('Add Diagnosis',
        ['default/add-diagnosis',
            'idopd' => Yii::$app->request->get('idopd')],
        [
            'value' => Url::to(['default/add-diagnosis','idopd' => Yii::$app->request->get('idopd')]), 
            'title' => 'Add Diagnosis/Impression', 
            'class' => 'showModalButton',
        ]) ?>
    </div>
    <?php Pjax::begin(['id' => 'diagnosistable']); ?>
    <?php
    
          echo   $this->renderAjax('get-diagnosis',[
                    'dataProvider' => $diagnoseDp, 'idopd' => $idopd
                ]);
                
    ?>
    <?php Pjax::end(); ?>
  
     
    <p>
    <?php Pjax::begin(['id' => 'prescripttable']); ?>
    <?php
    
          echo   $this->render('prescript-index',[
                    'dataProvider' => $prescriptDp, 'idopd' => $idopd
                ]);
                
    ?>
    <?php Pjax::end(); ?>
    </p>
    <div class="form-group">
        <?= Html::submitButton('Done', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>
    <div>
        <?= Html::a('barcode', Url::to(['barcode', 'idopd' => $idopd]))?>
    </div>
    <div>
        <?= Html::a('pdf', Url::to(['pdf', 'idopd' => $idopd]))?>
    </div>

    
<?php 
//  $this->registerJs(
//     '$("#modal").on("hide.bs.modal", function () {
//         //alert("i was clicked")
//         $.pjax({ container: "#diagnosistable"});
//       })'
//  )
 ?>

 