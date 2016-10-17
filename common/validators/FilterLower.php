<?php
/**
 * Created by PhpStorm.
 * User: ignatenkovnikita
 * Date: 18/10/16
 * Time: 00:51
 * Web Site: http://IgnatenkovNikita.ru
 */

namespace common\validators;
use yii\validators\Validator;


/**
 * Class FilterLower
 *
 * @author Petr Marochkin <petun911@gmail.com>
 */
class FilterLower extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        $model->$attribute = mb_strtolower(trim($model->$attribute));
    }
}