<?php
/**
 * Created by PhpStorm.
 * User: mariusngaboyamahina
 * Date: 2/10/18
 * Time: 6:57 PM
 */

?>

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo Yii::$app->request->baseUrl; ?>/"><?php echo Yii::$app->name ?></a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?php echo Yii::$app->user->identity->email ?>
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="<?php echo Yii::$app->request->baseUrl; ?>/site/logout" data-method="post">
                        <i class="fa fa-sign-out fa-fw"></i> <?php echo Yii::t('app', 'Logout') ?> </a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">

                <li class="<?php echo preg_match('/course/', $this->context->route, $matched) ? 'active' : '' ?>">
                    <a href="<?php echo Yii::$app->request->baseUrl; ?>/"><i class="fa fa-dashboard fa-fw"></i>
                        <?php echo Yii::t('app', 'Dashboard') ?></a>
                </li>

                <li class="<?php echo preg_match('/course/', $this->context->route, $matched) ? 'active' : '' ?>">
                    <a href="<?php echo Yii::$app->request->baseUrl; ?>/course/"><i class="fa fa-book fa-fw"></i>
                        <?php echo Yii::t('app', 'Courses') ?></a>
                </li>

                <li class="<?php echo preg_match('/course-field/', $this->context->route, $matched) ? 'active' : '' ?>">
                    <a href="<?php echo Yii::$app->request->baseUrl; ?>/course-field/"><i class="fa fa-list-ul fa-fw"></i>
                        <?php echo Yii::t('app', 'Course Fields') ?></a>
                </li>

                <li class="<?php echo preg_match('/schedule/', $this->context->route, $matched) ? 'active' : '' ?>">
                    <a href="<?php echo Yii::$app->request->baseUrl; ?>/schedule/"><i class="fa fa-calendar fa-fw"></i>
                        <?php echo Yii::t('app', 'Schedules') ?></a>
                </li>

                <li class="<?php echo preg_match('/time-slot/', $this->context->route, $matched) ? 'active' : '' ?>">
                    <a href="<?php echo Yii::$app->request->baseUrl; ?>/time-slot/"><i class="fa fa-clock-o fa-fw"></i>
                        <?php echo Yii::t('app', 'Time Slots') ?></a>
                </li>

                <li class="<?php echo preg_match('/semester/', $this->context->route, $matched) ? 'active' : '' ?>">
                    <a href="<?php echo Yii::$app->request->baseUrl; ?>/semester/"><i class="fa fa-forward fa-fw"></i>
                        <?php echo Yii::t('app', 'Semesters') ?></a>
                </li>

                <li class="<?php echo preg_match('/student/', $this->context->route, $matched) ? 'active' : '' ?>">
                    <a href="<?php echo Yii::$app->request->baseUrl; ?>/student/"><i class="fa fa-users fa-fw"></i>
                        <?php echo Yii::t('app', 'Students') ?></a>
                </li>

                <li class="<?php echo preg_match('/instructor/', $this->context->route, $matched) ? 'active' : '' ?>">
                    <a href="<?php echo Yii::$app->request->baseUrl; ?>/instructor/"><i class="fa fa-user-secret fa-fw"></i>
                        <?php echo Yii::t('app', 'Instructors') ?></a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
