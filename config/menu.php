<?php
return [
    [
        'name' => 'Quản lý sản phẩm',
        'icon' => 'fa-home',
        'items' => [
            [
            'name' => 'Danh sách sản phẩm',
            'icon' => 'far fa-circle nav-icon',
            'route' => 'category',
            ],
            [
            'name' => 'Thêm mới sản phẩm',
            'icon' => 'far fa-circle nav-icon',
            'route' => 'category/create',
            ],
        ]
    ],
    [
        'name' => 'Quản lý tài khoản Admin',
        'icon' => 'fa-home',
        'items' => [
            [
            'name' => 'Danh sách ',
            'icon' => 'fa-circle nav-icon',
            'route' => 'user',
            ],
            [
            'name' => 'Thêm mới tài khoản',
            'icon' => 'fa-circle nav-icon',
            'route' => 'user/create',
            ],
        ]
    ],
];
