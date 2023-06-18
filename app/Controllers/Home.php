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
    public function cek()
    {
        $data = [
            'title' => "Cek Pengajuan",
            'result' => null,
            'noref' => null
        ];
        return view('home/cek',$data);
    }
    public function show()
    {
        $noref = $this->request->getVar('noref');
        $result = $this->db->table('tbreport r')
        ->where('r.noref',$noref)
        ->get()->getRow();
        if($result && $result->user_id == 0 || $result->user_id == user_id()){
            $result2 = $this->db->table('tbreport_d r')
            ->where('r.noref',$noref)
            ->orderBy('urut','ASC')
            ->get()->getResult();
            $data = [
                'title' => 'Data Laporan',
                'uri' => $this->uri,
                'noref' => $noref,
                'result' => $result,
                'result2' => $result2,
            ];
            return view('home/show',$data);
        }else if(!$result){
            session()->setFlashdata('failed','Tidak Ditemukan');
            return redirect()->to('home/cek');
        }else{
            session()->setFlashdata('failed','Access Denied');
            return redirect()->to('home/cek');
        }
    }
}
