<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('saw/tambahPreferensi/'); ?>" method="post">
        <div class="form-group">
          <label for="">Keterangan</label>
          <input type="text" class="form-control" id="keterangan" name="keterangan">
          <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="">Skor Nilai</label>
          <input type="text" class="form-control" id="skor_nilai" name="skor_nilai">
          <?= form_error('skor_nilai', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->