<?php

$myConstants = [
    'emails' => [
        'testing' => 'atpjulio@gmail.com',
        'admin' => 'arielcanario@hotmail.com'
    ],
    'noYes' => [
        0 => 'No',
        1 => 'Si',
    ],
    'yesNo' => [
        1 => 'Si',
        0 => 'No',
    ],
    'stylesVersion' => '1.001',
    // 'productImage' => 'public/img/products',
    'productImages' => 'public/img/products/',
    'sliderImages' => '/img/slider/',
    'usersImages' => '/img/users/',
    'systemUser' => [
        'id' => 1,
        'email' => 'arielcanario@hotmail.com',
        'first_name' => 'Ariel',
        'last_name' => 'Canario',
    ],
    'userRoles' => [
        'user' => 1,
        'admin' => 2,
    ],
    'userRolesString' => [
        1 => 'user',
        2 => 'admin',
    ],
    'userRolesFrontEnd' => [
        1 => 'Usuario',
        2 => 'Administrador',
    ],
    'notifications' => [
        'status' => [
            'unread' => 0,
            'read' => 1,
        ],
        'type' => [
            'success' => 1,
            'warning' => 2,
            'danger' => 3,
            'info' => 4,
        ],
    ],
    'transactions' => [
        'status' => [
          'unpaid' => 0,
          'paid' => 1,
          'pending' => 2,
          'demo' => 3,
        ],
        'frontEnd' => [
            0 => 'Sin pagar',
            1 => 'Pagada',
            2 => 'Pendiente',
            3 => 'Demo',
        ],
        'type' => [
            1 => 'Efectivo',
            2 => 'Cheque',
            3 => 'Tarjeta de Crédito',
            4 => 'Transferencia',
            5 => 'Otro',
        ],
        'cash' => 1,
        'check' => 2,
        'credit_card' => 3,
        'wire' => 4,
        'other' => 5,
    ],
    'status' => [
        'active' => 1,
        'inactive' => 9,
    ],
    'pagination' => 1000,
    'documentTypes' => [
        0 => "DNI",
        1 => "NIE",
        2 => "Pasaporte",
    ],
    'whatsapp' => [
        'importMessage' => '[Mensajes varios subidos desde archivo Excel]',
        'importTitle' => 'Importación desde Excel',
        'defaultId' => '3092',
        'defaultToken' => 'g6c75v5265vo2blv',
    ],
    'companyInfo' => [
        'name' => 'DS Accesorios 365',
        'email' => 'dsaccesorios365@gmail.com',
        'urlName' => 'dsaccesorios365',
        'longName' => 'DS Accesorios 365',
        'description' => 'Accesorios paras niñas los 365 días del año',
        'phoneNumber' => '+57 3224375399',
        'logo' => env('APP_URL').'img/logo.png',
        'longLogo' => env('APP_URL').'img/logo_largo.png',
        'instagram' => 'https:/www.instagram.com/ds_accesorios365/',
        'facebook' => 'https:/www.facebook.com/',
    ],
    'signature' => [
        'notification' => " \n\n**Mensaje generado automáticamente. GestionAutoMessage**",
        'whatsapp' => ' Enviado desde GestionAutoMessage',
    ],
    'unsubscribeLink' => env('APP_URL').'unsubscribe/',
    'importGmailContacts' => [
        'defaultEmail' => 'sin_correo0@ejemplo.com',
        'notes' => 'Cliente importado desde correo Gmail',
    ],
];

return $myConstants;