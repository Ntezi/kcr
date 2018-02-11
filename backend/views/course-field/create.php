<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CourseField */

$this->title = Yii::t('app', 'Create Course Field');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Course Fields'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-field-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
