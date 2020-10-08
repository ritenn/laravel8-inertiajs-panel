<?php

return [
    [
        'icon' => 'home',
        'label' => 'Dashboard',
        'routeName' => 'panel.dashboard.index',
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
                'routeName' => 'panel.roles.index',
                'child' => []
            ],
            [
                'icon' => 'vpn_key',
                'label' => 'Permissions',
                'routeName' => 'panel.permissions.index',
                'child' => []
            ]
        ]
    ]
];
