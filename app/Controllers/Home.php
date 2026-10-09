
<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function guest()
    {
        session()->set([
            'isGuest'  => true,
            'logged_in' => false,
        ]);

        return redirect()->to('/');
    }
}
