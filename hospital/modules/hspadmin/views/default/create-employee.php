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
<div class="reguser-view">
    <?php $form = ActiveForm::begin(); ?>

    <?= Html::textInput('user_id',null,['type'=> 'number']) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    </div>    
    <?php ActiveForm::end(); ?>
</div>
