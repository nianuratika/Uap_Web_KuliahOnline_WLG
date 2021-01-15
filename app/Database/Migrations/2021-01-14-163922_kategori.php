<?php namespace App\Database\Migrations;
 
use CodeIgniter\Database\Migration;
 
class Kategori extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ktg_id'           => [
                'type'              => 'BIGINT',
                'constraint'        => 20,
                'unsigned'          => TRUE,
                'auto_increment'    => TRUE
            ],
            'name'         => [
                'type'              => 'VARCHAR',
                'constraint'        => '100',
            ],
            'status'       => [
                'type'              => 'ENUM',
                'constraint'        => "'Active','Inactive'",
                'default'           => 'Active'
            ],
        ]);
        $this->forge->addKey('ktg_id', TRUE);
        $this->forge->createTable('kategori');
    }
 
    //--------------------------------------------------------------------
 
    public function down()
    {
        //
    }
}