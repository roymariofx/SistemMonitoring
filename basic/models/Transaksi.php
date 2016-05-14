<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi".
 *
 * @property integer $ID
 * @property string $Tanggal_Transaksi
 * @property integer $ID_Nasabah
 * @property string $Tipe_Transaksi
 * @property string $Rekening_Tujuan
 */
class Transaksi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaksi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Tanggal_Transaksi', 'ID_Nasabah', 'Tipe_Transaksi', 'Rekening_Tujuan'], 'required'],
            [['Tanggal_Transaksi'], 'safe'],
            [['ID_Nasabah'], 'integer'],
            [['Tipe_Transaksi', 'Rekening_Tujuan'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Tanggal_Transaksi' => 'Tanggal  Transaksi',
            'ID_Nasabah' => 'Id  Nasabah',
            'Tipe_Transaksi' => 'Tipe  Transaksi',
            'Rekening_Tujuan' => 'Rekening  Tujuan',
        ];
    }
}
