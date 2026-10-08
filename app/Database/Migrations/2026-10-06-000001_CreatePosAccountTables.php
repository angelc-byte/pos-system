<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePosAccountTables extends Migration
{
    public function up()
    {
        if (! $this->db->tableExists('customers')) {
            $this->forge->addField([
                'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'full_name'  => ['type' => 'VARCHAR', 'constraint' => 120],
                'email'      => ['type' => 'VARCHAR', 'constraint' => 150],
                'phone'      => ['type' => 'VARCHAR', 'constraint' => 30],
                'avatar'     => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('email');
            $this->forge->createTable('customers');
        }

        if (! $this->db->tableExists('users')) {
            $this->forge->addField([
                'id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'username'   => ['type' => 'VARCHAR', 'constraint' => 80],
                'password'   => ['type' => 'VARCHAR', 'constraint' => 255],
                'email'      => ['type' => 'VARCHAR', 'constraint' => 150],
                'full_name'  => ['type' => 'VARCHAR', 'constraint' => 120],
                'avatar'     => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('username');
            $this->forge->addUniqueKey('email');
            $this->forge->createTable('users');
        } else {
            $fields = $this->db->getFieldNames('users');
            $missing = [];

            if (! in_array('password', $fields, true)) {
                $missing['password'] = ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'username'];
            }
            if (! in_array('email', $fields, true)) {
                $missing['email'] = ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true, 'after' => 'password'];
            }
            if (! in_array('avatar', $fields, true)) {
                $missing['avatar'] = ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'full_name'];
            }
            if ($missing !== []) {
                $this->forge->addColumn('users', $missing);
            }
        }

        $users = $this->db->table('users')
            ->groupStart()
            ->where('password', null)
            ->orWhere('password', '')
            ->groupEnd()
            ->get()
            ->getResultArray();

        foreach ($users as $user) {
            $this->db->table('users')->where('id', $user['id'])->update([
                'password' => password_hash('ChangeMe123!', PASSWORD_DEFAULT),
            ]);
        }
    }

    public function down()
    {
        // Existing TFA3 tables may contain student data, so rollback intentionally
        // keeps them intact. Remove the tables manually only in a disposable database.
    }
}
