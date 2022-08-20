<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <?php foreach ($max as $row) ?>
    <div class="col-lg-6">
      <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
      <?= $this->session->flashdata('message'); ?>
      <?= $kriteria1; ?>
      <?= $kriteria2; ?>
      <?= $kriteria3; ?>
      <?= $kriteria4; ?>
      <?= $kriteria5; ?>
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
            <th>Jumlah</th>
          </tr>
        </thead>
        <tbody>
          <?php $i = 1; ?>
          <?php foreach ($nilai as $alt) : ?>
            <tr>
              <?php
              $c1 = $alt['c1'] / $row->c1;
              $c2 = $alt['c2'] / $row->c2;
              $c3 = $row->c3 / $alt['c3'];
              $c4 = $alt['c4'] / $row->c4;
              $c5 = $alt['c5'] / $row->c5;
              ?>
              <th scope="row"><?= $i; ?></th>
              <td><?= $alt['keterangan_alternatif']; ?></td>
              <td><?= $c1  ?></td>
              <td><?= $c2  ?></td>
              <td><?= $c3 ?></td>
              <td><?= $c4  ?></td>
              <td><?= $c5  ?></td>
              <td><?= ($kriteria1 * $c1) + ($kriteria2 * $c2) + ($kriteria3 * $c3) + ($kriteria4 * $c4) + ($kriteria5 * $c5); ?></td>
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