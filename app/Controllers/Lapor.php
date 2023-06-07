<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;

class Lapor extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function data()
    {
        $result = $this->db->table('tbreport')->where('user_id',user_id())->get()->getResult();
        $data = [
            'title' => 'Data Laporan',
            'uri' => $this->uri,
            'result' => $result,
        ];
        return view('lapor/data',$data);
    }
    public function store()
    {
        if(logged_in()){

            $cek = $this->db->table('tbreport')->orderBy('noref', 'DESC')->get()->getRow();
            $bulan = gettime()->getMonth();
            if (strlen($bulan) == 1) {
                $bulan = "0" . gettime()->getMonth();
            }
            if ($cek) {
                $no = substr($cek->noref,-1,4) + 1;
                if(strlen($no) == 1){
                    $no = "000" . $no;
                }elseif(strlen($no) == 2){
                    $no = "00" . $no;
                }elseif(strlen($no) == 3){
                    $no = "0" . $no;
                }
                $noref = gettime()->getYear() . $bulan . $no;
            } else {
                $noref = gettime()->getYear() . $bulan . "0001";
            }
            if (!$this->validate([
                'judul' => [
                    'rules' => "required",
                    'errors' => [
                        'required' => 'judul harus diisi.',
                    ]
                ],
                'lokasi' => [
                    'rules' => "required",
                    'errors' => [
                        'required' => 'lokasi harus diisi.',
                    ]
                ],
                'isi' => [
                    'rules' => "required",
                    'errors' => [
                        'required' => 'Isi harus diisi.',
                    ]
                ],
                'tgl' => [
                    'rules' => "required",
                    'errors' => [
                        'required' => 'Tanggal harus diisi.',
                    ]
                ],
                'foto' => [
                    'rules' => 'max_size[foto,3072]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/JPG]',
                    'errors' => [
                        'max_size' => 'Ukuran gambar terlalu besar',
                        'is_image' => 'Yang anda pilih bukan gambar',
                        'mime_in' => 'Yang anda pilih bukan gambar'
                    ]
                ]
            ])) {
                return redirect()->to('/')->withInput();
            };
            $judul = $this->request->getVar('judul');
            $lokasi = $this->request->getVar('lokasi');
            $isi = $this->request->getVar('isi');
            $tgl = $this->request->getVar('tgl');
            $tgl = strtotime($tgl);
            $tgl = date('Y-m-d',$tgl);
            $fileFoto = $this->request->getFile('foto');
            $namaFoto = $noref . "." . $fileFoto->getExtension();
            $fileFoto->move('assets/img/lapor', $namaFoto);
            $data = [
                'noref' => $noref,
                'judul' => $judul,
                'user_id' => user()->id,
                'lokasi' => $lokasi,
                'isi' => $isi,
                'tgl' => $tgl,
                'foto' => $namaFoto,
                'inputby' => gettime().";".user()->username,
            ];
            $this->db->table('tbreport')->insert($data);
            session()->setFlashdata('success','Data Berhasil Disimpan!');
            return redirect()->to('lapor/data');
        }else{
            session()->setFlashdata('failed','Anda Harus Login Terlebih Dahulu!');
            return redirect()->to('/')->withInput();
        }
    }
}
