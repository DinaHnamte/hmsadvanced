<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Chapters $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="chapters-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ChapterId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
