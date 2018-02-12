<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Student;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Courses');
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
                'label' => Yii::t('app', 'Students'),
                'value' => function ($model) {
                    return count(Student::getRegisteredStudents($model->id)->all());
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
                        return Html::a(Html::tag('i', '', ['class' => 'fa fa-eye']), $url,
                            ['class' => 'btn btn-success btn-xs']);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
