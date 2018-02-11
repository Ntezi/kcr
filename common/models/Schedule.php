<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property int $course_id
 * @property int $time_slot_id
 * @property string $day
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property TimeSlot $timeSlot
 * @property Course $course
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_id', 'time_slot_id', 'day', 'status', 'created_by', 'updated_by'], 'required'],
            [['course_id', 'time_slot_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['day'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['course_id', 'time_slot_id'], 'unique', 'targetAttribute' => ['course_id', 'time_slot_id']],
            [['time_slot_id'], 'exist', 'skipOnError' => true, 'targetClass' => TimeSlot::className(), 'targetAttribute' => ['time_slot_id' => 'id']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Course ID',
            'time_slot_id' => 'Time Slot ID',
            'day' => 'Day',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTimeSlot()
    {
        return $this->hasOne(TimeSlot::className(), ['id' => 'time_slot_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }
}
