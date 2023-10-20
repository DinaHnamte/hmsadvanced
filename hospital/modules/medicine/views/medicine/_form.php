<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Medicines $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="medicines-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'form')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'composition')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'manufacturer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mrp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'packaging')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
