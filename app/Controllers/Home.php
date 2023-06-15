<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;

class Home extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function index()
    {
        $tujuan = $this->db->table('tbjurusan')->get()->getResult();
        $data = [
            'validation' => \Config\Services::validation(), 
            'tujuan' => $tujuan
        ];
        return view('home/index',$data);
    }
}
