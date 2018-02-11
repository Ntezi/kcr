<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Courses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Course'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
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

            //'course_code',
            //'status',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [

                    'view' => function ($url, $model) {
                        return Html::a(Html::tag('i', '', ['class' => 'fa fa-eye']), $url,
                            ['class' => 'btn btn-success btn-xs']);
                    },
                    'update' => function ($url, $model) {
                        return Html::a(Html::tag('i', '', ['class' => 'fa fa-edit']), $url,
                            ['class' => 'btn btn-primary btn-xs']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(Html::tag('i', '', ['class' => 'fa fa-trash']), $url, [
                            'class' => 'btn btn-danger btn-xs',
                            'data' => [
                                'confirm' => Yii::t('app', '\'Are you sure you want to delete this item?'),
                            ],
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
