<?php

namespace frontend\controllers;

use Yii;
use backend\models\Course;
use backend\models\Semester;
use backend\models\StudentHasCourses;
use frontend\components\BaseController;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

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
            'semesters' => Semester::find()->all(),
        ]);
    }

    public function actionRegister($id, $semester_id)
    {
        StudentHasCourses::register($id, $this->thisStudent()->id);
        return $this->redirect(['index', 'semester_id' => $semester_id]);
    }

    public function actionDelete($id, $semester_id)
    {
        StudentHasCourses::drop($id, $this->thisStudent()->id);
        return $this->redirect(['index', 'semester_id' => $semester_id]);
    }

    public function actionAll()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Course::getAllRegisteredCoursesByThisStudent(),
        ]);

        return $this->render('all', [
            'dataProvider' => $dataProvider,
        ]);
        
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Course::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


}
