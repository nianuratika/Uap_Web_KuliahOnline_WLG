<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\Kategori_model;
  
class Kategori extends Controller
{
 
    public function index()
    {
        $model = new Kategori_model();
        $data['kategori'] = $model->getKategori();
        echo view('kategori/index', $data);
    }
    public function create()
{
    return view('kategori/create');
}
 
public function store()
{
    $validation =  \Config\Services::validation();
 
    $data = array(
        'name'     => $this->request->getPost('name'),
        'status'   => $this->request->getPost('status'),
    );
 
    if($validation->run($data, 'kategori') == FALSE){
        session()->setFlashdata('inputs', $this->request->getPost());
        session()->setFlashdata('errors', $validation->getErrors());
        return redirect()->to(base_url('kategori/create'));
    } else {
        $model = new Kategori_model();
        $simpan = $model->insertKategori($data);
        if($simpan)
        {
            session()->setFlashdata('success', 'Created Kategori successfully');
            return redirect()->to(base_url('kategori')); 
        }
    }
}
public function edit($id)
{  
    $model = new Kategori_model();
    $data['kategori'] = $model->getKategori($id)->getRowArray();
    echo view('kategori/edit', $data);
}
 
public function update()
{
    $id = $this->request->getPost('ktg_id');
 
    $validation =  \Config\Services::validation();
 
    $data = array(
        'name'     => $this->request->getPost('name'),
        'status'   => $this->request->getPost('status'),
    );
     
    if($validation->run($data, 'kategori') == FALSE){
        session()->setFlashdata('inputs', $this->request->getPost());
        session()->setFlashdata('errors', $validation->getErrors());
        return redirect()->to(base_url('kategori/edit/'.$id));
    } else {
        $model = new Kategori_model();
        $ubah = $model->updateKategori($data, $id);
        if($ubah)
        {
            session()->setFlashdata('info', 'Updated Kategori successfully');
            return redirect()->to(base_url('kategori')); 
        }
    }
}
public function delete($id)
{
    $model = new Kategori_model();
    $hapus = $model->deleteKategori($id);
    if($hapus)
    {
        session()->setFlashdata('warning', 'Deleted Kategori successfully');
        return redirect()->to(base_url('kategori')); 
    }
}
}
?>