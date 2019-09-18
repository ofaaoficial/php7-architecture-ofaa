<?php

class userController extends User{
    public function index(){
        var_dump(User::all());
    }
}