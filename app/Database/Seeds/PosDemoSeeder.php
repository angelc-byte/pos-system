<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PosDemoSeeder extends Seeder
{
    public function run()
    {
        $users = $this->db->table('users');

        if (! $users->where('username', 'admin')->countAllResults()) {
            $users->insert([
                'username'   => 'admin',
                'password'   => password_hash('ChangeMe123!', PASSWORD_DEFAULT),
                'email'      => 'admin@example.com',
                'full_name'  => 'POS Administrator',
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $customers = $this->db->table('customers');
        if ($customers->countAllResults() === 0) {
            $customers->insertBatch([
                ['full_name' => 'Jordan Reyes', 'email' => 'jordan@example.com', 'phone' => '0917 555 0142', 'created_at' => date('Y-m-d H:i:s')],
                ['full_name' => 'Mika Santos', 'email' => 'mika@example.com', 'phone' => '0918 555 0198', 'created_at' => date('Y-m-d H:i:s')],
            ]);
        }
    }
}
