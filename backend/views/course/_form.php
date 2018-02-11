<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Title'])->label(false); ?>

    <div class="row">
        <div class="col-md-6 col-lg-6">
            <?php echo $form->field($model, 'instructor_id')->dropDownList($instructors, [
                'prompt' => Yii::t('app', 'Instructor'),
            ])->label(false); ?>        </div>
        <div class="col-md-6 col-lg-6">
            <?php echo $form->field($model, 'course_field_id')->dropDownList($course_fields, [
                'prompt' => Yii::t('app', 'Course Field'),
            ])->label(false); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-lg-6">
            <?php echo $form->field($model, 'semester_id')->dropDownList($semesters, [
                'prompt' => Yii::t('app', 'Semester'),
            ])->label(false); ?>
        </div>
        <div class="col-md-6 col-lg-6">
            <?= $form->field($model, 'course_code')->textInput()->label(false) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
