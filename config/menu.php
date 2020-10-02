<?php

return [
    [
        'icon' => 'home',
        'label' => 'Dashboard',
        'routeName' => 'dashboard.index',
        'child' => []
    ],
    [
        'icon' => 'build',
        'label' => 'Settings',
        'routeName' => '#',
        'child' => [
            [
                'icon' => 'gavel',
                'label' => 'Roles',
                'routeName' => 'roles.index',
                'child' => []
            ],
            [
                'icon' => 'vpn_key',
                'label' => 'Permissions',
                'routeName' => 'permissions.index',
                'child' => []
            ]
        ]
    ]
];
