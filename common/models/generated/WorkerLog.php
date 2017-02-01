<?php

namespace common\models\generated;

use Yii;

/**
 * This is the model class for table "worker_log".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $command
 * @property string $params
 * @property string $response
 * @property string $status
 * @property double $generation_time
 * @property string $error_details
 */
class WorkerLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'worker_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['command', 'status'], 'required'],
            [['params', 'response', 'error_details'], 'string'],
            [['generation_time'], 'number'],
            [['command', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'command' => 'Команда',
            'params' => 'Параметры',
            'response' => 'Ответ',
            'status' => 'Статус',
            'generation_time' => 'Время выполнения',
            'error_details' => 'Error Details',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\WorkerLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\WorkerLogQuery(get_called_class());
    }
}
