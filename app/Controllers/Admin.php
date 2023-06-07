<?php

namespace App\Controllers;

use Config\Database;
use App\Controllers\BaseController;

class Admin extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    //--------------------------------------------------------------------
    // INDEX
    //--------------------------------------------------------------------

    /**
     * Menampilkan beberapa fungsi yang ada 
     * di dalam menu INDEX
     */
    public function index()
    {
        $this->builder = $this->db->table('auth_logins');
        $this->builder->select('*');
        $this->builder->limit(20);
        $this->builder->orderBy('date', 'DESC');
        $result = $this->builder->get()->getResult();
        $data = [
            'title' => 'PT. Andalan Prima Indonesia | Data Dashboard Admin ',
            'uri' => $this->uri,
            'result' => $result
        ];
        return view('admin/index', $data);
    }
    // End INDEX
    //--------------------------------------------------------------------
    // USER
    //--------------------------------------------------------------------

    /**
     * Menampilkan beberapa fungsi yang ada 
     * di dalam menu USER
     */
    public function user()
    {
        $this->builder = $this->db->table('users');
        $this->builder->select('*');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
        $this->builder->orderBy('id', 'DESC');
        $result = $this->builder->get()->getResult();

        $this->builder = $this->db->table('auth_groups');
        $this->builder->select('*');
        $group_all = $this->builder->get()->getResult();

        $data = [
            'title' => 'PT. Andalan Prima Indonesia | Data User ',
            'uri' => $this->uri,
            'result' => $result,
            'group_all' => $group_all,
        ];
        return view('admin/user', $data);
    }
    public function change_role_user()
    {
        $group = $this->mRequest->getVar('group');
        $user = $this->mRequest->getVar('user_id');

        $this->builder = $this->db->table('auth_groups_users');
        $this->builder->select('*');
        $this->builder->where('user_id', $user);
        $result = $this->builder->get()->getRow();

        $data = [
            'user_id' => $user,
            'group_id' => $group,
        ];
        if ($result) {
            $this->builder = $this->db->table('auth_groups_users');
            $this->builder->where('user_id', $user);
            $this->builder->update($data);
            addlog('auth_groups_users', 1, $this->request->getIPAddress(), 'user_id', $group, $result);
            session()->setFlashdata('success', 'Success!');
        } else {
            session()->setFlashdata('failed', 'Failed!');
        }
        return redirect()->to('admin/user');
    }
    public function add_role_user()
    {
        $group = $this->mRequest->getVar('group');
        $user = $this->mRequest->getVar('user_id');

        $this->builder = $this->db->table('auth_groups_users');
        $this->builder->select('*');
        $this->builder->where('user_id', $user);
        $result = $this->builder->get()->getRow();

        $data = [
            'user_id' => $user,
            'group_id' => $group,
        ];
        if ($result) {
            session()->setFlashdata('failed', 'Failed!');
        } else {
            $this->builder = $this->db->table('auth_groups_users');
            $this->builder->insert($data);
            session()->setFlashdata('success', 'Success!');
        }
        return redirect()->to('admin/user');
    }
    public function active_user($id)
    {
        $data = [
            'active' => 1,
            'updated_at' => $this->time
        ];
        $result = $this->db->table('users')->where('id', $id)->get()->getRow();
        $this->builder = $this->db->table('users');
        $this->builder->where('id', $id);
        $this->builder->update($data);
        addlog('users', 1, $this->request->getIPAddress(), 'id', $id, $result);
        session()->setFlashdata('success', 'Berhasil!');
        return redirect()->to('admin/user');
    }
    public function nonactive_user($id)
    {
        $data = [
            'active' => 0,
            'updated_at' => $this->time
        ];
        $result = $this->db->table('users')->where('id', $id)->get()->getRow();
        $this->builder = $this->db->table('users');
        $this->builder->where('id', $id);
        $this->builder->update($data);
        addlog('users', 1, $this->request->getIPAddress(), 'id', $id, $result);
        session()->setFlashdata('success', 'Berhasil!');
        return redirect()->to('admin/user');
    }
    public function delete_user()
    {
        $id = $this->mRequest->getVar('id');
        $this->builder = $this->db->table('users');
        $this->builder->where('id', $id);
        $this->builder->update(['deleted_at' => $this->time, 'active' => 0]);
        addlog('users', 0, $this->request->getIPAddress(), 'id', $id);
        session()->setFlashdata('success', 'Berhasil Dihapus!');
        return redirect()->to('admin/user');
    }
    public function edit_user()
    {
        $id = $this->mRequest->getVar('id');
        $username = $this->mRequest->getVar('username');
        $email = $this->mRequest->getVar('email');
        $rules = [
            'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]',
            'email'    => 'required|valid_email',
        ];
        $data = [
            'email' => $email,
            'username' => $username,
            'updated_at' => $this->time,
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('failed', 'Edit User Failed!');
            return redirect()->to('admin/user');
        }

        $result = $this->db->table('users')->where('id', $id)->get()->getRow();
        $this->builder = $this->db->table('users');
        $this->builder->where('id', $id);
        $this->builder->update($data);
        addlog('users', 1, $this->request->getIPAddress(), 'id', $id, $result);
        session()->setFlashdata('success', 'Edit User Success!');
        return redirect()->to('admin/user');
    }
    public function change_pass()
    {
        $id = $this->mRequest->getVar('id');
        $password = $this->mRequest->getVar('pass');
        $users = model(UserModel::class);
        $user = $users->where('id', $id)
            ->first();

        $user->password         = $password;
        $user->reset_at         = date('Y-m-d H:i:s');
        $users->save($user);
        session()->setFlashdata('success', 'Edit Password Success!');
        return redirect()->to('admin/user');
    }

    // End USER

    //--------------------------------------------------------------------
    // ROLE
    //--------------------------------------------------------------------

    /**
     * Menampilkan beberapa fungsi yang ada 
     * di dalam menu ROLE
     */

    public function role()
    {
        $this->builder = $this->db->table('auth_groups');
        $this->builder->select('*');
        $this->builder->orderBy('id', 'DESC');
        $group_all = $this->builder->get()->getResult();

        $this->builder = $this->db->table('auth_permissions');
        $this->builder->select('*');
        $this->builder->orderBy('id', 'DESC');
        $perm_all = $this->builder->get()->getResult();

        $data = [
            'title' => 'PT. Andalan Prima Indonesia | Data Role ',
            'uri' => $this->uri,
            'group_all' => $group_all,
            'perm_all' => $perm_all,
        ];
        return view('admin/role', $data);
    }
    public function change_role()
    {
        $id_g = $this->mRequest->getVar('id_g');
        $name_g = $this->mRequest->getVar('name_g');
        $desc_g = $this->mRequest->getVar('desc_g');
        $id_p = $this->mRequest->getVar('id_p');
        $name_p = $this->mRequest->getVar('name_p');
        $desc_p = $this->mRequest->getVar('desc_p');

        if ($id_g) {
            $this->builder = $this->db->table('auth_groups');
            $this->builder->select('*');
            $this->builder->where('id', $id_g);
            $result = $this->builder->get()->getRow();

            $data = [
                'name' => $name_g,
                'description' => $desc_g,
            ];
            if ($result) {
                $this->builder = $this->db->table('auth_groups');
                $this->builder->where('id', $id_g);
                $this->builder->update($data);
                addlog('auth_groups', 1, $this->request->getIPAddress(), 'id', $id_g, $result);
                session()->setFlashdata('success', 'Success!');
            } else {
                session()->setFlashdata('failed', 'Failed!');
            }
        } else {
            $this->builder = $this->db->table('auth_permissions');
            $this->builder->select('*');
            $this->builder->where('id', $id_p);
            $result = $this->builder->get()->getRow();

            $data = [
                'name' => $name_p,
                'description' => $desc_p,
            ];
            if ($result) {
                $this->builder = $this->db->table('auth_permissions');
                $this->builder->where('id', $id_p);
                $this->builder->update($data);
                addlog('auth_permissions', 1, $this->request->getIPAddress(), 'id', $id_p, $result);
                session()->setFlashdata('success', 'Success!');
            } else {
                session()->setFlashdata('failed', 'Failed!');
            }
        }
        return redirect()->to('admin/role');
    }
    public function add_role()
    {
        $name_g = $this->mRequest->getVar('name_g');
        $desc_g = $this->mRequest->getVar('desc_g');
        $name_p = $this->mRequest->getVar('name_p');
        $desc_p = $this->mRequest->getVar('desc_p');

        if ($name_g) {
            $this->builder = $this->db->table('auth_groups');
            $this->builder->select('*');
            $this->builder->where('name', $name_g);
            $result = $this->builder->get()->getRow();

            $data = [
                'name' => $name_g,
                'description' => $desc_g,
            ];
            if ($result) {
                session()->setFlashdata('failed', 'Failed!, Name Already Exists');
            } else {
                $this->builder = $this->db->table('auth_groups');
                $this->builder->insert($data);
                // addlog('auth_groups', 1, $this->request->getIPAddress(), $data);
                session()->setFlashdata('success', 'Success!');
            }
        } else {
            $this->builder = $this->db->table('auth_permissions');
            $this->builder->select('*');
            $this->builder->where('name', $name_p);
            $result = $this->builder->get()->getRow();

            $data = [
                'name' => $name_p,
                'description' => $desc_p,
            ];
            if ($result) {
                session()->setFlashdata('failed', 'Failed!, Name Already Exists');
            } else {
                $this->builder = $this->db->table('auth_permissions');
                $this->builder->insert($data);
                // addlog('auth_permissions', 1, $this->request->getIPAddress(), $data);
                session()->setFlashdata('success', 'Success!');
            }
        }
        return redirect()->to('admin/role');
    }
    public function delete_role()
    {
        $id_g = $this->mRequest->getVar('id_g');
        $id_p = $this->mRequest->getVar('id_p');

        if ($id_g) {
            addlog('auth_groups', 0, $this->request->getIPAddress(), 'id', $id_g);
            $this->builder = $this->db->table('auth_groups');
            $this->builder->where('id', $id_g);
            $this->builder->delete();
            session()->setFlashdata('success', 'Success!');
        } else {
            addlog('auth_permissions', 0, $this->request->getIPAddress(), 'id', $id_p);
            $this->builder = $this->db->table('auth_permissions');
            $this->builder->where('id', $id_p);
            $this->builder->delete();
            session()->setFlashdata('success', 'Success!');
        }
        return redirect()->to('admin/role');
    }

    // End ROLE

    //--------------------------------------------------------------------
    // GROUP AND PERM
    //--------------------------------------------------------------------

    /**
     * Menampilkan beberapa fungsi yang ada 
     * di dalam menu GROUP AND PERM
     */
    public function role_perm()
    {
        $this->builder = $this->db->table('auth_groups_permissions');
        $this->builder->select('auth_groups.name as gn,auth_permissions.name as pn,group_id,permission_id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_permissions.group_id');
        $this->builder->join('auth_permissions', 'auth_permissions.id = auth_groups_permissions.permission_id');
        $this->builder->orderBy('group_id', 'ASC');
        $group = $this->builder->get()->getResult();

        $this->builder = $this->db->table('auth_groups');
        $this->builder->select('*');
        $group_all = $this->builder->get()->getResult();

        $this->builder = $this->db->table('auth_permissions');
        $this->builder->select('*');
        $perm_all = $this->builder->get()->getResult();

        $data = [
            'title' => 'PT. Andalan Prima Indonesia | Data Role and Permission ',
            'uri' => $this->uri,
            'group' => $group,
            'group_all' => $group_all,
            'perm_all' => $perm_all,
        ];
        return view('admin/role_perm', $data);
    }
    public function change_role_perm()
    {
        $group = $this->mRequest->getVar('group');
        $perm = $this->mRequest->getVar('perm');

        $this->builder = $this->db->table('auth_groups_permissions');
        $this->builder->select('*');
        $this->builder->where('group_id', $group);
        $result = $this->builder->get()->getRow();

        $data = [
            'group_id' => $group,
            'permission_id' => $perm,
        ];
        if ($result) {
            $this->builder = $this->db->table('auth_groups_permissions');
            $this->builder->where('group_id', $group);
            $this->builder->update($data);
            addlog('auth_groups_permissions', 1, $this->request->getIPAddress(), 'group_id', $group, $result);
            session()->setFlashdata('success', 'Success!');
        } else {
            session()->setFlashdata('failed', 'Failed!');
        }
        return redirect()->to('admin/role_perm');
    }
    public function add_role_perm()
    {
        $group = $this->mRequest->getVar('group');
        $perm = $this->mRequest->getVar('perm');

        $this->builder = $this->db->table('auth_groups_permissions');
        $this->builder->select('*');
        $this->builder->where('group_id', $group);
        $result = $this->builder->get()->getRow();

        $data = [
            'group_id' => $group,
            'permission_id' => $perm,
        ];
        if ($result) {
            session()->setFlashdata('failed', 'Failed, Data already exists!');
        } else {
            $this->builder = $this->db->table('auth_groups_permissions');
            $this->builder->insert($data);
            session()->setFlashdata('success', 'Success!');
        }
        return redirect()->to('admin/role_perm');
    }
    //  End GROUP AND PERM

    //--------------------------------------------------------------------
    // APPROVE
    //--------------------------------------------------------------------

    /**
     * Menampilkan beberapa fungsi yang ada 
     * di dalam menu APPROVE
     */

    public function approve()
    {
        $result = $this->db->table('tblock')->where(['sts' => 3])->get()->getResult();
        $data = [
            'title' => 'PT. Andalan Prima Indonesia | Data Approval',
            'uri' => $this->uri,
            'result' => $result,
        ];
        return view('admin/approve', $data);
    }
    public function approve_action()
    {
        $data = [
            'sts' => 5,
            'tglakhir' => $this->time->addMinutes($this->request->getVar('tglakhir')),
            'editby' => $this->time->toDateString() . ";" . getusername()
        ];
        $this->db->table('tblock')->where('noref', $this->request->getVar('noref'))->update($data);
        session()->setFlashdata('success', 'Success');
        return redirect()->to('admin/approve');
    }
    //  End APPROVE

    //--------------------------------------------------------------------
    // LOG
    //--------------------------------------------------------------------

    /**
     * Menampilkan beberapa fungsi yang ada 
     * di dalam menu LOG
     */
    public function log()
    {
        $data = [
            'title' => 'PT. Andalan Prima Indonesia | Data Log',
            'uri' => $this->uri,
            'result' => null,
            'nomor' => null
        ];
        return view('admin/log', $data);
    }
    public function log_result()
    {
        $result = $this->db->table('tblog')->where('nomor', $this->request->getVar('nomor'))->get()->getResult();
        $data = [
            'title' => 'PT. Andalan Prima Indonesia | Data Log',
            'uri' => $this->uri,
            'result' => $result,
            'old' => null,
            'new' => null,
            'nomor' => $this->request->getVar('nomor')
        ];
        if ($result) {
            return view('admin/log', $data);
        }
        session()->setFlashdata('failed', 'Tidak ditemukan!');
        return redirect()->to('admin/log')->withInput();
    }
    public function log_cek()
    {
        $result = $this->db->table('tblog')->where('nomor', $this->request->getVar('nomor'))->get()->getResult();
        $cek = $this->db->table('tblog')->where('id', $this->request->getVar('id'))->get()->getRow();
        $ket = explode(' : ', $cek->ket);
        $old = '';
        $new = '';
        foreach ($ket as $x => $k) {
            if ($x == 1) {
                $old .= $k;
            } else if ($x == 3) {
                $new .= $k;
            }
        }
        $old = explode(',', $old);
        $new = explode(',', $new);

        $data = [
            'title' => 'PT. Andalan Prima Indonesia | Data Log',
            'uri' => $this->uri,
            'result' => $result,
            'old' => $old,
            'new' => $new,
            'cek' => $this->request->getVar('cek'),
            'nomor' => $this->request->getVar('nomor')
        ];
        return view('admin/log', $data);
    }

    //  End LOG



}