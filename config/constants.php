<?php

$myConstants = [
    'noYes' => [
        0 => 'No',
        1 => 'Si',
    ],
    'yesNo' => [
        1 => 'Si',
        0 => 'No',
    ],
    'stylesVersion' => '1.011',
    'productImage' => 'public/img/products',
    'productImages' => 'public/img/products/',
    'sliderImages' => '/img/slider/',
    'usersImages' => '/img/users/',
    'systemUser' => [
        'id' => 1,
        'email' => 'dsaccesorios@outlook.com',
        'first_name' => 'Admin',
        'last_name' => 'DS Accesorios',
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
        ],
        'frontEnd' => [
            0 => 'Sin pagar',
            1 => 'Pagado',
            2 => 'Pendiente',
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
    'pagination' => 30,
    'documentTypes' => [
        "CC" => "Cédula de Ciudadanía",
        "CE" => "Cédula de Extranjería",
        "PA" => "Pasaporte",
    ],
    'whatsapp' => [
        'importMessage' => '[Mensajes varios subidos desde archivo Excel]',
        'importTitle' => 'Importación desde Excel',
        'defaultId' => '3092',
        'defaultToken' => 'g6c75v5265vo2blv',
    ],
    'emails' => [
        'testing' => 'atpjulio@gmail.com',
        'admin' => 'dsaccesorios@outlook.es'
    ],
    'companyInfo' => [
        'name' => 'DS Accesorios 365',
        'email' => 'dsaccesorios@outlook.es',
        'urlName' => 'dsaccesorios365',
        'longName' => 'DS Accesorios 365',
        'description' => 'Accesorios paras niñas los 365 días del año',
        'phoneNumber' => '+57 3224375399',
        'logo' => env('APP_URL').'img/logo.png',
        'longLogo' => 'http://dsaccesorios365.com/img/favicon.png',
        'instagram' => 'https:/www.instagram.com/ds_accesorios365/',
        'facebook' => 'https://www.facebook.com/DS-Accesorios365-2363862887174535/',
        'whatsapp' => 'https://api.whatsapp.com/send?phone=573224375399&text=Hola%20quisiera%20mas%20informacion%20de%20los%20accesorios',
        'nit' => '1102810296-1',
        'address' => 'Calle 25 #24 - 65 Casa 11'
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
    'payu' => [
        'sandbox' => 'https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu',
        'production' => 'https://checkout.payulatam.com/ppp-web-gateway-payu',
    ],
];

return $myConstants;