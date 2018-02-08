<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-login mx-auto mt-5">
    <div class="card-header"><?= Html::encode($this->title) ?></div>
    <div class="card-body">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username')
            ->textInput(['autofocus' => true, 'placeholder' => Yii::t('app', 'Enter email')]) ?>

        <?= $form->field($model, 'password')
            ->passwordInput(['placeholder' => Yii::t('app', 'Enter password')]) ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
