<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\Reguser $model */

$this->params['breadcrumbs'][] = ['label' => 'Regusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div id="reguser-detail">
<?= app\widgets\SearchBox::widget([
            'targetId'=> 'reguser-detail',
        ]) ?> 


<h4><?= Html::encode('AddEmployee') ?></h4>

<?= app\components\widgets\regusers\RegUserView::widget([
            'model'=> $reguserModel,
        ]) ?> 


    <?php $form = ActiveForm::begin(); ?>

    <?= Html::textInput('user_id',$reguserModel->id,['type'=> 'hidden']) ?>
    <div class="form-group container d-flex align-items-center justify-content-center">
        
        <?= Html::submitButton('Save', ['class' => 'btn btn-success postAjax', 
                          'pjaxTarget' => 'regusers']) ?>
       
    </div>
    </div>    
    <?php ActiveForm::end(); ?>
</div>

<?php
$this->registerJs('
   $("document").ready(function(){ 
      $(".postAjax").on("click", function(e){
        e.preventDefault();
        $target = $(this).attr("pjaxTarget");
        $form = $(this).closest("form");
        $formData = $form.serialize();
        $.ajax({
        url: $form.attr("action"),
        type: $form.attr("method"),
        data: $formData,
        success: function (data) {
          if(data == "ok"){
            $.pjax({container: "#"+$target})
            $("#modal").modal("hide");
          }
        }
      })
   })})
   '
 );
?> 
