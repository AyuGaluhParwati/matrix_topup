<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSaldoToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'saldo' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => 0,
                'after'      => 'password'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'saldo');
    }
}
