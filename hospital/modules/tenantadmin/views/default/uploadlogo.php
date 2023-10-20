<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\AdmitFee */

$this->title = 'Upload Logo';
$this->params['breadcrumbs'][] = ['label' => 'Institute Admin', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uploadppsize" align="center">
   <p>Maximum file size should not be more than 10kB</p>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

	<?= $form->field($model, 'imageFile')->fileInput() ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>

</div>
