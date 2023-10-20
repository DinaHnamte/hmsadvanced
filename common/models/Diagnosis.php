<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "diagnosis".
 *
 * @property int $id
 * @property int $idopd
 * @property string $diag
 */
class Diagnosis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diagnosis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idopd'], 'integer'],
            [['diag'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idopd' => 'Idopd',
            'diag' => 'Diag',
        ];
    }
}
