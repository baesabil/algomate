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

  <title>Data Soal</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

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
                  <h2>Data Soal</h2>

                  <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
    <a href="tambah-soal.php" class="btn btn-success"><i class="fa fa-plus"></i> Tambah soal</a>
    <table id="datatable-buttons" class="table table-striped table-bordered">
        <thead>
        <tr>
          <th>id_soal</th>
          <th>Kategori soal</th>
          <th>Pertanyaan</th>
          <th>a</th>
          <th>b</th>
          <th>c</th>
          <th>Kunci Jawaban</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT e.id_soal, k.judul, e.pertanyaan, e.a, e.b, e.c, e.kunci_jawaban FROM materi k INNER JOIN soal e ON k.id_materi = e.id_materi ORDER BY e.id_soal DESC";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            $no = 1; // Inisialisasi variabel $no
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?= $row['id_soal']; ?></td>
                    <td><?= $row['judul']; ?></td>
                    <td><?= $row['pertanyaan']; ?></td>
                    <td><?= $row['a']; ?></td>
                    <td><?= $row['b']; ?></td>
                    <td><?= $row['c']; ?></td>
                    <td><?= $row['kunci_jawaban']; ?></td>
                <td>
                  <a class="btn btn-warning btn-xs" href='edit-soal.php?id_soal=<?= $row[0] ?>'>Edit</a> |
                  <a class="btn btn-danger btn-xs" href='hapus-soal.php?id_soal=<?= $row[0] ?>' onclick="return confirm('Anda Yakin Ingin Menghapus?')">Hapus</a>
                </td>
                </tr>
            <?php
             
            }
            ?>
        </tbody>
    </table>
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
  <!-- iCheck -->
  <script src="../vendors/iCheck/icheck.min.js"></script>
  <!-- Datatables -->
  <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="../vendors/jszip/dist/jszip.min.js"></script>
  <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>

</body>

</html>