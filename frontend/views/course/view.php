<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Course */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'title',
            'course_code',
            [
                'attribute' => 'instructor_id',
                'label' => Yii::t('app', 'Instructor'),
                'value' => function ($model) {
                    return $model->getInstructor()->name;
                },
            ],
            [
                'attribute' => 'course_field_id',
                'label' => Yii::t('app', 'Field'),
                'value' => function ($model) {
                    return $model->getCourseField()->name;
                },
            ],
            [
                'attribute' => 'semester_id',
                'label' => Yii::t('app', 'Semester'),
                'value' => function ($model) {
                    return $model->getSemester()->name;
                },
            ],
            'status',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
