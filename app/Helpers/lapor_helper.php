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