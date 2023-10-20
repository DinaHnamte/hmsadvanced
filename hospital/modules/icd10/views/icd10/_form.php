<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Icd10 $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="icd10-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Level')->textInput() ?>

    <?= $form->field($model, 'Category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ChapterId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BlockId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Dagger')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Aster')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WithoutDot')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Mortality1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Mortality2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Mortality3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Mortality4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Mortality5')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
