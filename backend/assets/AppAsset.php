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
        'https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900"'
    ];
    public $js = [
        'js/plugins/loaders/pace.min.js',
        'js/core/libraries/bootstrap.min.js',
        'js/plugins/loaders/blockui.min.js',

        'js/plugins/pickers/pickadate/picker.js',
        'js/plugins/pickers/pickadate/picker.date.js',

        'js/plugins/editors/wysihtml5/wysihtml5.min.js',
        'js/plugins/editors/wysihtml5/toolbar.js',
        'js/plugins/editors/wysihtml5/parsers.js',
        'js/plugins/editors/wysihtml5/locales/bootstrap-wysihtml5.ua-UA.js',

        'js/plugins/uploaders/fileinput.min.js',

        'js/plugins/media/cropper.min.js',

        'js/core/app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
