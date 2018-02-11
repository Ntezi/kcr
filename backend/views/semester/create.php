<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Semester */

$this->title = Yii::t('app', 'Create Semester');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Semesters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="semester-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
