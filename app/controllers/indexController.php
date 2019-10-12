<?php

namespace app\Controllers;

use app\Models\User;

class indexController extends User
{
    public function index()
    {
        render('index/index');
    }

    public function store()
    {

    }

}
