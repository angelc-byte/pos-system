<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $users = [
            [
                'username' => 'angel',
                'full_name' => 'Angel Clarise Tolentino',
                'role' => 'Administrator'
            ],
            [
                'username' => 'pierre',
                'full_name' => 'Pierre Justine Garciano',
                'role' => 'Cashier'
            ],
            [
                'username' => 'miles',
                'full_name' => 'Miles Salvador',
                'role' => 'Cashier'
            ],
            [
                'username' => 'ivana',
                'full_name' => 'Ivana Nicole Casinillo',
                'role' => 'Manager'
            ],
            [
                'username' => 'shiloh',
                'full_name' => 'Shiloh Grace Tolentino',
                'role' => 'Staff'
            ]
        ];

        return view('users', ['users' => $users]);
    }
}