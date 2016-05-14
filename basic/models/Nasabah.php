<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nasabah".
 *
 * @property integer $ID
 * @property integer $Unit_ID
 * @property string $NAMA_NASABAH
 * @property integer $Nilai_Kekayaan
 */
class Nasabah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'nasabah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Unit_ID', 'NAMA_NASABAH'], 'required'],
            [['Unit_ID', 'Nilai_Kekayaan'], 'integer'],
            [['NAMA_NASABAH'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Unit_ID' => 'Unit  ID',
            'NAMA_NASABAH' => 'Nama  Nasabah',
            'Nilai_Kekayaan' => 'Nilai  Kekayaan',
        ];
    }
}
