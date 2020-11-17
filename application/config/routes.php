<?php
return [
    // test
    'dev/{sort:\d+}/{limit:\w+}' => [
        'controller' => 'dev',
        'action' => 'sort'
    ],
    'task/tasks/{page:\d+}/{field:\w+}/{type:\w+}' => [
        'controller' => 'task',
        'action' =>  'tasksSort',
    ],

    // tasks
    '{sort:\w+}' => [
        'controller' => 'task',
        'action' => 'tasks'
    ],
    '' => [
        'controller' => 'task',
        'action' => 'goTasks'
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
    //dev
    'account/logout' => [
        'controller' => 'account',
        'action' => 'logout'
    ],
    'dev/migrate' => [
        'controller' => 'dev',
        'action' => 'migrate'
    ],
    'dev/clear' => [
        'controller' => 'dev',
        'action' => 'clear'
    ],

];
