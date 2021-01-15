<?php namespace App\Models;
use CodeIgniter\Model;
  
class Kuis_model extends Model
{
    protected $table = 'kuis';
      
    public function getKuis($id = false)
    {
        if($id === false){
            return $this->table('kuis')
                        ->join('kategori', 'kategori.ktg_id = kuis.ktg_id')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('kuis')
                        ->join('kategori', 'kategori.ktg_id = kuis.ktg_id')
                        ->where('kuis.kuis_id', $id)
                        ->get()
                        ->getRowArray();
        }   
    }
    public function insertKuis($data)
{
    return $this->db->table($this->table)->insert($data);
}
}
?>