<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 2/8/18
 * Time: 9:24 PM
 */

namespace common\components;

use Yii;
use yii\base\Exception;
use yii\web\Request;
use yii\base\BootstrapInterface;

class LanguageSelector implements BootstrapInterface
{
    public $supportedLanguages = [];
    public function bootstrap($app)
    {
        try {
            if (get_class($app->request) !== 'yii\console\Request') {
                $preferredLanguage = $app->request->getPreferredLanguage($this->supportedLanguages);
                $app->language = $preferredLanguage;
                Yii::info("$$-------- SELECTED LANGUAGE = $app->language ----------$$");
            }
        } catch (Exception $e) {
            Yii::error($e);
        }
    }

}