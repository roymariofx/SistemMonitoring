<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabungan_nasabah".
 *
 * @property integer $ID
 * @property integer $ID_Nasabah
 * @property integer $ID_Tabungan
 * @property integer $ID_Unit_Region
 * @property integer $NOMINAL_TABUNGAN
 */
class TabunganNasabah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabungan_nasabah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_Nasabah', 'ID_Tabungan', 'ID_Unit_Region', 'NOMINAL_TABUNGAN'], 'required'],
            [['ID_Nasabah', 'ID_Tabungan', 'ID_Unit_Region', 'NOMINAL_TABUNGAN'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ID_Nasabah' => 'Id  Nasabah',
            'ID_Tabungan' => 'Id  Tabungan',
            'ID_Unit_Region' => 'Id  Unit  Region',
            'NOMINAL_TABUNGAN' => 'Nominal  Tabungan',
        ];
    }
}
