<?php
include "session.php";
$id_pengunjung = $_GET['id_pengunjung'];

$query = "SELECT * FROM pengunjung WHERE id_pengunjung=$id_pengunjung";

$data = mysqli_query($conn, $query) or die ($conn);

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

    <title>Edit Data Pengunjung</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
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
                                    <h2>Edit Data Pengunjung</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <form class="form-horizontal form-label-left" method="post" action="">
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="id_pengunjung">id_pengunjung <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="number" id="id_pengunjung" name="id_pengunjung" value="<?= $row['id_pengunjung']; ?>" class="form-control col-md-7 col-xs-12" readonly>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_pengunjung">Nama Pengunjung <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="nama_pengunjung" name="nama_pengunjung" data-validate-length-range="6" data-validate-words="2" required="required" value="<?= $row['nama_pengunjung']; ?>" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username_pengunjung">Username Pengunjung <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="username_pengunjung" name="username_pengunjung" data-validate-length-range="6" data-validate-words="2" required="required" value="<?= $row['username_pengunjung']; ?>" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password_pengunjung">Password Pengunjung <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="password_pengunjung" name="password_pengunjung" required="required" class="form-control col-md-7 col-xs-12" value="<?= $row['password_pengunjung']; ?>">
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                 <input type="submit" name="submit" value="submit" class="btn btn-success">
                                            </div>
                                        </div>
                                    </form>

                                    <?php
                                    
                                    include "koneksi.php";

                                    if (isset($_POST['submit'])) {
                                        $id_pengunjung = $_POST['id_pengunjung'];
                                        $nama_pengunjung = $_POST['nama_pengunjung'];
                                        $username_pengunjung = $_POST['username_pengunjung'];
                                        $password_pengunjung = $_POST['password_pengunjung'];
                                        
                                        $query = "UPDATE pengunjung SET nama_pengunjung='$nama_pengunjung', username_pengunjung='$username_pengunjung', password_pengunjung='$password_pengunjung' WHERE id_pengunjung='$id_pengunjung'";

                                        $sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

                                        if ($sql) {
                                            echo "Berhasil Edit Data";
                                        } else {
                                            echo "Gagal Edit Data";
                                        }
                                        echo "<br><a href='pengunjung.php'><< Kembali ke halaman pengunjung</a>";
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