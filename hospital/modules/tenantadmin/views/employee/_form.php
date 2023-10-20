<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idinstitution')->hiddenInput(['value' => $model->idinstitution])->label(false) ?>

    <?=	$form->field($model, 'salute')->dropDownList( Yii::$app->params['salute'],['prompt'=>'Select']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->input('email') ?>

    <?= $form->field($model, 'dob')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'sex')->dropDownList(Yii::$app->params['gender'],['prompt'=>'Select']) ?>

    <?= $form->field($model, 'mobno')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
