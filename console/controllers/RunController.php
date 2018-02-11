<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 2/10/18
 * Time: 6:49 PM
 */

namespace console\controllers;


use common\models\User;
use yii\console\Controller;

class RunController extends Controller
{
    public function actionPwd(){
        User::updatePwd();
    }

    public function actionUser(){
        User::updateStudent();
    }
}