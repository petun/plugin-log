<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\generated\WorkerLog]].
 *
 * @see \common\models\generated\WorkerLog
 */
class WorkerLogQuery extends \yii\db\ActiveQuery
{
    /**
     * @return array
     */
    public function allStatuses()
    {
        $column = $this->select('status')->distinct()->column();

        return array_combine($column, $column);
    }

    /**
     * @return array
     */
    public function allCommands()
    {
        $column = $this->select('command')->distinct()->column();
        return array_combine($column, $column);
    }

    public function withAvatar($avatarId)
    {
        return $this->andWhere("params::json#>>'{params,avatarId}' = '$avatarId'");
    }

    public function betweenDates($min, $max)
    {
        return $this->andWhere(['between', 'created_at', $min, $max]);
    }
}
