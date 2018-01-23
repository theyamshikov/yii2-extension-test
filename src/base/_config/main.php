<?php

use yii2lab\app\domain\helpers\Config;

$config = env('config');
return Config::load($config);
