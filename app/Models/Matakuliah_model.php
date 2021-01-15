<?php namespace App\Models;
use CodeIgniter\Model;
  
class Matakuliah_model extends Model
{
    protected $table = 'matakuliah';
      
    public function getMatakuliah($id = false)
    {
        if($id === false){
            return $this->table('matakuliah')
                        ->join('kategori', 'kategori.ktg_id = matakuliah.ktg_id')
                        ->get()
                        ->getResultArray();
        } else {
            return $this->table('matakuliah')
                        ->join('kategori', 'kategori.ktg_id = matakuliah.ktg_id')
                        ->where('matakuliah.ktg_id', $id)
                        ->get()
                        ->getRowArray();
        }   
    }
    public function insertMatakuliah($data)
{
    return $this->db->table($this->table)->insert($data);
}
public function updateMatakuliah($data, $id)
{
    return $this->db->table($this->table)->update($data, ['mk_id' => $id]);
}
public function deleteMatakuliah($id)
{
    return $this->db->table($this->table)->delete(['mk_id' => $id]);
} 
}
?>