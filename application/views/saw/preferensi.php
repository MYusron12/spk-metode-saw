<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-6">
      <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
      <a href="<?= base_url('saw/tambahPreferensi'); ?>" class="btn btn-primary mb-3">Tambah Preferensi</a>
      <table class="table table-hover" id="dataTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Skor Nilai</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($preferensi as $alt) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $alt['keterangan']; ?></td>
              <td><?= $alt['skor_nilai']; ?></td>
              <td>
                <a href="<?= base_url('saw/editpreferensi/') . $alt['id']; ?>" class="badge badge-success">edit</a>
                <a href="<?= base_url('saw/hapuspreferensi/') . $alt['id']; ?>" class="badge badge-danger" onclick="return confirm('apakah akan dihapus?')">delete</a>
              </td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>