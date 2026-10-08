<?php

namespace App\Controllers;

use App\Libraries\AvatarManager;
use App\Models\UserModel;

class Profile extends BaseController
{
    public function index()
    {
        $user = (new UserModel())->find((int) $this->session->get('user_id'));
        if (! $user) {
            $this->session->destroy();
            return redirect()->to('/login');
        }

        return view('profile/index', [
            'pageTitle'  => 'My Profile',
            'activePage' => 'profile',
            'user'       => $user,
        ]);
    }

    public function update()
    {
        $id = (int) $this->session->get('user_id');
        $model = new UserModel();
        $user = $model->find($id);
        if (! $user) {
            return redirect()->to('/login');
        }

        $rules = [
            'full_name' => 'required|min_length[2]|max_length[120]',
            'email'     => 'required|valid_email|max_length[150]|is_unique[users.email,id,' . $id . ']',
            'password'  => 'permit_empty|min_length[8]|max_length[255]',
        ];

        if ($this->hasAvatarUpload()) {
            $rules['avatar'] = 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png,image/webp]|ext_in[avatar,jpg,jpeg,png,webp]|max_size[avatar,2048]';
        }

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
        ];

        $password = (string) $this->request->getPost('password');
        if ($password !== '') {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $avatars = new AvatarManager();
        if ($this->hasAvatarUpload()) {
            $data['avatar'] = $avatars->store($this->request->getFile('avatar'), 'avatars');
            $avatars->delete($user['avatar'] ?? null, 'avatars');
        } elseif ($this->request->getPost('remove_avatar')) {
            $avatars->delete($user['avatar'] ?? null, 'avatars');
            $data['avatar'] = null;
        }

        $model->update($id, $data);
        $fresh = $model->find($id);
        $this->session->set([
            'full_name' => $fresh['full_name'],
            'email'     => $fresh['email'] ?? '',
            'avatar'    => $fresh['avatar'] ?? '',
        ]);

        return redirect()->to('/profile')->with('success', 'Your profile has been updated.');
    }

    private function hasAvatarUpload(): bool
    {
        $file = $this->request->getFile('avatar');

        return $file !== null && $file->getError() !== UPLOAD_ERR_NO_FILE;
    }
}
