<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tabungan".
 *
 * @property integer $ID
 * @property string $Jenis_Tabungan
 */
class Tabungan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tabungan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Jenis_Tabungan'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Jenis_Tabungan' => 'Jenis  Tabungan',
        ];
    }
}
