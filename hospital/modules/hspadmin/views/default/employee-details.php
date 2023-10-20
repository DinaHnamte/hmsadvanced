
<?php


use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use yii\helpers\html;


?>



 

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [        
        'id',
        'pwd:boolean',
        'name',
        'fname',
        'dob',
        'sex',
        'tribe',
        'commu',
        'bg',
        'mobno',
        'add1',
        'dist',
        'created_at',
        'updated_at',
    ],
]) ?>


<div class="reguser-view">
    <?php $form = ActiveForm::begin(); ?>

   <?= $form->field($model, 'id')->hiddenInput(['value' => $model->id])->label(false) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    </div>    
    <?php ActiveForm::end(); ?>
</div>