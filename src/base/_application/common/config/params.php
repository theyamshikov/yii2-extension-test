<?php

return [
	'MaintenanceMode' => false,
	'pageSize' => 25,
	'fixture' => [
		'dir' => '@yii2lab/test/fixtures',
		'exclude' => [
			'migration',
		],
	],
	'MRP' => 2121,
	'EPAY_PERCENT' => 2,
	'EpayPath' =>  dirname(VENDOR_DIR).'/yii2woop/bank/domain/v1/helpers/epay_test/',
	'CnpPath' => dirname(VENDOR_DIR).'/yii2woop/bank/domain/v1/helpers/cnp_test/',
	'WooppayPath' => dirname(VENDOR_DIR).'/vendor/yii2woop/yii2-bank/src/domain/v1/helpers/wp_test/',

	'PRIVATE_KEY_FN' => 'test_prv.pem',
	'PUBLIC_KEY_FN' => 'test_pub.pem',
	'AcquiringTest' => YII_ENV_DEV,
	'AcquiringType' => 'wooppay',
	'AcquiringAccess' => 70,//epay,cnp,wooppay
	'CardLinkingAccess' => true,
	'CardLinkingType' => 'wooppay',
	'WithdrawalType' => 'wooppay',
	'SPP_ORDER_NOTIFICATION' => 'support@wooppay.com',
	'SECURITY_EMAIL' => 'security@wooppay.com',
	'FIRE_BASE_PROJECT_NAME' => 'AAAAjJr-tN4:APA91bHpP5UhYTnmAnkZ3G0dkEqJAY6hZmP4I1j-Z3tpyr4kWBChcG5QJu7CdHX7XxvBqR9swQoUPz-cwDpx5-ShrT-bBxQL9hbZLsVw8YcWmO_54UxtUx-4FpbdYPfcKj5cJB0K7eLFPSXUhW1TVhLWj39B8dJ0Fw',
	'article' => [
		'links' => [
			'about',
			'contact',
		],
	],
];