<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "staff".
 *
 * @property int $id
 * @property int $idhsp
 * @property int $user_id
 * @property int $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 
 * @property Reguser $idreguser0
 * @property User $user
 */
class Staff extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hsp_id', 'user_id'], 'required'],
            [['hsp_id', 'user_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hsp_id' => 'Idhsp',
            'user_id' => 'User ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    

    /**
     * Gets query for [[Idreguser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegUser()
    {
        return $this->hasOne(Reguser::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
