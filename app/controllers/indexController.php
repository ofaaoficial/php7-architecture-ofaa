<?php

namespace app\Controllers;

use app\Models\User;

class indexController extends User
{
    public function index()
    {
        $user = new User();

        debug(
        $user->select('users')
            ->where([
                ['name', '=', 'Oscar']
            ])
            ->get());
        render('index/index');
    }

    public function store()
    {

    }

}
