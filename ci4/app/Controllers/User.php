<?php
namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $title = 'Daftar User';
        $model = new UserModel();
        $users = $model->findAll();
        return view('user/index', compact('users', 'title'));
    }

    public function login()
    {
        helper(['form', 'url']);
        $session = session();
        $model = new UserModel();

        // Cek jika email belum terdaftar, tambahkan user default
        if (!$model->where('useremail', 'mfaiziqbal01@gmail.com')->first()) {
            $model->insert([
                'useremail' => 'mfaiziqbal01@gmail.com',
                'userpassword' => password_hash('password123', PASSWORD_DEFAULT),
                'username' => 'Iqbal'
            ]);
        }
        
        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            
            $user = $model->where('useremail', $email)->first();
            
            if ($user) {
                if (password_verify($password, $user['userpassword'])) {
                    $session->set([
                        'user_id' => $user['id'],
                        'user_name' => $user['username'],
                        'user_email' => $user['useremail'],
                        'logged_in' => true,
                    ]);
                    return redirect()->to('/admin/artikel');
                } else {
                    return redirect()->back()->with('error', 'Password salah.');
                }
            } else {
                return redirect()->back()->with('error', 'Email tidak terdaftar.');
            }
        }
        return view('user/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/user/login');
    }
}
