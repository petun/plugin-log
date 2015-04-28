<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "data_list".
 */
class DataList extends \common\models\base\DataList
{
	/**
	 * Возвращает все элементы списка определенного типа
	 * DataList::getList('typeList2')
	 * @param $typeName
	 *
	 * @return array
	 */
	public static function getList($typeName) {
		return ArrayHelper::map(self::find()->where(['type' => $typeName])->orderBy(['position' => SORT_ASC])->all(), 'id', 'name');
	}
}
