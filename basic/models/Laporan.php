<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "laporan".
 *
 * @property integer $id
 * @property integer $biayaTol
 * @property integer $biayaTilang
 * @property integer $BiayaParkir
 * @property integer $BiayaBensin
 * @property string $LokasiPomBensin
 * @property integer $KmIsiBensin
 * @property integer $KmSebeleumPergi
 * @property integer $KmSesudahPergi
 * @property string $Kdr_PlatNomor
 * @property integer $Pengguna_Id
 */
class Laporan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'laporan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BiayaTol', 'BiayaTilang', 'BiayaParkir', 'BiayaBensin', 'LokasiPOMBensin', 'KMisiBensin', 'KMSebelumPergi', 'KMSesudahPergi','TanggalPeminjaman', 'Kdr_PlatNomor', 'NamaPengguna'], 'required'],
            [['BiayaTol', 'BiayaTilang', 'BiayaParkir', 'BiayaBensin', 'KMisiBensin', 'KMSebelumPergi', 'KMSesudahPergi'], 'integer'],
            [['LokasiPOMBensin'], 'string', 'max' => 50],
            //[['KMSesudahPergi'], 'integer', 'min'=> 'KmSebelumPergi', 'tooSmall'=>'KM setelah pergi harus lebih besar dari KM sebelum pergi',],
            [['Kdr_PlatNomor'], 'string', 'max' => 9],
            [['NamaPengguna'], 'string', 'max' => 30],
            [['Timestamp','TanggalPeminjaman'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idLaporan' => 'Id Laporan',
            'BiayaTol' => 'Biaya Tol',
            'BiayaTilang' => 'Biaya Tilang',
            'BiayaParkir' => 'Biaya Parkir',
            'BiayaBensin' => 'Biaya Bensin',
            'LokasiPOMBensin' => 'Lokasi POM Bensin',
            'KMisiBensin' => 'KM Isi Bensin',
            'KMSebelumPergi' => 'KM Sebelum Pergi',
            'KMSesudahPergi' => 'KM Sesudah Pergi',
            'Kdr_PlatNomor' => 'Plat Nomor Kendaraan',
            'NamaPengguna' => 'Nama Pengguna',
            'Timestamp' => 'Timestamp',
            'TanggalPeminjaman' => 'Tanggal Peminjaman',
        ];
    }

    public function minimalkm($KMSesudahPergi,$KmSebeleumPergi)
    {
        if ($this->$KMSesudahPergi<=$KmSebeleumPergi){
            $this->addError($KMSesudahPergi, 'Saleprice has to be greater than km');
        }
    }
}
