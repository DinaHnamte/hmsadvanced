<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Blocks $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="blocks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'BlockId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BlockIdEnd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ChapterId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
