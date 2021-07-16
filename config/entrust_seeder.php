<?php

return [
    'role_structure' => [
        'Admin' => [
            'products' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'employees' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'permissions' => 'c,r,u,d',

        ],
        'Operations' => [
            'employees' => 'c,r,u,d',
        ],
        'HR' => [
            'employees' => 'c,r,u,d',
        ],
    ],
    'user_roles' => [
        'Admin' => [
            ['name' => "Admin", "email" => "admin@gmail.com", "password" => '123456789'],
        ],
        'Operations' => [
            ['name' => "Mahmoud", "email" => "mahmoud@gmail.com", "password" => '123456789'],
        ],
        'HR' => [
            ['name' => "Ahmed", "email" => "ahmed@gmail.com", "password" => '123456789'],
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
