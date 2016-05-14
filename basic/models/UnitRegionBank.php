<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unit_region_bank".
 *
 * @property integer $ID
 * @property string $Region
 * @property string $Country
 */
class UnitRegionBank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit_region_bank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Region', 'Country'], 'required'],
            [['Region', 'Country'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Region' => 'Region',
            'Country' => 'Country',
        ];
    }
}
