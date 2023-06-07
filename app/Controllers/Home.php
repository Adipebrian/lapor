<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation(), 
        ];
        return view('home/index',$data);
    }
}
