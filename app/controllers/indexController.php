<?php

namespace app\Controllers;

use app\Models\User;

class indexController
{
    public function index()
    {
        $user = new User();

        $user->first_name = 'Oscar';


        debug($user->first_name);

//        debug(
//        $user->select('users')
//            ->where([
//                ['name', '=', 'Oscar']
//            ])
//            ->get());
        render('index/index');
    }

    public function store()
    {

    }

}
