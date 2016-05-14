<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengguna".
 *
 * @property integer $idPengguna
 * @property string $username
 * @property string $password
 * @property string $Alamat
 * @property string $Email
 * @property string $TanggalLahir
 * @property string $NoTelp
 * @property integer $Role
 */
class Pengguna extends \yii\db\ActiveRecord
{

    public $repeatPassword;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengguna';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'repeatPassword',/*'Alamat', 'Email', 'TanggalLahir', 'NoTelp',*/ 'Role'], 'required'],
            [['Role'], 'integer'],
            [['username'], 'string', 'max' => 30],
            [['username'], 'unique', 'message' => 'Username telah digunakan'],
            [['password'], 'string', 'max' => 32],
            [['Alamat'], 'string', 'max' => 60],
            [['Email'], 'string', 'max' => 30],
            [['TanggalLahir', 'NoTelp'], 'string', 'max' => 15],
            [['repeatPassword'], 'compare', 'compareAttribute'=> 'password', 'message' => "Password tidak cocok!", ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
            'Alamat' => 'Alamat',
            'Email' => 'Email',
            'TanggalLahir' => 'Tanggal Lahir',
            'NoTelp' => 'No Telepon',
            'Role' => 'Role',
            'repeatPassword' => 'Konfirmasi Password',
        ];
    }

    public function beforeSave($insert){
        $return = parent::beforeSave($insert);
        $this->password = md5($this->password);

        return $return;
    }
}
