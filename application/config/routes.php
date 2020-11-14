<?php
return [
    // tasks
    '' => [
        'controller' => 'task',
        'action' => 'index'
    ],
    'tasks/add' => [
        'controller' => 'task',
        'action' => 'add'
    ],
    'tasks/edit/{id:\d+}' => [
        'controller' => 'task',
        'action' => 'edit'
    ],

    'account/login' => [
        'controller' => 'account',
        'action' => 'login'
    ],
    'account/register' => [
        'controller' => 'account',
        'action' => 'register'
    ],

    // users
    'users/index' => [
        'controller' => 'user',
        'action' => 'index'
    ],
    'users/sort' => [
        'controller' => 'user',
        'action' => 'sort'
    ],

    // dev
    'dev/index/{id:\d+}' => [
        'controller' => 'dev',
        'action' => 'index'
    ],
    'dev/add/{id:\w+}' => [
        'controller' => 'dev',
        'action' => 'add'
    ],
    'dev/add' => [
        'controller' => 'dev',
        'action' => 'add'
    ],
];
