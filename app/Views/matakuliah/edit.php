<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
 
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Matakuliah</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit_Matkul</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
 
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <?php 
            $inputs = session()->getFlashdata('inputs');
            $errors = session()->getFlashdata('errors');
            if(!empty($errors)){ ?>
            <div class="alert alert-danger" role="alert">
              Whoops! Ada kesalahan saat input data, yaitu:
              <ul>
              <?php foreach ($errors as $error) : ?>
                  <li><?= esc($error) ?></li>
              <?php endforeach ?>
              </ul>
            </div>
          <?php } ?>
          <div class="card">
            <?php echo form_open_multipart('matakuliah/update'); ?>
              <div class="card-header">Form Edit Matakuliah</div>
              <div class="card-body">
                <?php echo form_hidden('mk_id', $matakuliah['mk_id']); ?>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <?php echo form_label('Image', 'Image'); ?>
                      <br>
                      <img src="<?php echo base_url('uploads/'.$matakuliah['image']) ?>" class="img-fluid">
                      <br>
                      <br>
                      <?php echo form_label('Ganti Image', 'Ganti Image'); ?>
                      <?php echo form_upload('image', $matakuliah['image']); ?>
                    </div>
                  </div>
                  <div class="col-md-8">
                    <div class="form-group"> 
                      <?php echo form_label('Kategori', 'Kategori'); ?>
                      <?php echo form_dropdown('ktg_id', $kategori, $matakuliah['ktg_id'], ['class' => 'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('Kode_matakuliah', 'Kode_matakuliah'); ?>
                      <?php echo form_input('kode_matakuliah', $matakuliah['kode_matakuliah'], ['class' => 'form-control', 'placeholder' => 'Kode Matakuliah']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('Semester', 'Semester'); ?>
                      <?php echo form_input('semester', $matakuliah['semester'], ['class' => 'form-control', 'placeholder' => 'Semester', 'type' => 'number']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('SKS', 'SKS'); ?>
                      <?php echo form_input('sks', $matakuliah['sks'], ['class' => 'form-control', 'placeholder' => 'SKS']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('Prodi', 'Prodi'); ?>
                      <?php echo form_input('prodi', $matakuliah['prodi'], ['class' => 'form-control', 'placeholder' => 'Prodi']); ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <?php echo form_label('Status', 'Status'); ?>
                      <?php echo form_dropdown('status', ['' => 'Pilih', 'Active' => 'Active', 'Inactive' => 'Inactieve'], $matakuliah['status'], ['class' => 'form-control']); ?>
                    </div>
                    <div class="form-group">
                      <?php echo form_label('Description', 'Description'); ?>
                      <?php echo form_textarea('description', $matakuliah['description'], ['class' => 'form-control', 'placeholder' => 'Description']); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                  <a href="<?php echo base_url('matakuliah'); ?>" class="btn btn-outline-info">Back</a>
                  <button type="submit" class="btn btn-primary float-right">Update</button>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php echo view('_partials/footer'); ?>