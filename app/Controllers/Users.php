<?php

namespace App\Controllers;

use App\Libraries\AvatarManager;
use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $model = new UserModel();

        $users = $model
            ->where('role', 'staff')
            ->orderBy(
                "CASE WHEN username = 'angel' THEN 0 ELSE 1 END",
                '',
                false
            )
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('users/index', [
            'pageTitle'  => 'Team Members',
            'activePage' => 'users',
            'users'      => $users,
        ]);
    }

    public function new()
    {
        return view('users/form', [
            'pageTitle'  => 'Add User',
            'activePage' => 'users',
            'user'       => null,
        ]);
    }

    public function create()
    {
        if (! $this->validate($this->rulesWithAvatar())) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username'   => trim((string) $this->request->getPost('username')),
            'full_name'  => trim((string) $this->request->getPost('full_name')),
            'email'      => trim((string) $this->request->getPost('email')),
            'password'   => password_hash(
                (string) $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if ($this->hasAvatarUpload()) {
            $data['avatar'] = (new AvatarManager())->store(
                $this->request->getFile('avatar'),
                'avatars'
            );
        }

        (new UserModel())->insert($data);

        return redirect()->to('/users')
            ->with('success', 'User account created successfully.');
    }

    public function edit(int $id)
    {
        $user = (new UserModel())->find($id);

        if (! $user) {
            return redirect()->to('/users')
                ->with('error', 'User account not found.');
        }

        return view('users/form', [
            'pageTitle'  => 'Edit User',
            'activePage' => 'users',
            'user'       => $user,
        ]);
    }

    public function update(int $id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if (! $user) {
            return redirect()->to('/users')
                ->with('error', 'User account not found.');
        }

        if (! $this->validate($this->rulesWithAvatar($id))) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username'  => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
        ];

        $password = (string) $this->request->getPost('password');

        if ($password !== '') {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $avatars = new AvatarManager();

        if ($this->hasAvatarUpload()) {
            $data['avatar'] = $avatars->store(
                $this->request->getFile('avatar'),
                'avatars'
            );

            $avatars->delete($user['avatar'] ?? null, 'avatars');
        } elseif ($this->request->getPost('remove_avatar')) {
            $avatars->delete($user['avatar'] ?? null, 'avatars');
            $data['avatar'] = null;
        }

        $model->update($id, $data);

        if ($id === (int) $this->session->get('user_id')) {
            $fresh = $model->find($id);

            $this->session->set([
                'username'  => $fresh['username'],
                'full_name' => $fresh['full_name'],
                'email'     => $fresh['email'] ?? '',
                'avatar'    => $fresh['avatar'] ?? '',
            ]);
        }

        return redirect()->to('/users')
            ->with('success', 'User account updated successfully.');
    }

    public function delete(int $id)
    {
        if ($id === (int) $this->session->get('user_id')) {
            return redirect()->to('/users')
                ->with('error', 'You cannot delete the account you are currently using.');
        }

        $model = new UserModel();
        $user = $model->find($id);

        if ($user) {
            (new AvatarManager())->delete(
                $user['avatar'] ?? null,
                'avatars'
            );

            $model->delete($id);
        }

        return redirect()->to('/users')
            ->with('success', 'User account removed.');
    }

    private function rules(?int $id = null): array
    {
        $usernameRule = 'required|min_length[3]|max_length[80]';
        $emailRule = 'required|valid_email|max_length[150]';

        if ($id !== null) {
            $usernameRule .= '|is_unique[users.username,id,' . $id . ']';
            $emailRule .= '|is_unique[users.email,id,' . $id . ']';
        } else {
            $usernameRule .= '|is_unique[users.username]';
            $emailRule .= '|is_unique[users.email]';
        }

        return [
            'username'  => $usernameRule,
            'full_name' => 'required|min_length[2]|max_length[120]',
            'email'     => $emailRule,
            'password'  => $id === null
                ? 'required|min_length[8]|max_length[255]'
                : 'permit_empty|min_length[8]|max_length[255]',
        ];
    }

    private function rulesWithAvatar(?int $id = null): array
    {
        $rules = $this->rules($id);

        if ($this->hasAvatarUpload()) {
            $rules['avatar'] = 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png,image/webp]|ext_in[avatar,jpg,jpeg,png,webp]|max_size[avatar,2048]';
        }

        return $rules;
    }

    private function hasAvatarUpload(): bool
    {
        $file = $this->request->getFile('avatar');

        return $file !== null
            && $file->getError() !== UPLOAD_ERR_NO_FILE;
    }
}