<?php
    include "session.php";
    $id_materi = $_GET['id_materi'];

    $query = "SELECT * FROM materi WHERE id_materi='$id_materi'";

    $data = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit materi</title>

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
                                    <h2>Edit materi</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form class="form-horizontal form-label-left" method="post" action="" enctype="multipart/form-data">
                                        
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="kategori">Kategori materi <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="select2_single form-control col-md-7 col-xs-12" required="required" name="kategori">
                                                    <option value="0" hidden>-- Pilih Kategori materi --</option>
                                                    <?php
                                                    $sql = "SELECT * from kategori_materi order by id_kategori_materi asc";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row_kategori = mysqli_fetch_array($result)) {
                                                        if ($row_kategori[0] == $row['id_kategori_materi']) {
                                                            ?>
                                                            <option value="<?= $row_kategori[0]; ?>" selected><?= $row_kategori[0] . " - " . $row_kategori[1]; ?></option>
                                                        <?php
                                                        } else {
                                                            ?>
                                                            <option value="<?= $row_kategori[0]; ?>"><?= $row_kategori[0] . " - " . $row_kategori[1]; ?></option>
                                                        <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="judul">Judul materi <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="judul" name="judul" value="<?= $row['judul']; ?>" data-validate-length-range="6" data-validate-words="2" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="deskripsi">Deskripsi <span class="required">*</span>
                                            </label>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea name="deskripsi" class="form-control col-md-7 col-xs-12"><?= $row['deskripsi']; ?></textarea>
                                                </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="link">Link <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="link" name="link" class="form-control col-md-7 col-xs-12" value="<?= $row['link']; ?>">
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <input type="submit" name="submit" value="Submit" class="btn btn-success">
                                                <a href="materi.php" class="btn btn-primary">Kembali</a>
                                            </div>
                                        </div>
                                    </form>

                                    <?php
                                    include "koneksi.php";

                                    if (isset($_POST['submit'])) {
                                        $kategori = $_POST['kategori'];
                                        $judul = $_POST['judul'];
                                        $deskripsi = $_POST['deskripsi'];
                                        $link = $_POST['link'];

                                        $query = "UPDATE materi SET id_materi='$id_materi', id_kategori_materi='$kategori', judul='$judul', deskripsi='$deskripsi', link='$link' WHERE id_materi='$id_materi'";

                                        $sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

                                        if ($sql) {
                                            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                                            echo '<script>';
                                            echo 'Swal.fire({';
                                            echo '  icon: "success",';
                                            echo '  title: "Data Berhasil Diubah",';
                                            echo '  text: "",';
                                            echo '  confirmButtonText: "OK"';
                                            echo '}).then(function() {';
                                            echo '  window.location = "materi.php";';
                                            echo '});';
                                            echo '</script>';
                                        } else {
                                            echo "Gagal Edit Data";
                                        }
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
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

</body>

</html>
