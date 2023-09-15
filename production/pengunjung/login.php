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
                        <h2 class="my-4">Login to AlgoMate</h2>
                        <form method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username_pengunjung" name="username_pengunjung" placeholder="Username" required>
                <label for="username_pengunjung">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password_pengunjung" name="password_pengunjung" placeholder="Password" required>
                <label for="password_pengunjung">Password</label>
            </div><br>
            <p class="my-4">Belum punya akun, <a href="pendaftaran.php">Daftar sekarang juga</a>.</p> <!-- Replace "registration.php" with the actual URL of your registration page -->
            <br>
            <button type="submit" class="btn btn-primary" name="submit">Login</button>
         </form>
           <?php
            session_start();
            include "koneksi.php";
            if (isset($_POST['submit'])) { // Changed the condition to "submit" here

                $username_pengunjung = $_POST['username_pengunjung'];
                $password_pengunjung = $_POST['password_pengunjung'];

                $sql = "SELECT * FROM pengunjung WHERE username_pengunjung='$username_pengunjung' && password_pengunjung='$password_pengunjung'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                if (mysqli_num_rows($result) == 1) {
                    $_SESSION['username_pengunjung'] = $username_pengunjung;
            ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
              <script>
                Swal.fire({
                  icon: 'success',
                  title: 'Login Sukses - Algomate',
                  text: 'Hai AlgoFriends, Selamat Belajar (^  O  ^)!',
                  confirmButtonText: 'OK'
                }).then(function() {
                  window.location = 'index.php';
                });
              </script>

                <?php
                } else {
                ?>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
              <script>
                Swal.fire({
                  icon: 'error',
                  title: 'Login Gagal',
                  text: 'Hai, Coba Periksa Username Atau Passwordnya ya!',
                  confirmButtonText: 'OK'
                }).then(function() {
                  window.location = 'login.php';
                });
              </script>
            <?php
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
                        <br><br><br><br><br>
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
