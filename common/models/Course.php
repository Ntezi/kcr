<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property int $instructor_id
 * @property int $course_field_id
 * @property int $semester_id
 * @property string $title
 * @property int $course_code
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property Classroom[] $classrooms
 * @property CourseField $courseField
 * @property Instructor $instructor
 * @property Semester $semester
 * @property Schedule[] $schedules
 * @property TimeSlot[] $timeSlots
 * @property StudentGrade[] $studentGrades
 * @property StudentHasCourses[] $studentHasCourses
 * @property Student[] $students
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['instructor_id', 'course_field_id', 'semester_id', 'title', 'created_by', 'updated_by'], 'required'],
            [['instructor_id', 'course_field_id', 'semester_id', 'course_code', 'status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 125],
            [['course_field_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseField::className(), 'targetAttribute' => ['course_field_id' => 'id']],
            [['instructor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Instructor::className(), 'targetAttribute' => ['instructor_id' => 'id']],
            [['semester_id'], 'exist', 'skipOnError' => true, 'targetClass' => Semester::className(), 'targetAttribute' => ['semester_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'instructor_id' => Yii::t('app', 'Instructor ID'),
            'course_field_id' => Yii::t('app', 'Course Field ID'),
            'semester_id' => Yii::t('app', 'Semester ID'),
            'title' => Yii::t('app', 'Title'),
            'course_code' => Yii::t('app', 'Course Code'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClassrooms()
    {
        return $this->hasMany(Classroom::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourseField()
    {
        return $this->hasOne(CourseField::className(), ['id' => 'course_field_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstructor()
    {
        return $this->hasOne(Instructor::className(), ['id' => 'instructor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSemester()
    {
        return $this->hasOne(Semester::className(), ['id' => 'semester_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimeSlots()
    {
        return $this->hasMany(TimeSlot::className(), ['id' => 'time_slot_id'])->viaTable('schedule', ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentGrades()
    {
        return $this->hasMany(StudentGrade::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentHasCourses()
    {
        return $this->hasMany(StudentHasCourses::className(), ['course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['id' => 'student_id'])->viaTable('student_has_courses', ['course_id' => 'id']);
    }
}
