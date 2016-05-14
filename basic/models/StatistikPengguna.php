<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "statistik_pengguna".
 *
 * @property string $username
 * @property integer $bulan
 * @property integer $tahun
 * @property string $totalPeminjaman
 */
class StatistikPengguna extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statistik_pengguna';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username'], 'required'],
            [['bulan', 'tahun', 'totalPeminjaman'], 'integer'],
            [['username'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
            'totalPeminjaman' => 'Total Peminjaman',
        ];
    }

    public function getTotalPeminjamanInteger() {
        return intval($this->totalPeminjaman);
    }
}
