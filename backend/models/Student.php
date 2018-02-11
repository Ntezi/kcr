<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 2/10/18
 * Time: 7:27 PM
 */

namespace backend\models;

use Yii;
use common\models\Student as BaseStudent;

class Student extends BaseStudent
{
    public static function thisStudent()
    {
        $this_student = self::findOne(['user_id' => Yii::$app->user->identity->id]);
        return (!empty($this_student)) ? $this_student : false;
    }
}