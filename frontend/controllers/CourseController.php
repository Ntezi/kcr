<?php

namespace frontend\controllers;

use backend\models\Course;
use backend\models\Semester;
use frontend\components\BaseController;
use yii\data\ActiveDataProvider;

class CourseController extends BaseController
{
    public function actionIndex($semester_id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Course::find()->where(['semester_id' => $semester_id]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'semester' => Semester::findOne($semester_id),
        ]);
    }

}
