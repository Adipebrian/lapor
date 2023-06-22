<?php

use CodeIgniter\I18n\Time;

function gettime()
{
    $time = Time::now('Asia/Jakarta', 'en_US');
    return $time;
}

function user_all()
{
    $db      = \Config\Database::connect();
    $builder = $db->table('users');
    $builder->select('*');
    $result = $builder->countAllResults();
    return $result;
}
function user_login()
{
    $db      = \Config\Database::connect();
    $time = CodeIgniter\I18n\Time::now('Asia/Jakarta', 'en_US');
    $day = $time->toDateString();
    $builder = $db->table('auth_logins');
    $builder->select('*');
    $builder->like('date', $day);
    $result = $builder->countAllResults();
    return $result;
}
function role($id)
{
    $db      = \Config\Database::connect();
    $builder = $db->table('auth_groups_users');
    $builder->select('*');
    $builder->join('auth_groups_permissions', 'auth_groups_permissions.group_id = auth_groups_users.group_id');
    $builder->join('auth_permissions', 'auth_permissions.id = auth_groups_permissions.permission_id');
    $builder->where('user_id', $id);
    $result = $builder->get()->getRow();
    return $result;
}
function get_info($id)
{
    $db      = \Config\Database::connect();
    $result = $db->table('users')->where('id', $id)->get()->getRow();
    return $result;
}
function get_jurusan($id)
{
    $db      = \Config\Database::connect();
    $result = $db->table('tbjurusan')->where('kode', $id)->get()->getRow();
    return $result;
}
function jml_laporan()
{
    $db      = \Config\Database::connect();
    $result = $db->table('tbreport')->select("count(noref) as jml")->get()->getRow()->jml;
    return $result;
}
function jurusan()
{
    $db      = \Config\Database::connect();
    $id =  user_id();
    $builder = $db->table('auth_groups_users');
    $builder->select('*');
    $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
    $builder->where('user_id', $id);
    $result = $builder->get()->getRow();
    $name = $result->name;
    switch ($name) {
        case $name ==  'agroindustri' || $name == 'w-agroindustri':
            return "J1";
            break;
        case $name ==  'manajemen-informatika' || $name == 'w-manajemen-informatika':
            return "J2";
            break;
        case $name ==  'keperawatan' || $name ==  'w-keperawatan':
            return "J3";
            break;
        case $name ==  'pemeliharaan-mesin' || $name ==  'w-pemeliharaan-mesin':
            return "J4";
            break;
        case $name ==  'a-keuangan' || $name ==  'w-a-keuangan':
            return "J5";
            break;
        case $name ==  'a-kemahasiswaan' || $name == 'w-a-kemahasiswaan':
            return "J6";
            break;
        case $name ==  'a-umum' || $name ==  'w-a-umum':
            return "J7";
            break;
        case $name ==  'upt-tik' || $name == 'w-upt-tik':
            return "J8";
            break;
        default:
            return null;
            break;
    }
}
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    if ($tanggal) {
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    } else {
        return "no data";
    }
}
function tgl_indo2($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    if ($tanggal) {
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . '-' . substr($bulan[(int)$pecahkan[1]], 0, 3) . '-' . $pecahkan[0];
    } else {
        return "no data";
    }
}
