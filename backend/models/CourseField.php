<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 2/10/18
 * Time: 8:08 PM
 */

namespace backend\models;

use common\models\CourseField as BaseCourseField;
use yii\behaviors\BlameableBehavior;

class CourseField extends BaseCourseField
{
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 125],
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
}