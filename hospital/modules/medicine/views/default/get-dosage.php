<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Dosages $model */

$this->title = 'Create Dosages';
$this->params['breadcrumbs'][] = ['label' => 'Dosages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dosages-create">

    <div class="dosages-form">
    
            <?php if ($presentDosages != null): ?>
            <?= GridView::widget([
                'id' => 'dosage-grid',
                'summary' => '',
                'dataProvider' => $presentDosages,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'id',
                    'dose',
                ]
                ]);
            ?>
            <?php endif; ?>

</div>


