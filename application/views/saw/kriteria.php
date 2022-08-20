<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-6">
      <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
      <a href="<?= base_url('saw/tambahKriteria'); ?>" class="btn btn-primary mb-3">Tambah Kriteria</a>
      <table class="table table-hover" id="dataTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama Kriteria</th>
            <th scope="col">Tipe Kriteria</th>
            <th scope="col">Bobot Nilai Kriteria</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($kriteria as $alt) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $alt['nama_kriteria']; ?></td>
              <td><?= $alt['tipe_kriteria']; ?></td>
              <td><?= $alt['bobot_nilai_kriteria']; ?></td>
              <td>
                <a href="<?= base_url('saw/editkriteria/') . $alt['id']; ?>" class="badge badge-success">edit</a>
                <a href="<?= base_url('saw/hapuskriteria/') . $alt['id']; ?>" class="badge badge-danger" onclick="return confirm('apakah akan dihapus?')">delete</a>
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