<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 2/11/18
 * Time: 10:04 PM
 */

namespace backend\models;

use common\models\StudentHasCourses as BaseStudentHasCourses;
use yii\behaviors\BlameableBehavior;

class StudentHasCourses extends BaseStudentHasCourses
{
    
    public function rules()
    {
        return [
            [['student_id', 'course_id'], 'required'],
            [['student_id', 'course_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['student_id', 'course_id'], 'unique', 'targetAttribute' => ['student_id', 'course_id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

    public static function register($course_id, $student_id)
    {
        $register = new self();
        $register->course_id = $course_id;
        $register->student_id = $student_id;

        if ($register->save()) {
            return true;
        } else {
            return false;
        }
    }

    public static function drop($course_id, $student_id)
    {
        self::findOne(['course_id' => $course_id, 'student_id' => $student_id])->delete();
    }
}