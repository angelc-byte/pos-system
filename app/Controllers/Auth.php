<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if ($this->session->get('isLoggedIn')) {
            return redirect()->to('/');
        }

        return view('auth/login', [
            'pageTitle' => 'Sign in',
        ]);
    }

    public function attemptLogin()
    {
        $rules = [
            'username' => 'required|max_length[80]',
            'password' => 'required|max_length[255]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $username = trim((string) $this->request->getPost('username'));
        $user = (new UserModel())->where('username', $username)->first();

        if (! $user || empty($user['password']) || ! password_verify((string) $this->request->getPost('password'), $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'The username or password is incorrect.');
        }

        $this->session->regenerate(true);
        $this->session->set([
            'user_id'    => $user['id'],
            'username'   => $user['username'],
            'full_name'  => $user['full_name'],
            'email'      => $user['email'] ?? '',
            'avatar'     => $user['avatar'] ?? '',
            'isLoggedIn' => true,
        ]);

        return redirect()->to('/')->with('success', 'Welcome back, ' . $user['full_name'] . '.');
    }

    public function logout()
    {
        $this->session->destroy();

        return redirect()->to('/login')->with('success', 'You have been signed out safely.');
    }
}
