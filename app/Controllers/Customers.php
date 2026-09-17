<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $customers = [
            [
                'full_name' => 'Angel Clarise Tolentino',
                'email' => 'angeltolentino@gmail.com',
                'phone' => '09165623598'
            ],
            [
                'full_name' => 'Pierre Justine Garciano',
                'email' => 'pierrejg21@gmail.com',
                'phone' => '09172654389'
            ],
            [
                'full_name' => 'Miles Salvador',
                'email' => 'salvadormiles@gmail.com',
                'phone' => '09275436802'
            ],
            [
                'full_name' => 'Ivana Nicole Casinillo',
                'email' => 'casinillo27ivana@gmail.com',
                'phone' => '09162375698'
            ],
            [
                'full_name' => 'Shiloh Grace Tolentino',
                'email' => 'shilohgtolentino0@gmail.com',
                'phone' => '09271000325'
            ]
        ];

        return view('customers', ['customers' => $customers]);
    }
}