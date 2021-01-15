<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\Matakuliah_model;
use App\Models\Kategori_model;
  
class Matakuliah extends Controller
{
    protected $helpers = [];
 
    public function __construct()
    {
        helper(['form']);
        $this->kategori_model = new Kategori_model();
        $this->matakuliah_model = new Matakuliah_model();
    }
 
    public function index()
    {
        $data['matakuliah'] = $this->matakuliah_model->getMatakuliah();
        echo view('matakuliah/index', $data);
    }
    public function create()
{
    $kategori = $this->kategori_model->where('status', 'Active')->findAll();
    $data['kategori'] = ['' => 'Pilih Kategori'] + array_column($kategori, 'name', 'ktg_id');
    return view('matakuliah/create', $data);
}
 
public function store()
{
    $validation =  \Config\Services::validation();
 
    // get file upload
    $image = $this->request->getFile('image');
    // random name file
    $name = $image->getRandomName();
 
    $data = array(
        'ktg_id'           => $this->request->getPost('ktg_id'),
        'kode_matakuliah'          => $this->request->getPost('kode_matakuliah'),
        'semester'         => $this->request->getPost('semester'),
        'sks'           => $this->request->getPost('sks'),
        'prodi'         =>$this->request->getPost('prodi'),
        'status'        => $this->request->getPost('status'),
        'image'         => $name,
        'description'   => $this->request->getPost('description'),
    );
 
    if($validation->run($data, 'matakuliah') == FALSE){
        session()->setFlashdata('inputs', $this->request->getPost());
        session()->setFlashdata('errors', $validation->getErrors());
        return redirect()->to(base_url('matakuliah/create'));
    } else {
        // upload file 
        $image->move(ROOTPATH . 'public/uploads', $name);
        // insert
        $simpan = $this->matakuliah_model->insertMatakuliah($data);
        if($simpan)
        {
            session()->setFlashdata('success', 'Created Matakuliah successfully');
            return redirect()->to(base_url('matakuliah')); 
        }
    }
}
public function show($id)
{  
    $data['matakuliah'] = $this->matakuliah_model->getMatakuliah($id);
    echo view('matakuliah/show', $data);
}
 
public function edit($id)
{  
    $kategori = $this->kategori_model->where('status', 'Active')->findAll();
    $data['kategori'] = ['' => 'Pilih Kategori'] + array_column($kategori, 'name', 'ktg_id');
 
    $data['matakuliah'] = $this->matakuliah_model->getMatakuliah($id);
    echo view('matakuliah/edit', $data);
}
 
public function update()
{
    $id = $this->request->getPost('mk_id');
 
    $validation =  \Config\Services::validation();
 
    // get file
    $image = $this->request->getFile('image');
    // random name file
    $name = $image->getRandomName();
 
    $data = array(
        'ktg_id'           => $this->request->getPost('ktg_id'),
        'kode_matkul'          => $this->request->getPost('kode_matkul'),
        'semester'         => $this->request->getPost('semester'),
        'sks'           => $this->request->getPost('sks'),
        'prodi'           => $this->request->getPost('prodi'),
        'status'        => $this->request->getPost('status'),
        'image'         => $name,
        'description'   => $this->request->getPost('description'),
    );
     
    if($validation->run($data, 'matakuliah') == FALSE){
        session()->setFlashdata('inputs', $this->request->getPost());
        session()->setFlashdata('errors', $validation->getErrors());
        return redirect()->to(base_url('matakuliah/edit/'.$id));
    } else {
        // upload
        $image->move(ROOTPATH . 'public/uploads', $name);
        // update
        $ubah = $this->matakuliah_model->updateMatakuliah($data, $id);
        if($ubah)
        {
            session()->setFlashdata('info', 'Updated Matkul successfully');
            return redirect()->to(base_url('matakuliah')); 
        }
    }
}
public function delete($id)
{
    $hapus = $this->matakuliah_model->deleteMatakuliah($id);
    if($hapus)
    {
        session()->setFlashdata('warning', 'Deleted Matakuliah successfully');
        return redirect()->to(base_url('matakuliah')); 
    }
}
}
?>