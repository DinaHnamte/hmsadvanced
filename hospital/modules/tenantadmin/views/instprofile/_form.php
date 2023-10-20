<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Institution */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institution-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'regdt')->hiddenInput(['value' => $model->regdt])->label(false) ?>

    <?= $form->field($model, 'idcontact')->hiddenInput(['value' => $model->idcontact])->label(false) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abvname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
