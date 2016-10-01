<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/icons/icomoon/styles.css',
        'css/bootstrap.css',
        'css/core.css',
        'css/components.css',
        'css/colors.css',
        'css/extras/animate.min.css',
    ];
    public $js = [
        'js/plugins/loaders/pace.min.js',
        'js/core/libraries/bootstrap.min.js',
        'js/plugins/loaders/blockui.min.js',
        'js/plugins/pickers/pickadate/picker.js',
        'js/plugins/pickers/pickadate/picker.date.js',
        'js/core/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
