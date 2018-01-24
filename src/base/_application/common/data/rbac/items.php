<?php
return [
    'backend.*' => [
        'type' => 2,
        'description' => 'Доступ в админ панель',
    ],
    'rAdministrator' => [
        'type' => 1,
        'description' => 'Администратор системы',
        'children' => [
            'rUser',
            'rGuest',
            'backend.*',
            'geo.city.manage',
            'geo.country.manage',
            'geo.currency.manage',
            'service.category.manage',
            'service.service.manage',
            'geo.region.manage',
            'article.post.manage',
            'rbac.manage',
            'offline.manage',
            'logreader.manage',
            'gii.manage',
            'rest-client.*',
            'cleaner.manage',
            'notify.manage',
            'app.config',
            'guide.modify',
            'rManager',
            'rMerchant',
            'rSeniorCashier',
            'rClient',
            'rClientOperatorBeeline',
            'rProtectedPartner',
            'rCashier',
            'lang.manage',
            'oEncryptManage',
            'oVendorManage',
        ],
    ],
    'rUser' => [
        'type' => 1,
        'description' => 'Идентифицированный пользователь',
    ],
    'rGuest' => [
        'type' => 1,
        'description' => 'Гость системы',
    ],
    'geo.city.manage' => [
        'type' => 2,
        'description' => 'Управление городами',
    ],
    'geo.country.manage' => [
        'type' => 2,
        'description' => 'Управление странами',
    ],
    'geo.currency.manage' => [
        'type' => 2,
        'description' => 'Управление валютами',
    ],
    'service.category.manage' => [
        'type' => 2,
        'description' => 'Управление категориями услуг',
    ],
    'service.service.manage' => [
        'type' => 2,
        'description' => 'Управление сервисами',
    ],
    'rest-client.*' => [
        'type' => 2,
        'description' => 'Доступ к REST-клиенту',
    ],
    'geo.region.manage' => [
        'type' => 2,
        'description' => 'Управление областями',
    ],
    'article.post.manage' => [
        'type' => 2,
        'description' => 'Управление статьями сайта',
    ],
    'article.post.delete' => [
        'type' => 2,
        'description' => 'Удаление статьи',
    ],
    'offline.manage' => [
        'type' => 2,
        'description' => 'Управление статусом оффлайн',
    ],
    'rbac.manage' => [
        'type' => 2,
        'description' => 'Управление RBAC',
    ],
    'logreader.manage' => [
        'type' => 2,
        'description' => 'Управление логами',
    ],
    'gii.manage' => [
        'type' => 2,
        'description' => 'Доступ к Yii генератору',
    ],
    'lang.manage' => [
        'type' => 2,
        'description' => 'Управление языками',
    ],
    'cleaner.manage' => [
        'type' => 2,
        'description' => 'Управление чистильщиком',
    ],
    'notify.manage' => [
        'type' => 2,
        'description' => 'Управление уведомлениями',
    ],
    'app.config' => [
        'type' => 2,
        'description' => 'Вносить изменения в базовые конфигурации',
    ],
    'guide.modify' => [
        'type' => 2,
        'description' => 'Редактирование руководства',
        'ruleName' => 'isWritable',
    ],
    'rManager' => [
        'type' => 1,
        'description' => 'Специалист по продажам',
        'children' => [
            'oUserPointManage',
            'oPointManage',
            'oCashDeskManage',
            'oCashierManage',
            'oMerchantManage',
        ],
    ],
    'rMerchant' => [
        'type' => 1,
        'description' => 'Мерчант без биллинга',
    ],
    'rSeniorCashier' => [
        'type' => 1,
        'description' => 'Старший кассир',
        'children' => [
            'rCashier',
        ],
    ],
    'rClient' => [
        'type' => 1,
        'description' => 'Клиент',
        'children' => [
            'oGetClientHistory',
            'oGetReceipt',
        ],
    ],
    'rClientOperatorBeeline' => [
        'type' => 1,
        'description' => 'Клиент с номером телефона билайн',
        'children' => [
            'rClient',
            'oPayBeelineBalance',
        ],
    ],
    'rProtectedPartner' => [
        'type' => 1,
        'description' => 'Безопасный партнер',
    ],
    'oSetDeviceToken' => [
        'type' => 2,
    ],
    'oGetMyQr' => [
        'type' => 2,
        'description' => 'Пользователь, который может получить QR код по своему аккаунту привязанному к кассе',
    ],
    'oPayBeelineBalance' => [
        'type' => 2,
        'description' => 'Пользователь, который может платить с баланса билайн',
    ],
    'oGetClientHistory' => [
        'type' => 2,
        'description' => 'Пользователь, который может получить историю клиента',
    ],
    'oGetReceipt' => [
        'type' => 2,
        'description' => 'Пользователь, который может получить чек',
    ],
    'oGetCashierHistory' => [
        'type' => 2,
        'description' => 'Пользователь, который может получить историю кассира',
    ],
    'oGetPointList' => [
        'type' => 2,
        'description' => 'Пользователь, который может получить список ПТС, к нему привязанных',
    ],
    'rCashier' => [
        'type' => 1,
        'description' => 'Кассир',
        'children' => [
            'oActivateCashDesk',
            'oGetMyQr',
            'oGetCashierHistory',
            'oGetPointList',
            'oUserPointActivate',
            'oSetDeviceToken',
        ],
    ],
    'oAttachPoint' => [
        'type' => 2,
        'description' => 'Назначение кассы кассиру',
    ],
    'oActivateCashDesk' => [
        'type' => 2,
        'description' => 'Активация кассы',
    ],
    'rUnknownUser' => [
        'type' => 1,
        'description' => 'Не идентифицированный пользователь',
    ],
    'oUserPointManage' => [
        'type' => 2,
        'description' => 'Назначение кассиров на ПТС',
    ],
    'oPointManage' => [
        'type' => 2,
        'description' => 'Управление ПТС',
    ],
    'oCashDeskManage' => [
        'type' => 2,
        'description' => 'Управление кассами',
    ],
    'oCashierManage' => [
        'type' => 2,
        'description' => 'Управление кассирами',
    ],
    'oUserPointActivate' => [
        'type' => 2,
        'description' => 'Активация на кассе',
    ],
    'rPartner' => [
        'type' => 1,
        'description' => 'Партнер',
    ],
    'oMerchantManage' => [
        'type' => 2,
        'description' => 'Управление мерчантом',
        'ruleName' => 'isAuthorMerchant',
    ],
    'oEncryptManage' => [
        'type' => 2,
        'description' => 'Шифрование данных',
    ],
    'oVendorManage' => [
        'type' => 2,
        'description' => 'Управление композер-пакетами',
    ],
];
