<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use backend\models\StudentHasCourses;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', $semester->name . ' Courses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'rowOptions' => function ($model) {
            $registerd = StudentHasCourses::findOne(['course_id' => $model->id, 'student_id' => $this->context->thisStudent()->id]);
            if (!empty($registerd)) {
                return ['class' => 'danger'];
            }
        },
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
            'course_code',

            //'status',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {register} {delete}',
                'buttons' => [

                    'view' => function ($url, $model) {
                        return Html::a(Html::tag('i', '', ['class' => 'fa fa-eye']), $url,
                            ['class' => 'btn btn-success btn-xs']);
                    },
                    'register' => function ($url, $model) {
                        $registerd = StudentHasCourses::findOne(['course_id' => $model->id, 'student_id' => $this->context->thisStudent()->id]);

                        if (empty($registerd)) {
                            return Html::a(Html::tag('i', '', ['class' => 'fa fa-plus']),
                                Url::to(['register', 'id' => $model->id, 'semester_id' => Yii::$app->request->get('semester_id')]),
                                ['class' => 'btn btn-primary btn-xs']);
                        }
                    },
                    'delete' => function ($url, $model) {
                        $registerd = StudentHasCourses::findOne(['course_id' => $model->id, 'student_id' => $this->context->thisStudent()->id]);
                        if (!empty($registerd)) {
                            return Html::a(Html::tag('i', '', ['class' => 'fa fa-trash']),
                                Url::to(['delete', 'id' => $model->id, 'semester_id' => Yii::$app->request->get('semester_id')]), [
                                    'class' => 'btn btn-danger btn-xs',
                                    'data-method' => 'post',
                                    'data' => [
                                        'confirm' => Yii::t('app', '\'Are you sure you want to delete this item?'),
                                    ],
                                ]);
                        }
                    },
                ],
            ],
        ],
    ]); ?>
    <?php echo Html::a(Yii::t('app', 'Home'), ['/site/index'], ['class' => 'btn btn-primary']) ?>
    <?php $a = $semester->id - 1; echo (!empty($semesters) && $semester->id > 1) ? Html::a(Yii::t('app', 'Back'), ['index', 'semester_id' => $a], ['class' => 'btn btn-success']) : ''?>
    <?php $a = $semester->id + 1; echo (!empty($semesters) && count($semesters) >= $a) ? Html::a(Yii::t('app', 'Next'), ['index', 'semester_id' => $a], ['class' => 'btn btn-success']) : ''?>
</div>
