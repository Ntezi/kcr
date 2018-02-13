<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property int $user_id
 * @property string $full_name
 * @property int $code
 * @property string $class
 * @property string $type
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $user
 * @property StudentGrade[] $studentGrades
 * @property StudentHasCourses[] $studentHasCourses
 * @property Course[] $courses
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'code', 'status', 'created_by', 'updated_by'], 'integer'],
            [['full_name', 'code', 'class', 'type', 'created_by', 'updated_by'], 'required'],
            [['class', 'type'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['full_name'], 'string', 'max' => 255],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'full_name' => Yii::t('app', 'Full Name'),
            'code' => Yii::t('app', 'Code'),
            'class' => Yii::t('app', 'Class'),
            'type' => Yii::t('app', 'Type'),
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentGrades()
    {
        return $this->hasMany(StudentGrade::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentHasCourses()
    {
        return $this->hasMany(StudentHasCourses::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['id' => 'course_id'])->viaTable('student_has_courses', ['student_id' => 'id']);
    }
}
