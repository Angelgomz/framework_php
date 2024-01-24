<?php

namespace App\Http\Controllers;

class HomeController
{
    public function index()
    {
        return view([['view'=>'home']]);
    }
    public function show(){
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $city = isset($_GET['city']) ? $_GET['city'] : null;
        return view([['data'=>['id'=>$id,'city'=>$city],'view'=>'home']]);
    }
}
