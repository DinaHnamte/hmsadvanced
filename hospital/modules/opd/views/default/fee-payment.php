<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Department;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Patient Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opd-index">
  <h3>Fees Payment</h3>
  <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ref_dept')->dropDownList(ArrayHelper::map(Department::find()->
        where(['hsp_id' => $model->hsp_id])->all(), 'id', 'name'),['prompt'=>'Select']) ?>
    <?= $form->field($model, 'dr_id')->dropDownList(Yii::$app->params['gender'],['prompt'=>'Select']) ?>
    <?= $form->field($model, 'reg_fee')->textInput(['type' => 'number']) ?>
        
    <div class="container d-flex align-items-center justify-content-center">
        <?= Html::button('Done', ['class' => 'btn btn-success', 'id' => 'fee-button']) ?>
    </div>
  <?php ActiveForm::end(); ?>

</div>

<?php 
$this->registerJs('
   $("document").ready(function(){ 
      $("#fee-button").on("click", function(e){
        e.preventDefault();
        $form = $(this).closest("form");
        $formData = $form.serialize();
        $.ajax({
        url: $form.attr("action"),
        type: $form.attr("method"),
        data: $formData,
        success: function (data) {
          if(data == "okay"){
            $.pjax({container: "#opd-patient-pjax"})
            $("#modal").modal("hide");
          }
        }
      })
   })})
   '
);
?>
    