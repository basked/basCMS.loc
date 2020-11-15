<?php
return [
    // tasks
    '{sort:\w+}' => [
        'controller' => 'task',
        'action' => 'tasks'
    ],
    '' => [
        'controller' => 'task',
        'action' => 'tasks'
    ],
    'task/tasks/{page:\d+}' => [
        'controller' => 'task',
        'action' =>  'tasks',
    ],
    'tasks/create' => [
        'controller' => 'task',
        'action' => 'create'
    ],
    'tasks/add' => [
        'controller' => 'task',
        'action' => 'add'
    ],
    'tasks/edit/{id:\d+}' => [
        'controller' => 'task',
        'action' => 'edit'
    ],
    'tasks/delete/{id:\d+}' => [
        'controller' => 'task',
        'action' => 'delete'
    ],


    // account
    'account/login' => [
        'controller' => 'account',
        'action' => 'login'
    ],
    'account/logout' => [
        'controller' => 'account',
        'action' => 'logout'
    ],

    // dev
    'dev/index' => [
        'controller' => 'dev',
        'action' => 'index'
    ],
    'dev/index/{id:\d+}' => [
        'controller' => 'dev',
        'action' => 'index'
    ],
    'dev/add/{name:\w+}' => [
        'controller' => 'dev',
        'action' => 'add'
    ],
    'dev/add' => [
        'controller' => 'dev',
        'action' => 'add'
    ],
];
