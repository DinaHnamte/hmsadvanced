<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "departments".
 *
 * @property int $id
 * @property string $hsp_id
 * @property string $name
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hsp_id', 'name'], 'required'],
            [['hsp_id'], 'string', 'max' => 13],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hsp_id' => 'Hsp ID',
            'name' => 'Name',
        ];
    }
}
