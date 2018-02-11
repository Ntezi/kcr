<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 2/11/18
 * Time: 9:19 PM
 */

namespace frontend\components;


use backend\models\Student;
use yii\filters\VerbFilter;
use yii\web\Controller;

class BaseController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function thisStudent()
    {
        return Student::thisStudent();
    }
}