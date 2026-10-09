<?php

namespace App\Controllers;

use App\Libraries\AvatarManager;
use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
        $model = new CustomerModel();

        return view('customers/index', [
            'pageTitle'  => 'Customer Accounts',
            'activePage' => 'customers',
            'customers'  => $model->orderBy('created_at', 'DESC')->findAll(),
        ]);
    }

    public function new()
    {
        return view('customers/form', [
            'pageTitle'  => 'Add Customer',
            'activePage' => 'customers',
            'customer'   => null,
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
            'full_name'  => trim((string) $this->request->getPost('full_name')),
            'email'      => trim((string) $this->request->getPost('email')),
            'phone'      => trim((string) $this->request->getPost('phone')),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if ($this->hasAvatarUpload()) {
            $data['avatar'] = (new AvatarManager())->store(
                $this->request->getFile('avatar'),
                'customers'
            );
        }

        (new CustomerModel())->insert($data);

        return redirect()->to(site_url('customers'))
            ->with('success', 'Customer account created successfully.');
    }

    public function edit(int $id)
    {
        $customer = (new CustomerModel())->find($id);

        if (! $customer) {
            return redirect()->to(site_url('customers'))
                ->with('error', 'Customer account not found.');
        }

        return view('customers/form', [
            'pageTitle'  => 'Edit Customer',
            'activePage' => 'customers',
            'customer'   => $customer,
        ]);
    }

    public function update(int $id)
    {
        $model = new CustomerModel();
        $customer = $model->find($id);

        if (! $customer) {
            return redirect()->to(site_url('customers'))
                ->with('error', 'Customer account not found.');
        }

        if (! $this->validate($this->rulesWithAvatar($id))) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
            'phone'     => trim((string) $this->request->getPost('phone')),
        ];

        $avatars = new AvatarManager();

        if ($this->hasAvatarUpload()) {
            $data['avatar'] = $avatars->store(
                $this->request->getFile('avatar'),
                'customers'
            );

            $avatars->delete($customer['avatar'] ?? null, 'customers');
        } elseif ($this->request->getPost('remove_avatar')) {
            $avatars->delete($customer['avatar'] ?? null, 'customers');
            $data['avatar'] = null;
        }

        $model->update($id, $data);

        return redirect()->to(site_url('customers'))
            ->with('success', 'Customer account updated successfully.');
    }

    public function delete(int $id)
    {
        $model = new CustomerModel();
        $customer = $model->find($id);

        if ($customer) {
            (new AvatarManager())->delete(
                $customer['avatar'] ?? null,
                'customers'
            );

            $model->delete($id);
        }

        return redirect()->to(site_url('customers'))
            ->with('success', 'Customer account removed.');
    }

    private function rules(?int $id = null): array
    {
        $emailRule = 'required|valid_email|max_length[150]';

        if ($id !== null) {
            $emailRule .= '|is_unique[customers.email,id,' . $id . ']';
        } else {
            $emailRule .= '|is_unique[customers.email]';
        }

        return [
            'full_name' => 'required|min_length[2]|max_length[120]',
            'email'     => $emailRule,
            'phone'     => 'required|min_length[7]|max_length[30]|regex_match[/^[0-9+()\-\s]+$/]',
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

        return $file !== null && $file->getError() !== UPLOAD_ERR_NO_FILE;
    }
}
