<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    public function home()
    {
        $customers = (new CustomerModel())->orderBy('created_at', 'DESC')->findAll(5);
        $users = (new UserModel())->orderBy('created_at', 'DESC')->findAll(5);

        return view('home', [
            'pageTitle'     => 'Dashboard',
            'activePage'    => 'dashboard',
            'customerCount' => (new CustomerModel())->countAllResults(),
            'userCount'     => (new UserModel())->countAllResults(),
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
