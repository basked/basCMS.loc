<?php

namespace application\controllers;

use application\core\Controller;

class DevController extends Controller
{
    function migrateAction()
    {
        migrate();
        echo 'CLEAR DATA AND MIGRATE';
    }

    function clearAction()
    {
        clear();
        echo 'CLEAR DATA';
    }

}