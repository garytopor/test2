<?
namespace frontend\assets;

use yii\web\View;
use yii\web\AssetBundle;


class MainAsset extends  AssetBundle{

    public $basePath = '@webroot';
    public $baseUrl = '@web';


    public $css = [
        'source/css/all.css',
        'source/css/slick.css',

    ];

    public $js = [
        'source/js/jquery.placeholder.js',
        'source/js/jquery.bxslider.min.js',
        'source/js/jquery.fs.selecter.min.js',
        'source/js/slick.min.js',
        'source/js/jquery.matchHeight.js',
        'source/js/jquery.main.js',


    ];

    public $depends = [
        'yii\web\YiiAsset', // yii.js, jquery.js
        //'yii\bootstrap\BootstrapAsset', // bootstrap.css
        //'yii\bootstrap\BootstrapPluginAsset' // bootstrap.js
    ];

    public $jsOptions = [
      'position' =>  View::POS_HEAD,
    ];


}