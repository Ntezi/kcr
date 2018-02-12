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

    public static  function getRegisteredStudents($course_id)
    {
        $sql = 'SELECT `student`.* 
                FROM `course`, `student`, `student_has_courses`  
                WHERE `student`.`id` = `student_has_courses`.`student_id` 
                AND `course`.`id` = `student_has_courses`.`course_id`
                AND `course`.`id` = ' . $course_id;
        return self::findBySql($sql);
    }

    public static  function getAllRegisteredStudents()
    {
        $sql = 'SELECT DISTINCT `student`.* 
                FROM `course`, `student`, `student_has_courses`  
                WHERE `student`.`id` = `student_has_courses`.`student_id` 
                AND `course`.`id` = `student_has_courses`.`course_id`';
        return self::findBySql($sql);
    }
}
