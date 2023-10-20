<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Find User';
$this->params['breadcrumbs'][] = ['label' => 'App Admin', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Find User for course admin</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'finduser-form']); ?>
				<div style="color:#999;margin:1em 0">
                    Find User By Email :
                    <br>                    
                </div>
				<?= Html::hiddenInput('qry', Yii::$app->request->get('qry')) ?>
                <?= Html::textInput('email',null,['autofocus' => true]) ?>
                
                <div class="form-group">
                    <?= Html::submitButton('Find', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
	 
</div>
