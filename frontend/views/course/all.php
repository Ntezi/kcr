<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use backend\models\StudentHasCourses;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'All Registered Courses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'course_code',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
                'buttons' => [

                    'view' => function ($url, $model) {
                        return Html::a(Html::tag('i', '', ['class' => 'fa fa-eye']), $url,
                            ['class' => 'btn btn-success btn-xs']);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(Html::tag('i', '', ['class' => 'fa fa-trash']),
                            Url::to(['delete', 'id' => $model->id, 'semester_id' => Yii::$app->request->get('semester_id')]), [
                                'class' => 'btn btn-danger btn-xs',
                                'data-method' => 'post',
                                'data' => [
                                    'confirm' => Yii::t('app', '\'Are you sure you want to delete this item?'),
                                ],
                            ]);
                    },
                ],
            ],
        ],
    ]); ?>
    <?= Html::a(Yii::t('app', 'Home'), ['/site/index'], ['class' => 'btn btn-primary']) ?>
</div>
