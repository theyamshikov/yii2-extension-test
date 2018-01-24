<?php

use yii2lab\app\domain\helpers\Db;
use yii2module\lang\domain\enums\LanguageEnum;

return [
	'name' => 'Test',
	'language' => LanguageEnum::SOURCE, // current Language
	'sourceLanguage' => LanguageEnum::SOURCE, // Language development
	'bootstrap' => ['log', 'language', 'queue'],
	'timeZone' => 'UTC',
	'components' => [
		'language' => 'yii2module\lang\domain\components\Language',
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
			'class' => 'yii2lab\rbac\rbac\PhpManager',
			'itemFile' => '@yii2lab/test/base/_application/common/data/rbac/items.php',
			'ruleFile' => '@yii2lab/test/base/_application/common/data/rbac/rules.php',
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
					'basePath' => '@common/messages',
					'on missingTranslation' => ['yii2module\lang\domain\handlers\TranslationEventHandler', 'handleMissingTranslation'],
				],
			],
		],
		'db' => Db::getConfig([
			'class' => 'yii\db\Connection',
			'charset' => 'utf8',
			'enableSchemaCache' => false,
		], YII_ENV_TEST ? 'test' : 'main'),
		'mailer' => [
			'class' => 'yii\swiftmailer\Mailer',
			'viewPath' => '@common/mail',
            'htmlLayout' => '@yii2lab/notify/domain/mail/layouts/html',
            'textLayout' => '@yii2lab/notify/domain/mail/layouts/text',
			'useFileTransport' => true,
			'fileTransportPath' => '@common/runtime/mail',
		],
		'queue' => [
			'class' => 'yii\queue\file\Queue',
			'path' => '@common/runtime/queue',
		],
	],
];
