<?php namespace App\Controllers;
 
use App\Models\Dashboard_model;
 
class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->cek_login();
        $this->dashboard_model = new Dashboard_model();
    }
     
    public function index()
    {
        if($this->cek_login() == FALSE){
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('/auth/login');
        }
        $data['total_matakuliah']  = $this->dashboard_model->getCountMatakuliah();
        $data['total_kuis']      = $this->dashboard_model->getCountKuis();
        $data['total_kategori']     = $this->dashboard_model->getCountKategori();
        $data['total_user']         = $this->dashboard_model->getCountUser();
 
        echo view('dashboard', $data);
        echo view('_partials/footer', $chart);
    }
     
}