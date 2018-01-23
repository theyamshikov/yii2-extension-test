<?php

use yii2lab\app\domain\helpers\Config;

$env = env('');

return Config::load($env['config']);
