<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_social}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $oauth_client
 * @property string $oauth_client_user_id
 *
 * @property User $user
 */
class UserSocial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_social}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['oauth_client', 'oauth_client_user_id'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'user_id' => Yii::t('common', 'User ID'),
            'oauth_client' => Yii::t('common', 'Oauth Client'),
            'oauth_client_user_id' => Yii::t('common', 'Oauth Client User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\UserSocialQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UserSocialQuery(get_called_class());
    }
}
