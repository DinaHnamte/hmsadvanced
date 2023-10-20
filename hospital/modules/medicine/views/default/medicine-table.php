<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\VerbFilter;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Medicine';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medicine-index">
    <div>
        <?php Pjax::begin(['id' => 'medicine-list-table']) ?>
        <?php if ($dataProvider != null): ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'name',
                'composition',
                'manufacturer',
                'mrp',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{add-button}',
                    'buttons' => [
                        'add-button' => function($url, $model, $key){
                            return Html::button("Add",
                            [
                                'class' => 'btn btn-primary',
                                'data-med-id' => $model->id,
                                'onclick' => 'addToMyMedicine(this)',
                            ]);
                        }
                    ]
                ]
            ]
            ]);
        ?>
        <?php endif; ?>
        <?php Pjax::end(); ?>
    </div>
</div>

<?php 
$this->registerJs(
    '
    function addToMyMedicine(button) {
    var medId = $(button).data("med-id");
    console.log("filtered");
    $.post(
        "'.Url::to(['add-my-medicine']).'",
        { med_id: medId },
        function (data) {
            if(data === false){
                alert("Unexpected Error");
            }else{
                alert("Added Successfully");
                $.pjax.reload({container: "#medicine-list-table"})
            }
        }
    );
    }
    '
,$position = 2)
?>