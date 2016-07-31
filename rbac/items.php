<?php
return [
    'admin-access' => [
        'type' => 2,
        'description' => 'admins',
        'ruleName' => 'userGroup',
    ],
    'admin' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'admin-access',
            'student',
            'subject',
            'all',
        ],
    ],
    'student' => [
        'type' => 2,
        'description' => 'admins',
        'ruleName' => 'userGroup',
    ],
    'moderator' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'student',
            'subject',
            'all',
        ],
    ],
    'subject' => [
        'type' => 2,
        'description' => 'admins',
        'ruleName' => 'userGroup',
    ],
    'all' => [
        'type' => 2,
        'description' => 'All',
        'ruleName' => 'userGroup',
    ],
    'user' => [
        'type' => 1,
        'ruleName' => 'userGroup',
        'children' => [
            'all',
        ],
    ],
];
