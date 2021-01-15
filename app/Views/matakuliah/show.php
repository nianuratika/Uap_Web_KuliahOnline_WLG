<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
 
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Show Matakuliah</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Show_Matkul</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
 
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-4">
                  <img src="<?php echo base_url('uploads/'.$matakuliah['image']) ?>" class="img-fluid">
                </div>
                <div class="col-md-8">
                  <dl class="dl-horizontal">
                    <dt>SKS</dt>
                    <dd><?php echo $matakuliah['sks']; ?></dd>
                    <dt>Kategori Matakuliah</dt>
                    <dd><?php echo $matakuliah['name']; ?></dd>
                    <dt>Kode Matakuliah</dt>
                    <dd><?php echo $matakuliah['kode_matakuliah']; ?></dd>
                    <dt>Semester</dt>
                    <dd><?php echo $matakuliah['semester']; ?></dd> 
                    <dt>Prodi</dt>
                    <dd><?php echo $matakuliah['prodi'];?></dd>      
                    <dt>Status</dt>
                    <dd><?php echo $matakuliah['status']; ?></dd>       
                    <dt>Description</dt>
                    <dd><?php echo $matakuliah['description']; ?></dd>             
                  </dl>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('matakuliah'); ?>" class="btn btn-outline-info float-right">Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo view('_partials/footer'); ?>