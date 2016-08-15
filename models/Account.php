<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created
 * @property integer $updated
 */
class Account extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'email'], 'required'],
            [['status', 'created', 'updated'], 'integer'],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '用户id',
            'username' => '用户名',
            'auth_key' => 'key',
            'password_hash' => '用户密码',
            'password_reset_token' => '重置密码token',
            'email' => '邮箱',
            'status' => '状态',
            'created' => '创建时间',
            'updated' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['password_reset_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password_hash === md5($password . 'zaq1xsw2');
    }

    /**
     * 创建时间
     * @param $model
     * @return null
     */
    public function createdFunc($model)
    {
        return isset($model->created) ? date('Y-m-d H:i:s', $model->created) : null;
    }

    /**
     * 更新时间
     * @param $model
     * @return null
     */
    public function updatedFunc($model)
    {
        return isset($model->updated) ? date('Y-m-d H:i:s', $model->updated) : null;
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->created = time();
            } else {
                $this->updated = time();
            }
            return true;
        }
        return false;
    }
}
