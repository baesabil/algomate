<?php
// Mulai sesi untuk mengakses variabel sesi
session_start();

// Include the database connection file
include 'koneksi.php';

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Check if the parameter id_materi exists in the URL
if (isset($_GET['id_materi'])) {
    // Get the id_materi from the URL
    $id_materi = $_GET['id_materi'];

    // Ambil nilai username_pengunjung dari sesi (session)
    if (isset($_SESSION['username_pengunjung'])) {
        $username_pengunjung = $_SESSION['username_pengunjung'];
    } else {
        // Jika username_pengunjung tidak tersedia dalam sesi, Anda dapat menentukan pesan kesalahan atau mengarahkan pengguna kembali ke halaman sebelumnya.
        echo "Tidak ada ID pengunjung yang tersedia.";
        exit;
    }

    // Gunakan Prepared Statements untuk menghindari SQL injection
    $query = "SELECT judul, deskripsi,link FROM materi WHERE id_materi = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_materi);
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah data ditemukan berdasarkan id_materi
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $judul_materi = $row['judul'];
        $deskripsi = $row['deskripsi'];
    } else {
        // Tampilkan pesan kesalahan jika data tidak ditemukan
        echo "Materi tidak ditemukan.";
        exit;
    }
} else {
    // Tampilkan pesan kesalahan jika tidak ada parameter id_materi dalam URL
    echo "Tidak ada materi yang dipilih.";
    exit;
}
?>

<!-- ... (Kode HTML Anda yang sudah ada sebelumnya) -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>AlgoMate</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <!-- Add this inside <head> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
     <style>
            /* CSS untuk membuat tulisan putih pada elemen a dengan kelas navbar-brand */
            a.navbar-bra {
                color: white;
            }
            footer {
                background-color: #f2f2f2; /* Warna abu-abu muda */
            }

        </style>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-bra" href="index.php"><b>AlgoMate</b></a> <style>
                   
                    </style>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                <style>
                 
                </style>
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="materi.php">Course</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="https://discord.com/channels/1134028565529243698/1134028656390438992">discussion</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="login.php">LogOut</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1><?php echo $judul_materi; ?></h1>
                        <!-- Hapus kode berikut, karena konten ini untuk tampilan halaman materi, bukan file.php -->
                        <!--
                        <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
                        <span class="meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on August 24, 2023
                        </span>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </header>   
        <!-- Post Content-->
    <article class="artikel" style="margin: 120px 120px 120px 120px; text-align: justify;">
        <!-- Display the description of the selected materi -->
        <div>
            <a href='materi.php'>
                <i class='fas fa-arrow-left'></i>
            </a>
            <p style="font-size: 12px;"><?php echo $deskripsi; ?></p><br><br>
        </div>
        <!-- Text "Apakah kamu sudah paham? uji pemahamanmu sekarang" in the right corner -->
        <div style="text-align: right;">
            <p>
                Apakah kamu sudah paham? Uji pemahamanmu sekarang
            </p>
        </div>

        <!-- Button "Mulai Ujian" that links to exam.php -->
        <div style="text-align: right;">
             <a href="exam.php?id_materi=<?php echo $id_materi; ?>&username_pengunjung=<?php echo $username_pengunjung; ?>" class="btn btn-primary">Mulai Ujian</a>
        </div>

    </article>
      <!-- Footer-->
      <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div>
                    <h1><center>AlgoMate</center></h1>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="small text-center text-muted fst-italic">Copyright &copy; AlgoMate 2023</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

  
<?php
// Close the database connection
$stmt->close();
$conn->close();
?>
