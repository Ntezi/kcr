<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Schedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4 col-lg-4">
            <?php echo $form->field($model, 'course_id')->dropDownList($courses, [
                'prompt' => Yii::t('app', 'Course'),
            ])->label(false); ?>        </div>
        <div class="col-md-4 col-lg-4">
            <?php echo $form->field($model, 'time_slot_id')->dropDownList($time_slots, [
                'prompt' => Yii::t('app', 'Time Slot'),
            ])->label(false); ?>
        </div>
        <div class="col-md-4 col-lg-4">
            <?= $form->field($model, 'day')
                ->dropDownList([ 'Monday' => 'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday', 'Friday' => 'Friday', 'Saturday' => 'Saturday', ], ['prompt' => 'Day'])
                ->label(false); ?>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
