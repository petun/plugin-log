<?php

namespace backend\models\search;

use common\models\WorkerLog;
use yii\data\ActiveDataProvider;


/**
 * Class WorkerLogSearch
 *
 * @author Petr Marochkin <petun911@gmail.com>
 */
class WorkerLogSearch extends WorkerLog
{

    public $avatarId;

    public $curveId;

    public $datetime_range;

    public $datetime_min;

    public $datetime_max;

    /**
     *
     */
    public function init()
    {
        $this->datetime_min = date('Y-m-d H:i', time() - 3600);
        $this->datetime_max = date('Y-m-d H:i');
    }


    /**
     *
     */
    public function rules()
    {
        return [
            [ ['command', 'status', 'datetime_range', 'datetime_min', 'datetime_max'], 'safe'],
            [ ['avatarId', 'curveId'], 'number']
        ];
    }


    /**
     * @param $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        $query = WorkerLog::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'command' => $this->command,
            'status' => $this->status,
        ]);

        if (!empty($this->avatarId)) {
            $query->withAvatar($this->avatarId);
        }

        if (!empty($this->datetime_min) && !empty($this->datetime_max)) {
            $query->betweenDates($this->datetime_min, $this->datetime_max);
        }

        return $dataProvider;
    }
}