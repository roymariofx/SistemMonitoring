<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aktivitas".
 *
 * @property string $username
 * @property string $deskripsi
 * @property string $timestamp
 *
 * @property Pengguna $username0
 */
class Aktivitas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aktivitas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'deskripsi'], 'required'],
            [['timestamp'], 'safe'],
            [['username'], 'string', 'max' => 30],
            [['deskripsi'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'deskripsi' => 'Deskripsi',
            'timestamp' => 'Timestamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsername()
    {
        return $this->hasOne(Pengguna::className(), ['username' => 'username']);
    }
}
