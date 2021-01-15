<?php namespace App\Controllers;
  
use CodeIgniter\Controller;
use App\Models\Kuis_model;
use App\Models\Kategori_model;
  
class Kuis extends Controller
{
    protected $helpers = [];
 
    public function __construct()
    {
        helper(['form']);
        $this->kategori_model = new Kategori_model();
        $this->kuis_model = new Kuis_model();
    }
 
    public function index()
    {
        $data['kuis'] = $this->kuis_model->getKuis();
        echo view('kuis/index', $data);
    }
    public function create()
{
    $kategori = $this->kategori_model->where('status', 'Active')->findAll();
    $data['kategori'] = ['' => 'Pilih Kategori'] + array_column($kategori, 'name', 'ktg_id');
    return view('kuis/create', $data);
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
 
    if($validation->run($data, 'kuis') == FALSE){
        session()->setFlashdata('inputs', $this->request->getPost());
        session()->setFlashdata('errors', $validation->getErrors());
        return redirect()->to(base_url('kuis/create'));
    } else {
        // upload file 
        $image->move(ROOTPATH . 'public/uploads', $name);
        // insert
        $simpan = $this->kuis_model->insertKuis($data);
        if($simpan)
        {
            session()->setFlashdata('success', 'Created Kuis successfully');
            return redirect()->to(base_url('kuis')); 
        }
    }
}
}
?>