<?php
/**
 * Default permissions
 */
return [
    [
        'name' => 'view',
        'display_name' => 'View',
        'route_name' => '*.index'
    ],
    [
        'name' => 'create',
        'display_name' => 'Create',
        'route_name' => '*.create'
    ],
    [
        'name' => 'edit',
        'display_name' => 'Edit',
        'route_name' => '*.edit'
    ],
    [
        'name' => 'update',
        'display_name' => 'Update',
        'route_name' => '*.update'
    ],
    [
        'name' => 'delete',
        'display_name' => 'Delete',
        'route_name' => '*.destroy'
    ]
];
