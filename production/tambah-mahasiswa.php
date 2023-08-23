<?php
include "session.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Tambah Mahasiswa</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-wysiwyg -->
  <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
  <!-- Select2 -->
  <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <!-- Switchery -->
  <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <!-- starrr -->
  <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php
      include "menu.php";
      ?>

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Tambah Mahasiswa</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form class="form-horizontal form-label-left" method="post" action="">
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="NIM">NIM <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nim" name="nim" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Status">Jenis Kelamin <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single form-control col-md-7 col-xs-12" required="required" name="jenis_kelamin">
                          <option value="0" hidden>-- Pilih Jenis Kelamin --</option>
                          <?php
                          $sql = "SELECT * from tb_jenis_kelamin order by id_jenis_kelamin asc";
                          $result = mysqli_query($conn, $sql);
                          while ($row = mysqli_fetch_array($result)) {
                          ?>
                            <option value="<?= $row[0]; ?>"><?= $row[0] . " - " . $row[1]; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Status">Agama <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="select2_single form-control col-md-7 col-xs-12" required="required" name="agama">
                          <option value="0" hidden>-- Pilih Agama --</option>
                          <?php
                          $sql = "SELECT * from tb_agama order by id_agama asc";
                          $result = mysqli_query($conn, $sql);
                          while ($row = mysqli_fetch_array($result)) {
                          ?>
                            <option value="<?= $row[0]; ?>"><?= $row[0] . " - " . $row[1]; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nama" name="nama" data-validate-length-range="6" data-validate-words="2" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tanggal_lahir">Tanggal Lahir <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Tempat_lahir">Tempat Lahir <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="tempat_lahir" name="tempat_lahir" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="alamat" required="required" name="alamat" class="form-control col-md-7 col-xs-12"></textarea>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">No. HP <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="tel" id="telephone" name="phone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <!-- <button type="submit" class="btn btn-primary">Cancel</button> -->
                        <!-- <button id="send" type="submit" name="submit" class="btn btn-success">Submit</button> -->
                        <input type="submit" name="submit" value="submit" class="btn btn-success">
                      </div>
                    </div>
                  </form>

                  <?php
                  if (isset($_POST['submit'])) {
                    $nim = $_POST['nim'];
                    $jenis_kelamin = $_POST['jenis_kelamin'];
                    $nama = $_POST['nama'];
                    $agama = $_POST['agama'];
                    $tanggal_lahir = $_POST['tanggal_lahir'];
                    $tempat_lahir = $_POST['tempat_lahir'];
                    $alamat = $_POST['alamat'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $tanggal_masuk = date("Y-m-d");
                    $status = "1";

                    $query = "INSERT INTO tb_mahasiswa (nim, id_jenis_kelamin, id_agama, nama, tanggal_lahir, tempat_lahir, alamat, no_hp, email, tanggal_masuk, status_mahasiswa) VALUES ('$nim', '$jenis_kelamin', '$agama', '$nama', '$tanggal_lahir','$tempat_lahir', '$alamat', '$phone', '$email', '$tanggal_masuk', '$status')";

                    $sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

                    if ($sql) {
                      echo "Berhasil Input Data";
                    } else {
                      echo "Gagal Input Data";
                    }
                    echo "<br><a href='mahasiswa.php'><< Kembali ke halaman mahasiswa</a>";
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->

      <?php
      include "footer.php";
      ?>
    </div>
  </div>

  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>
 
  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>

</body>

</html>