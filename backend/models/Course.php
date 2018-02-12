<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 2/10/18
 * Time: 7:39 PM
 */

namespace backend\models;

use Yii;
use common\models\Course as BaseCourse;
use yii\behaviors\BlameableBehavior;

class Course extends BaseCourse
{

    public function rules()
    {
        return [
            [['instructor_id', 'course_field_id', 'semester_id', 'title'], 'required'],
            [['instructor_id', 'course_field_id', 'semester_id', 'course_code', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 125],
            [['course_field_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseField::className(), 'targetAttribute' => ['course_field_id' => 'id']],
            [['instructor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Instructor::className(), 'targetAttribute' => ['instructor_id' => 'id']],
            [['semester_id'], 'exist', 'skipOnError' => true, 'targetClass' => Semester::className(), 'targetAttribute' => ['semester_id' => 'id']],
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

    public function attributeLabels()
    {
        return [
            'instructor_id' => Yii::t('app', 'Instructor'),
            'course_field_id' => Yii::t('app', 'Course Field'),
            'semester_id' => Yii::t('app', 'Semester'),
            'title' => Yii::t('app', 'Title'),
            'course_code' => Yii::t('app', 'Course Code'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    public function getInstructor()
    {
        return Instructor::findOne($this->instructor_id);
    }

    public function getCourseField()
    {
        return CourseField::findOne($this->course_field_id);
    }

    public function getSemester()
    {
        return Semester::findOne($this->semester_id);
    }

    public static function getAllRegisteredCourses()
    {
        $sql ='SELECT `course`.* 
                FROM `course`, `student`, `student_has_courses`  
                WHERE `course`.`id` = `student_has_courses`.`course_id` 
                AND `student`.`id` = `student_has_courses`.`student_id`
                AND `student`.`id` = ' . Student::thisStudent()->id;
        return self::findBySql($sql);
    }

    public static function getRegisteredCourses($semester_id)
    {
        $sql ='SELECT `course`.* 
                FROM `course`, `student`, `student_has_courses`  
                WHERE `course`.`id` = `student_has_courses`.`course_id` 
                AND `student`.`id` = `student_has_courses`.`student_id`
                AND `student`.`id` = ' . Student::thisStudent()->id . '
                AND `course`.`semester_id` = ' . $semester_id;
        return self::findBySql($sql);
    }
}