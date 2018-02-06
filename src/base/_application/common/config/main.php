<?php

use yii2lab\app\domain\helpers\Db;
use yii2module\lang\domain\enums\LanguageEnum;

$commonDir = '@yii2lab/test/base/_application/common';

return [
	'name' => 'Test',
	'language' => LanguageEnum::SOURCE, // current Language
	'sourceLanguage' => LanguageEnum::SOURCE, // Language development
	'bootstrap' => ['log', 'queue'],
	'timeZone' => 'UTC',
	'components' => [
        'user' => [
			'class' => 'yii2woop\account\domain\web\User',
		],
		'log' => [
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					//'levels' => ['error', 'warning'],
					'except' => [
						'yii\web\HttpException:*',
						YII_ENV_TEST ? 'yii2module\lang\domain\i18n\PhpMessageSource::loadMessages' : null,
					],
				],
			],
			'traceLevel' => YII_DEBUG ? 3 : 0,
		],
		'authManager' => [
			'class' => 'yii2lab\rbac\domain\rbac\PhpManager',
			'itemFile' => $commonDir . '/data/rbac/items.php',
			'ruleFile' => $commonDir . '/data/rbac/rules.php',
			'defaultRoles' => ['rGuest'],
		],
		'cache' => [
			'class' => 'yii\caching\ArrayCache',
		],
		'i18n' => [
			'class' => 'yii2module\lang\domain\i18n\I18N',
			'translations' => [
				'*' => [
					'class' => 'yii2module\lang\domain\i18n\PhpMessageSource',
					'basePath' => $commonDir . '/messages',
					'on missingTranslation' => ['yii2module\lang\domain\handlers\TranslationEventHandler', 'handleMissingTranslation'],
				],
			],
		],
		'db' => Db::getConfig([], YII_ENV_TEST ? 'test' : 'main'),
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
			'viewPath' => $commonDir . '/mail',
            'htmlLayout' => '@yii2lab/notify/domain/mail/layouts/html',
            'textLayout' => '@yii2lab/notify/domain/mail/layouts/text',
			'useFileTransport' => true,
			'fileTransportPath' => $commonDir . '/runtime/mail',
		],
		'queue' => [
			'class' => 'yii\queue\file\Queue',
			'path' => $commonDir . '/runtime/queue',
		],
	],
];
