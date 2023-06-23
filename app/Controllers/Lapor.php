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
        $result = $this->db->table('tbreport')
            ->where('user_id', user_id())
            ->get()->getResult();
        $data = [
            'title' => 'Data Laporan',
            'uri' => $this->uri,
            'result' => $result,
        ];
        return view('lapor/data', $data);
    }
    public function data_admin()
    {
        $result = $this->db->table('tbreport')
            ->where('tujuan', jurusan())
            ->get()->getResult();
        $data = [
            'title' => 'Data Laporan',
            'uri' => $this->uri,
            'result' => $result,
        ];
        return view('lapor/data', $data);
    }
    public function show($noref)
    {
        $result = $this->db->table('tbreport r')
            ->where('r.noref', $noref)
            ->get()->getRow();
        if ($result->user_id == user_id()) {
            $result2 = $this->db->table('tbreport_d r')
                ->where('r.noref', $noref)
                ->orderBy('urut', 'ASC')
                ->get()->getResult();
            $data = [
                'title' => 'Data Laporan',
                'uri' => $this->uri,
                'result' => $result,
                'result2' => $result2,
            ];
            return view('lapor/show', $data);
        } else {
            session()->setFlashdata('failed', 'Access Denied');
            return redirect()->to('lapor/data');
        }
    }
    public function show_admin($noref)
    {
        $result = $this->db->table('tbreport r')
            ->where('r.noref', $noref)
            ->get()->getRow();
        $this->db->table('tbreport')->where('noref', $noref)->update(['sts' => 1]);
        $result2 = $this->db->table('tbreport_d r')
            ->where('r.noref', $noref)
            ->orderBy('urut', 'ASC')
            ->get()->getResult();
        $data = [
            'title' => 'Data Laporan',
            'uri' => $this->uri,
            'result' => $result,
            'result2' => $result2,
        ];
        return view('lapor/show', $data);
    }
    public function feedback()
    {
        $noref = $this->request->getVar('noref');
        $urut = $this->db->table('tbreport_d')->where('noref', $noref)->orderBy('urut', 'DESC')->get()->getRow();
        if ($urut) {
            $urut = $urut->urut + 1;
        } else {
            $urut = 1;
        }
        $data = [
            'noref' => $noref,
            'urut' => $urut,
            'isi' => $this->request->getVar('isi'),
            'user_id' => user_id(),
            'tgl' => $this->time,
            'inputby' => $this->time . ';' . user_id()
        ];
        $this->db->table('tbreport_d')->where('noref', $noref)->insert($data);
        session()->setFlashdata('success', 'Berhasil Disimpan');
        return redirect()->to('lapor/show_admin/' . $noref);
    }
    public function store()
    {
        $anonim = $this->request->getVar('anonim');
        if (logged_in() || $anonim == "on") {
            if ($anonim) {
                $user_id = 0;
                $anonim = 1;
            } else {
                $user_id = user()->id;
                $anonim = 0;
            }
            $cek = $this->db->table('tbreport')->orderBy('noref', 'DESC')->get()->getRow();
            $bulan = gettime()->getMonth();
            if (strlen($bulan) == 1) {
                $bulan = "0" . gettime()->getMonth();
            }
            if ($cek) {
                $no = substr($cek->noref, -4, 4) + 1;
                if (strlen($no) == 1) {
                    $no = "000" . $no;
                } elseif (strlen($no) == 2) {
                    $no = "00" . $no;
                } elseif (strlen($no) == 3) {
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
                'tujuan' => [
                    'rules' => "required",
                    'errors' => [
                        'required' => 'Tujuan harus diisi.',
                    ]
                ],
                'jenis' => [
                    'rules' => "required",
                    'errors' => [
                        'required' => 'Jenis harus diisi.',
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
            $tujuan = $this->request->getVar('tujuan');
            $jenis = $this->request->getVar('jenis');
            $tgl = strtotime($tgl);
            $tgl = date('Y-m-d', $tgl);
            $fileFoto = $this->request->getFile('foto');
            $namaFoto = $noref . "." . $fileFoto->getExtension();
            $fileFoto->move('assets/img/lapor', $namaFoto);
            $data = [
                'noref' => $noref,
                'judul' => $judul,
                'user_id' => $user_id,
                'lokasi' => $lokasi,
                'isi' => $isi,
                'tgl' => $tgl,
                'tujuan' => $tujuan,
                'jenis' => $jenis,
                'anonim' => $anonim,
                'foto' => $namaFoto,
                'inputby' => gettime(),
            ];
            $this->db->table('tbreport')->insert($data);
            session()->setFlashdata('success', 'Data Berhasil Disimpan! Nomor : ' . $noref);
            return redirect()->to('/');
        } elseif (!$anonim) {
            session()->setFlashdata('failed', 'Anda Harus Login Terlebih Dahulu!');
            return redirect()->to('/')->withInput();
        }
    }
    public function laporan()
    {
        $tujuan = $this->db->table('tbjurusan')->get()->getResult();
        $data = [
            'title' => 'Data laporan',
            'uri' => $this->uri,
            'tgl' => null,
            'tjn' => null,
            'tujuan' => $tujuan,
            'result' => null
        ];
        return view('lapor/laporan', $data);
    }
    public function laporan_action()
    {
        $tgl = $this->request->getVar('tgl');
        $tujuan = $this->db->table('tbjurusan')->get()->getResult();
        $tjn = $this->request->getVar('tujuan');
        $exp = explode(" s/d ", $tgl);
        $tgl1 = $exp[0];
        $tgl2 = $exp[1];

        $result = $this->db->table('tbreport')->where('tujuan', $tjn)->where('tgl >=', $tgl1)->where('tgl <=', $tgl2)->get()->getResult();
        $data = [
            'title' => 'Data Laporan',
            'uri' => $this->uri,
            'tgl' => $tgl,
            'tujuan' => $tujuan,
            'tjn' => $tjn,
            'result' => $result
        ];
        return view('lapor/laporan', $data);
    }
}
