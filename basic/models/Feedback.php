<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property integer $idFeedback
 * @property string $KritikSaran
 * @property string $NamaPengguna
 * @property integer $Pengguna_id
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KritikSaran',], 'required'],
            [['KritikSaran'], 'string', 'max' => 500],
            [['NamaPengguna'], 'string', 'max' => 32],
            [['Timestamp'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idFeedback' => 'Id Feedback',
            'KritikSaran' => 'Kritik dan Saran',
            'NamaPengguna' => 'Nama Pengguna',
            'Timestamp' => 'Timestamp',
        ];
    }
}
