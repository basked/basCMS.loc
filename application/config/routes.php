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
    'tasks/show/{id:\d+}' => [
        'controller' => 'task',
        'action' => 'show'
    ],
    'tasks/edit/{id:\d+}' => [
        'controller' => 'task',
        'action' => 'edit'
    ],
    'tasks/completed/{id:\d+}' => [
        'controller' => 'task',
        'action' => 'completed'
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

];
