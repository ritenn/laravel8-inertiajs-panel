<?php
/**
 * Default permissions
 */
return [
    [
        'name' => 'view',
        'display_name' => 'View (ultimate permission)',
        'route_name' => '*.index'
    ],
    [
        'name' => 'create',
        'display_name' => 'Create (ultimate permission)',
        'route_name' => '*.create'
    ],
    [
        'name' => 'store',
        'display_name' => 'Store (ultimate permission)',
        'route_name' => '*.store'
    ],
    [
        'name' => 'edit',
        'display_name' => 'Edit (ultimate permission)',
        'route_name' => '*.edit'
    ],
    [
        'name' => 'update',
        'display_name' => 'Update (ultimate permission)',
        'route_name' => '*.update'
    ],
    [
        'name' => 'delete',
        'display_name' => 'Delete (ultimate permission)',
        'route_name' => '*.destroy'
    ]
];
