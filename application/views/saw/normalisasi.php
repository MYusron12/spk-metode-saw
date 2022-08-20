<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <?php foreach ($max as $row) ?>
    <div class="col-lg-6">
      <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
      <table class="table table-hover" id="dataTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Alternatif</th>
            <th scope="col">Kriteria 1</th>
            <th scope="col">Kriteria 2</th>
            <th scope="col">Kriteria 3</th>
            <th scope="col">Kriteria 4</th>
            <th scope="col">Kriteria 5</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($nilai as $alt) : ?>
            <tr>
              <th scope="row"><?= $i; ?></th>
              <td><?= $alt['keterangan_alternatif']; ?></td>
              <td><?= $alt['c1'] / $row->c1; ?></td>
              <td><?= $alt['c2'] / $row->c2; ?></td>
              <td><?= $row->c3 / $alt['c3']; ?></td>
              <td><?= $alt['c4'] / $row->c4; ?></td>
              <td><?= $alt['c5'] / $row->c5; ?></td>
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