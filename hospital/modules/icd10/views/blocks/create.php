<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Blocks $model */

$this->title = 'Create Blocks';
$this->params['breadcrumbs'][] = ['label' => 'Blocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blocks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
