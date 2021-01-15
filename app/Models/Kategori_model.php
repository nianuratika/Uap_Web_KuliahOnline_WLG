<?php namespace App\Models;
use CodeIgniter\Model;
  
class Kategori_model extends Model
{
    protected $table = 'kategori';
      
    public function getKategori($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['ktg_id' => $id]);
        }   
    }
    public function insertKategori($data)
{
    return $this->db->table($this->table)->insert($data);
}

public function updateKategori($data, $id)
{
    return $this->db->table($this->table)->update($data, ['ktg_id' => $id]);
}
public function deleteKategori($id)
{
    return $this->db->table($this->table)->delete(['ktg_id' => $id]);
}
}
?>