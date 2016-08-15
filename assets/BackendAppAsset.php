<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use Yii;

/**
 * @author Kevin.ye <yexiao2015@gmail.com>
 * @since 2.0
 */
class BackendAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/code';
    public $css = [
        //<!--Loading bootstrap css-->
        'vendors/jquery-ui-1.10.4.custom/css/ui-lightness/jquery-ui-1.10.4.custom.min.css',
        'vendors/font-awesome/css/font-awesome.min.css',
        //'vendors/bootstrap/css/bootstrap.min.css',
        //<!--LOADING STYLESHEET FOR PAGE-->
        'vendors/calendar/zabuto_calendar.min.css',
        //<!--Loading style vendors-->
        'vendors/animate.css/animate.css',
        'vendors/jquery-pace/pace.css',
        'vendors/iCheck/skins/all.css',
        'vendors/jquery-news-ticker/jquery.news-ticker.css',
        'vendors/jquery-notific8/jquery.notific8.min.css',
        //<!--Loading style-->
        'css/style-responsive.css',
        'css/themes/blue-dark.css',
        //'css/themes/blue-grey.css',
        //'css/themes/green-blue.css',
        //'css/themes/green-dark.css',
        //'css/themes/green-grey.css',
        //'css/themes/orange-blue.css',
        //'css/themes/orange-grey.css',
        //'css/themes/orange-violet.css',
        //'css/themes/pink-blue.css',
        //'css/themes/pink-brown.css',
        //'css/themes/pink-dark.css',
        //'css/themes/pink-green.css',
        //'css/themes/pink-grey.css',
        //'css/themes/pink-violet.css',
        //'css/themes/red-dark.css',
        //'css/themes/red-grey.css',
        //'css/themes/yellow-blue.css',
        //'css/themes/yellow-dark.css',
        //'css/themes/yellow-green.css',
        //'css/themes/yellow-grey.css',
    ];

    public $js = [
        //'js/jquery-1.10.2.min.js',
        'js/jquery-migrate-1.2.1.min.js',
        'js/jquery-ui.js',
        //<!--loading bootstrap js-->
        'vendors/bootstrap/js/bootstrap.min.js',
        'vendors/bootstrap-hover-dropdown/bootstrap-hover-dropdown.js',
        'js/html5shiv.js',
        'js/respond.min.js',
        'vendors/metisMenu/jquery.metisMenu.js',
        'vendors/slimScroll/jquery.slimscroll.js',
        'vendors/jquery-cookie/jquery.cookie.js',
        'vendors/iCheck/icheck.min.js',
        'vendors/iCheck/custom.min.js',
        'vendors/jquery-news-ticker/jquery.news-ticker.js',
        'vendors/jquery-notific8/jquery.notific8.min.js',
        'vendors/jquery-highcharts/highcharts.js',
        'js/jquery.menu.js',
        'vendors/jquery-pace/pace.min.js',
        'vendors/holder/holder.js',
        //<!--LOADING SCRIPTS FOR PAGE-->
        'vendors/flot-chart/jquery.flot.js',
        'vendors/flot-chart/jquery.flot.categories.js',
        'vendors/flot-chart/jquery.flot.pie.js',
        'vendors/flot-chart/jquery.flot.tooltip.js',
        'vendors/flot-chart/jquery.flot.resize.js',
        'vendors/flot-chart/jquery.flot.fillbetween.js',
        'vendors/flot-chart/jquery.flot.stack.js',
        'vendors/flot-chart/jquery.flot.spline.js',
        'vendors/calendar/zabuto_calendar.min.js',
        //'js/index.js',
        //<!--CORE JAVASCRIPT-->
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
