<?php

namespace common\behaviors;

use yii\helpers\ArrayHelper;


/**
 * Trait ListBehaviour
 *
 * @author Petr Marochkin <petun911@gmail.com>
 */
trait ListBehavior
{
    /**
     * @param string $key
     * @param string $name
     * @param array  $options
     *
     * @return array
     */
    public function asList($key = 'id', $name = 'name', $options = [])
    {
        return ArrayHelper::map($this->all() , $key, $name);
    }

}