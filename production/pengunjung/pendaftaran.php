<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>AlgoMate Login</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7"><br><br><br>
                <h2 class="my-4">Daftar di AlgoMate</h2>
                <form method="post">
                <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="id_pengunjung" name="id_pengunjung" placeholder="id pengunjung" required>
                        <label for="id_pengunjung">Id anda (berupa angka)</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nama_pengunjung" name="nama_pengunjung" placeholder="Nama Lengkap" required>
                        <label for="nama_pengunjung">Nama Lengkap</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username_pengunjung" name="username_pengunjung" placeholder="Username" required>
                        <label for="username_pengunjung">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password_pengunjung" name="password_pengunjung" placeholder="Password" required>
                        <label for="password_pengunjung">Password</label>
                    </div>
                    <br>
                        <p class="my-4">Sudah Punya Akun? <a href="login.php">Login sekarang juga</a>.</p> <!-- Replace "registration.php" with the actual URL of your registration page -->
                    <br>
                    <button type="submit" class="btn btn-primary" name="submit">Daftar</button>
                </form>
                <?php
                session_start();
                include "koneksi.php";
                if (isset($_POST['submit'])) {
                    $id_pengunjung = $_POST['id_pengunjung'];
                    $nama_pengunjung = $_POST['nama_pengunjung'];
                    $username_pengunjung = $_POST['username_pengunjung'];
                    $password_pengunjung = $_POST['password_pengunjung'];

                    // Save data to the database
                    $sql = "INSERT INTO pengunjung (id_pengunjung, nama_pengunjung, username_pengunjung, password_pengunjung) VALUES ($id_pengunjung,'$nama_pengunjung', '$username_pengunjung', '$password_pengunjung')";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        // Registration success
                        echo "<script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@10\"></script>";
                        echo "<script>";
                        echo "Swal.fire({
                            icon: 'success',
                            title: 'Daftar Sukses - Algomate',
                            text: 'Hai AlgoFriends, Pendaftaran berhasil (^  O  ^)!',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            window.location = 'login.php';
                        });";
                        echo "</script>";
                        // Add any success message or redirect user to the login page
                    } else {
                        // Registration failed
                        echo "<script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@10\"></script>";
                        echo "<script>";
                        echo "Swal.fire({
                            icon: 'error',
                            title: 'Daftar Gagal',
                            text: 'Hai, ID yang kamu masukan telah ada, coba masukan ID baru ya!',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            window.location = 'pendaftaran.php';
                        });";
                        echo "</script>";
                        // Add any error message or handle the error as needed
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <br><br><br><br><br><br><br>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; AlgoMate 2023</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
