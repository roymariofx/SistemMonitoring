<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kendaraan".
 *
 * @property string $PlatNomor
 * @property integer $NomorSTNK
 * @property string $Tipe
 * @property string $Merek
 * @property string $Status
 * @property string $UrlFoto
 * @property integer $Pinjam_ID
 */
class Kendaraan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'kendaraan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PlatNomor', 'NomorSTNK', 'Tipe', 'Merek', 'Status'], 'required'],
            [['NomorSTNK'], 'integer'],
            [['file'],'file'],
            [['NomorSTNK'], 'string','max' => 11],
            [['foto'], 'string', 'max' => 200],
            [['PlatNomor'], 'string', 'max' => 9],
            [['Tipe'], 'string', 'max' => 15],
            [['Merek'], 'string', 'max' => 15],
            [['Status'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PlatNomor' => 'Plat Nomor',
            'NomorSTNK' => 'Nomor STNK',
            'Tipe' => 'Tipe',
            'Merek' => 'Merek',
            'Status' => 'Status',
            'foto' => 'Foto',
        ];
    }


}       
