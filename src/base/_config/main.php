<?php

use yii2lab\app\domain\helpers\Config;
use yii2lab\app\domain\helpers\Env;


//if($this->getParameter('test_all')){
//	$config=[];
//} else{
Env::init('vendor/yii2lab/yii2-test/src/base/_application');
$config = Env::get('config');
return Config::loadData($config);
