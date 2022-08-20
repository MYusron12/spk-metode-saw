<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('message'); ?>
      <form action="<?= base_url('saw/editNilai/') . $nilaiid['id']; ?>" method="post">
        <input type="text" value="<?= $nilaiid['id']; ?>" name="id">
        <div class="form-group">
          <label for="">Alternatif</label>
          <select name="alternatif_id" id="alternatif_id" class="form-control">
            <?php foreach ($alternatif as $row) : ?>
              <?php if ($row->id == $nilaiid['alternatif_id']) : ?>
                <option value="<?= $row->id; ?>" selected><?= $row->kode_alternatif; ?> | <?= $row->keterangan_alternatif; ?></option>
              <?php else : ?>
                <option value="<?= $row->id; ?>"><?= $row->kode_alternatif; ?> | <?= $row->keterangan_alternatif; ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
          <?= form_error('alternatif_id', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="">Kriteria 1</label>
          <input type="text" class="form-control" id="c1" name="c1" value="<?= $nilaiid['c1']; ?>">
          <?= form_error('c1', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="">Kriteria 2</label>
          <input type="text" class="form-control" id="c2" name="c2" value="<?= $nilaiid['c2']; ?>">
          <?= form_error('c2', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="">Kriteria 3</label>
          <input type="text" class="form-control" id="c3" name="c3" value="<?= $nilaiid['c3']; ?>">
          <?= form_error('c3', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="">Kriteria 4</label>
          <input type="text" class="form-control" id="c4" name="c4" value="<?= $nilaiid['c4']; ?>">
          <?= form_error('c4', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
          <label for="">Kriteria 5</label>
          <input type="text" class="form-control" id="c5" name="c5" value="<?= $nilaiid['c5']; ?>">
          <?= form_error('c5', '<small class="text-danger pl-3">', '</small>'); ?>
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