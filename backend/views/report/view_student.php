<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', $student->full_name . ' - ' . 'Courses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
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

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [

                    'view' => function ($url, $model) {
                        return Html::a(Html::tag('i', '', ['class' => 'fa fa-eye']), ['course/view', 'id' => $model->id],
                            ['class' => 'btn btn-success btn-xs']);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
