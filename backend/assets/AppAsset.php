<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@common/assets/sb-admin';
    public $css = [
//        'css/site.css',
        'vendor/bootstrap/css/bootstrap.min.css',
        'vendor/font-awesome/css/font-awesome.min.css',
        'vendor/datatables/dataTables.bootstrap4.css',
        'css/sb-admin.css',

    ];
    public $js = [
        'vendor/jquery/jquery.min.js',
        'vendor/bootstrap/js/bootstrap.bundle.min.js',
        'vendor/jquery-easing/jquery.easing.min.js',
        'vendor/chart.js/Chart.min.js',
        'vendor/datatables/jquery.dataTables.js',
        'vendor/datatables/dataTables.bootstrap4.js',
        'js/sb-admin.min.js',
//        'js/sb-admin-datatables.min.js',
//        'js/sb-admin-charts.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
