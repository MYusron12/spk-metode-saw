<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('saw/tambahalternatif'); ?>" method="post">
        <div class="form-group">
          <label for="">Kode Alternatif</label>
          <input type="text" class="form-control" id="kode_alternatif" name="kode_alternatif">
          <?= form_error('kode_alternatif', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="">Keterangan Alternatif</label>
          <input type="text" class="form-control" id="keterangan_alternatif" name="keterangan_alternatif">
          <?= form_error('keterangan_alternatif', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->