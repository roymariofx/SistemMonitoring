<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "statistik_peminjaman".
 *
 * @property string $PlatNomor
 * @property integer $bulan
 * @property integer $tahun
 * @property string $totalPeminjaman
 */
class StatistikPeminjaman extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statistik_peminjaman';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PlatNomor'], 'required'],
            [['bulan', 'tahun', 'totalPeminjaman'], 'integer'],
            [['PlatNomor'], 'string', 'max' => 9]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PlatNomor' => 'Plat Nomor',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
            'totalPeminjaman' => 'Total Peminjaman',
        ];
    }


    public function getTotalPeminjamanInteger() {
        return intval($this->totalPeminjaman);
    }
}
