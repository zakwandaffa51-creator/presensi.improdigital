<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;

class Auth extends BaseController
{
    public function __construct() {
        $this->ModelAuth = new ModelAuth();
    }
    public function index()
    {
        return view('v_login');
    }

     public function cekLoginKaryawan()
    {
        if ($this->validate([
            'username'=> [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required'=> '{field} Tidak Boleh Kosong'
                ]
                ],
                'password'=> [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required'=> '{field} Tidak Boleh Kosong'
                ]
                ],
        ])) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $cek = $this->ModelAuth->loginKaryawan($username,$password);
            if ($cek) {
                session()->set('id_karyawan',$cek['id_karyawan']);
                session()->set('level',2);
                return redirect()->to('Home');
            }else {
                session()->setFlashdata('pesan','username atau password salah' );
                return redirect()->to('Auth');
            }
        }else {
           
            return redirect()->to('Auth')->withInput();
        }
    }
    
    public function loginAdmin()
    {
        return view('backend/v_login');
    }

      public function cekLoginUser()
    {
        if ($this->validate([
            'username'=> [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required'=> '{field} Tidak Boleh Kosong'
                ]
                ],
                'password'=> [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required'=> '{field} Tidak Boleh Kosong'
                ]
                ],
        ])) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $cek = $this->ModelAuth->loginUser($username,$password);
            if ($cek) {
                session()->set('id_user',$cek['id_user']);
                session()->set('level',1);
                return redirect()->to('Admin');
            }else {
                session()->setFlashdata('pesan','username atau password salah' );
                return redirect()->to('loginAdmin');
            }
        }else {
            return redirect()->to('loginAdmin')->withInput();
        }
    }
    
    public function logOut()
    {
       session()->destroy();
       return redirect()->to('/');
    }
}

