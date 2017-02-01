<?php

namespace common\models;


/**
 * Class WorkerLog
 *
 * @property int $avatarId
 * @property int $curveId
 *
 * @author  Petr Marochkin <petun911@gmail.com>
 * @package common\models
 */
class WorkerLog extends \common\models\generated\WorkerLog
{

    public function getParamsArray()
    {
        return json_decode($this->params, true);
    }

    /**
     *
     */
    public function getAvatarId()
    {
        $params = $this->getParamsArray();
        return isset($params['params']['avatarId']) ? $params['params']['avatarId'] : null;
    }

    /**
     *
     */
    public function getCurveId()
    {
        //@todo more work here
        return 2;
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'avatarId' => \Yii::t('backend', 'Avatar'),
            'curveId' => \Yii::t('backend', 'Curve'),
        ]);
    }

}