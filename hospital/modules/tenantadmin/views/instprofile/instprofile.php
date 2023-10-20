<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Institution */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Institutions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="institution-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['updateinst', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'regdt',
            'idcontact',
            'name',
            'abvname',
            'address',
            'pin',
            'mobile',
            'phone',
            'email:email',
            'www',
        ],
    ]) ?>

</div>
