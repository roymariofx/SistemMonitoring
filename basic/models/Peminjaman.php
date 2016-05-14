<?php

namespace app\models;
use app\models\Laporan;
use Yii;

/**
 * This is the model class for table "peminjaman".
 *
 * @property integer $idPeminjaman
 * @property string $Status
 * @property string $Tanggal
 * @property string $Tujuan
 * @property string $Keperluan
 * @property string $Timestamp
 * @property integer $Pengguna_Id
 */
class Peminjaman extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'peminjaman';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['Tanggal', 'Tujuan', 'Keperluan','Kdr_PlatNomor'], 'required'],
            [['Tanggal', 'Timestamp', 'Status', 'StatusLaporan'], 'safe'],
            [['Tujuan', 'Keperluan'], 'string', 'max' => 30],
            [['Kdr_PlatNomor'], 'string', 'max' => 9],
            [['NamaPengguna'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPeminjaman' => 'ID Peminjaman',
            'Tanggal' => 'Tanggal',
            'Tujuan' => 'Tujuan',
            'Keperluan' => 'Keperluan',
            'Timestamp' => 'Timestamp',
            'Status' => 'Status Pengajuan',
            'NamaPengguna' => 'Nama Pengguna',
            'Kdr_PlatNomor' => 'Plat Nomor Kendaraan',
            'StatusLaporan' => 'Status Laporan'
        ];
    }

 
}
