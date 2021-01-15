<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'NPM'           => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => TRUE,
                'auto_increment'    => TRUE
            ],
            'nama_mahasiswa'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            
        ]);
        $this->forge->addKey('NPM', TRUE);
        $this->forge->createTable('mahasiswa');
		//
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
