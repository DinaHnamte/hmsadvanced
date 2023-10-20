<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "hsp".
 *
 * @property int $id
 * @property int $regby_user_id
 * @property string $email
 * @property string $name
 * @property string $mobno
 * @property string $add1
 * @property string $dist
 * @property int $status
 * @property string $type
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Hsp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hsp';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['regby_id'], 'required'],
            [['regby_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['email'], 'string', 'max' => 250],
            [['email'], 'required'],
            [['name', 'add1', 'dist', 'mobno', 'type'], 'required'],
            [['name', 'add1', 'dist'], 'string', 'max' => 50],
            [['mobno', 'type'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'regby_id' => 'Registered by',
            'email' => 'Email',
            'name' => 'Name Of Hospital/Clinic',
            'mobno' => 'Mobno',
            'add1' => 'Add1',
            'dist' => 'Dist',
            'status' => 'Status',
            'type' => 'Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getRegUser()
    {
        return $this->hasOne(Reguser::class, ['id' => 'regby_id']);
    }

}
