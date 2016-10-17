<?php
/**
 * Created by PhpStorm.
 * User: ignatenkovnikita
 * Date: 18/10/16
 * Time: 00:50
 * Web Site: http://IgnatenkovNikita.ru
 */

namespace common\validators;
use yii\validators\Validator;


/**
 * Class FilterTelephone
 *
 * Delete all symbols expect numbers, replace 8 => 7. Check length.
 *
 * @author Petr Marochkin <petun911@gmail.com>
 */
class FilterTelephone extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        $model->$attribute = preg_replace('/[^0-9]/','', $model->$attribute);

        if (!preg_match('/^\d{11}$/', $model->$attribute)) {
            $this->addError($model, $attribute, 'Telephone is not valid');
        } else {
            $model->$attribute = substr_replace($model->$attribute, '7', 0, 1);
        }
    }
}