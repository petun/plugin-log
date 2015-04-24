<?php

namespace common\models\base;

use Yii;

/**
 * This is the base-model class for table "data_list".
 *
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property integer $position
 */
class DataList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'data_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name'], 'required'],
            [['position'], 'integer'],
            [['type'], 'string', 'max' => 45],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'type' => Yii::t('backend', 'Type'),
            'name' => Yii::t('backend', 'Name'),
            'position' => Yii::t('backend', 'Position'),
        ];
    }
}
