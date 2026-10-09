<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    public function home()
    {
        $customerModel = new CustomerModel();
        $userModel = new UserModel();

        $customers = $customerModel
            ->orderBy('created_at', 'DESC')
            ->findAll(5);

        $users = $userModel
            ->orderBy('created_at', 'DESC')
            ->findAll(5);

        return view('home', [
            'pageTitle'       => 'Dashboard',
            'activePage'      => 'dashboard',
            'customerCount'   => $customerModel->countAllResults(),
            'userCount'       => $userModel->countAllResults(),
            'recentCustomers' => $customers,
            'recentUsers'     => $users,
        ]);
    }

    public function about()
    {
        return view('about', [
            'pageTitle'  => 'About',
            'activePage' => 'about',
        ]);
    }
}
