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

<div id="reguser-detail">
<?= app\widgets\SearchBox::widget([
            'targetId'=> 'reguser-detail',
        ]) ?> 
</div> 

<h4><?= Html::encode('Add User to Admin') ?></h4>
<div id="reguser-detail">
<?= app\components\widgets\regusers\RegUserView::widget([
            'model'=> $reguserModel,
        ]) ?> 
</div>

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::textInput('user_id',$reguserModel->id,['type'=> 'number']) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    </div>    
    <?php ActiveForm::end(); ?>
</div>
