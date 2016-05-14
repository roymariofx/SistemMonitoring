<?php

namespace app\models;
use Yii;
use Yii\web\IdentityInterface;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "pengguna".
 *
 * @property integer $idPengguna
 * @property string $Username
 * @property string $Password
 * @property string $Address
 * @property string $Email
 * @property string $TanggalLahir
 * @property string $NoTelp
 * @property integer $Role
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    //const ROLE_ADMIN = 0;
    //const ROLE_PENGGUNA = 1;
    public $authKey="loginSistemMonitoring";
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
        // ['role', 'default', 'value' => 1],
        // ['role', 'in', 'range' => [self::ROLE_USER, self::ROLE_ADMIN]],
        return [
            [['username', 'password'], 'required'],
            ['password','validatePassword']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'username',
            'password' => 'password',
            'Alamat' => 'Alamat',
            'Email' => 'Email',
            'TanggalLahir' => 'Tanggal Lahir',
            'NoTelp' => 'No Telp',
            'Role' => 'Role',
        ];
    }

    public static function findIdentity($id){
        return User::findOne(['username'=>$id]);
    }

    public function getId(){
        return $this->username;
    }

    public static function findByUsername($username)
    {
            
        if($hasil=User::findOne(['username' => $username])){
            return $hasil;
        }
        return null;
    }

    public function validatePassword($passwords,$username)
    {   
        $passwords = md5($passwords);
        $password=User::findOne(['username' => $username, 'password' => $passwords]);
        if(count($password)==0){
            return false;
        }
        else{
            return true;
        }
    }
    

    public function getAuthKey()
    {
        return $this->authKey;
    }
    
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
//    public static function isUserAdmin($username)
//     {
//       if (static::findOne(['username' => $username, 'role' => self::ROLE_ADMIN])){
 
//              return true;
//       } else {
 
//              return false;
//       }
 
// }
}
