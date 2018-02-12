<?php

namespace backend\controllers;

use backend\models\Course;
use backend\models\Student;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class ReportController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Course::getAllRegisteredCourses(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        $course = Course::findOne($id);
        $dataProvider = new ActiveDataProvider([
            'query' => Student::getRegisteredStudents($id),
        ]);

        return $this->render('view', [
            'dataProvider' => $dataProvider,
            'course' => $course,
        ]);
    }

    public function actionStudent()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Student::getAllRegisteredStudents(),
        ]);

        return $this->render('student', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewStudent($id)
    {
        $student = Student::findOne($id);
        $dataProvider = new ActiveDataProvider([
            'query' => Course::getAllRegisteredCoursesByStudent($id),
        ]);

        return $this->render('view_student', [
            'dataProvider' => $dataProvider,
            'student' => $student,
        ]);
    }
}
