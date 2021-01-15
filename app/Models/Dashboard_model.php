<?php namespace App\Models;
use CodeIgniter\Model;
  
class Dashboard_model extends Model
{
    public function getCountMatakuliah()
    {
        return $this->db->table("matakuliah")->countAll();
    }
 
    // hitung total data pada category
    public function getCountKategori()
    {
        return $this->db->table("kategori")->countAll();
    }
 
    // hitung total data pada product
    public function getCountKuis()
    {
        return $this->db->table("kuis")->countAll();
    }
 
    // hitung total data pada user
    public function getCountUser()
    {
        return $this->db->table("users")->countAll();
    }
 
}