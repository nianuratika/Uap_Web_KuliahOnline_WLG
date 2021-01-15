<?php namespace App\Database\Migrations;
 
use CodeIgniter\Database\Migration;
 
class Kuis extends Migration
{
    public function up()
    {
        $this->db->enableForeignKeyChecks();
        $this->forge->addField([
            'kuis_id'            => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => TRUE,
                'auto_increment'    => TRUE
            ],
            'ktg_id'           => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => TRUE,
                'null'              => TRUE
            ],
            'kode_matakuliah'          => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
            ],
            'semester'         => [
                'type'              => 'INT',
                'constraint'        => '3',
            ],
            'sks'           => [
                'type'              => 'int',
                'constraint'        => '3',
			],
			'prodi'           => [
                'type'              => 'VARCHAR',
                'constraint'        => '50',
            ],
            'status'        => [
                'type'              => 'ENUM',
                'constraint'        => "'Active','Inactive'",
                'default'           => 'Active'
            ],
            'image'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '300',
                'null'              => TRUE,
            ],
            'description'   => [
                'type'              => 'TEXT',
                'null'              => TRUE,
            ],
        ]);
        $this->forge->addKey('kuis_id', TRUE);
        $this->forge->addForeignKey('ktg_id','kategori','ktg_id','CASCADE','CASCADE');
        $this->forge->createTable('kuis');
    }
 
    //--------------------------------------------------------------------
 
    public function down()
    {
        //
    }
}