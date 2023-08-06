<?php
$id = $_GET['id'];
$select = mysqli_query($koneksi, "SELECT * FROM dokter WHERE id_dokter = '$id'");
$d = mysqli_fetch_array($select);
if (isset($_POST['save'])) {
  foreach ($_POST as $key => $value) {
    ${$key} = $value;
  }
  $query = mysqli_query($koneksi, "UPDATE dokter SET nama = '$nama', spesialisasi = '$spesialisasi', 
    nomor_kontak = '$nomor_kontak' WHERE id_dokter = '$id'");
  if ($query) {
    ?>
    <script>
      window.location = "dokter.php?msg=success";
    </script>
    <?php
  } else {
    $e = "Mysql Error " . mysqli_errno($koneksi);
    ?>
    <script>
      Toast.fire({
        icon: 'error',
        title: '<?= $e ?>'
      });
    </script>
    <?php
  ?>
  <?php
  }
}
?>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Tambah Data
            <?= $page ?>
          </h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nama</label>
              <input type="text" name="nama" value="<?= $d['nama'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Spesialisasi</label>
              <input type="text" name="spesialisasi" value="<?= $d['spesialisasi'] ?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Kontak</label>
              <input type="text" name="nomor_kontak" value="<?= $d['nomor_kontak'] ?>" class="form-control" required>
            </div>
            <input type="submit" value="Submit" name="save" class="btn btn-primary float-right">
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

  </div>

</section>
<!-- /.content -->