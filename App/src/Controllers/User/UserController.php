<?php

namespace App\Controllers;

use App\Core\BaseController;

class UserController extends BaseController
{
    public function user()
    {
        $this->render('user');
    }
}