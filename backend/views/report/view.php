<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', $course->title . ' - ' . 'Students');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'full_name',
            [
                'attribute' => 'user_id',
                'label' => Yii::t('app', 'Email Address'),
                'value' => function ($model) {
                    return $model->getEmail();
                },
            ],
            'code',
            'class',
            'type',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [

                    'view' => function ($url, $model) {
                        return Html::a(Html::tag('i', '', ['class' => 'fa fa-eye']), ['student/view', 'id' => $model->id],
                            ['class' => 'btn btn-success btn-xs']);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
