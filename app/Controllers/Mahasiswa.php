<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\Mahasiswa_model;
  
class Mahasiswa extends Controller
{
 
    public function index()
    {
        $model = new Mahasiswa_model();
        $data['mahasiswa'] = $model->getMahasiswa();
        echo view('mahasiswa/index', $data);
    }
    public function create()
{
    return view('mahasiswa/create');
}
 
public function store()
{
    $validation =  \Config\Services::validation();
 
    $data = array(
        'nama_mahasiswa'   => $this->request->getPost('nama_mahasiswa'),
    );
 
    if($validation->run($data, 'mahasiswa') == FALSE){
        session()->setFlashdata('inputs', $this->request->getPost());
        session()->setFlashdata('errors', $validation->getErrors());
        return redirect()->to(base_url('mahasiswa/create'));
    } else {
        $model = new Mahasiswa_model();
        $simpan = $model->insertMahasiswa($data);
        if($simpan)
        {
            session()->setFlashdata('success', 'Created Mahasiswa successfully');
            return redirect()->to(base_url('mahasiswa')); 
        }
    }
}
public function edit($id)
{  
    $model = new Mahasiswa_model();
    $data['mahasiswa'] = $model->getKategori($id)->getRowArray();
    echo view('mahasiswa/edit', $data);
}
 
public function update()
{
    $id = $this->request->getPost('NPM');
 
    $validation =  \Config\Services::validation();
 
    $data = array(
        'nama_mahasiswa'     => $this->request->getPost('nama_mahasiswa'),
        
    );
     
    if($validation->run($data, 'mahasiswa') == FALSE){
        session()->setFlashdata('inputs', $this->request->getPost());
        session()->setFlashdata('errors', $validation->getErrors());
        return redirect()->to(base_url('mahasiswa/edit/'.$id));
    } else {
        $model = new Mahasiswa_model();
        $ubah = $model->updateMahasiswa($data, $id);
        if($ubah)
        {
            session()->setFlashdata('info', 'Updated Mahasiswa successfully');
            return redirect()->to(base_url('mahasiswa')); 
        }
    }
}
public function delete($id)
{
    $model = new Mahasiswa_model();
    $hapus = $model->deleteMahasiswa($id);
    if($hapus)
    {
        session()->setFlashdata('warning', 'Deleted Mahasiswa successfully');
        return redirect()->to(base_url('mahasiswa')); 
    }
}
}
?>