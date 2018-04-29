<?php

function __autoload($class){

 require "libs/$class.php";

}

require 'config.php';


/**
* lang setting
*/
$admin = FALSE;
$lang = new Variable();
$lang->fa($admin);

/**
 * Optional name folders
 */
$app = new Bootstrap();
$app->setControllerPath('controller');
$app->setModelPath('model');
$app->setErrorFile('error');
$app->setDefaultFile('index');
$app->init();
