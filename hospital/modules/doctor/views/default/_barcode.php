<?php

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
?>
<h1>Hello</h1>

<?php
  $data = $prescript_id->all();
  foreach($data as $id):
?>
 <barcode code=<?= strtoupper($id['id']) ?> type='C128A'/>
<?php endforeach ?>

