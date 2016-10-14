<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
$config=dirname(__FILE__).'/../protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
if( YII_DEBUG ){
    $config = CMap::mergeArray(
        require( $config ),
        array(
            "components"=>array(
                "urlManager"=>array(
                    "urlFormat"=>"get",
                ),
            ),
            "params"=>array(            
                "domain" => "http://".$_SERVER["HTTP_HOST"],
                "assets" => array(
                    "domain" => "",
                    "publish" => true,
                ), 
            ),
        )
    );
}
Yii::createWebApplication($config)->run();
