<?php

/* @var $this yii\web\View */

use backend\models\Course;

$this->title = Yii::$app->name;
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?php echo Yii::t('app', 'Dashboard') ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <?php if(!empty($semesters)): ?>
        <?php foreach($semesters as $semester): ?>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-book fa-2x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div><?php echo count(Course::getRegisteredCourses($semester->id)->all()) ?></div>
                                <div class="huge"><?php echo $semester->name ?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo Yii::$app->request->baseUrl . '/course?semester_id=' . $semester->id; ?>">
                        <div class="panel-footer">
                            <span class="pull-left"><?php echo Yii::t('app', 'View Details') ?></span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

        <?php endforeach; ?>
    <?php endif; ?>
</div>
<!-- /.row -->

