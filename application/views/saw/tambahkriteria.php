<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('saw/tambahKriteria/'); ?>" method="post">
        <?php foreach ($urutan as $row) ?>
        <input type="text" name="urutan_id" value="<?= $row->id; ?>">
        <div class="form-group">
          <label for="">Nama Kriteria</label>
          <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria">
          <?= form_error('nama_kriteria', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="">Tipe Kriteria</label>
          <input type="text" class="form-control" id="tipe_kriteria" name="tipe_kriteria">
          <?= form_error('tipe_kriteria', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="">Bobot Nilai Kriteria</label>
          <input type="text" class="form-control" id="bobot_nilai_kriteria" name="bobot_nilai_kriteria">
          <?= form_error('bobot_nilai_kriteria', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->