<?php
// Include the database connection file
include 'koneksi.php';

// Periksa apakah ada pengiriman data form dengan method POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil nilai id_materi dan username_pengunjung dari form
    $id_materi = $_POST['id_materi'];
    $username_pengunjung = $_POST['username_pengunjung'];

    // Query untuk mengambil pertanyaan dan kunci jawaban dari tabel "soal" berdasarkan "id_materi" yang diberikan
    $query = "SELECT id_soal, kunci_jawaban FROM soal WHERE id_materi = $id_materi";
    $result = mysqli_query($conn, $query);

    // Inisialisasi variabel untuk menghitung jumlah jawaban yang benar
    $jawaban_benar = 0;

    // Inisialisasi array untuk menyimpan nomor soal yang jawabannya salah
    $jawaban_salah = array();

    // Periksa apakah ada baris yang dikembalikan
    if (mysqli_num_rows($result) > 0) {
        // Loop melalui setiap baris dan periksa jawaban pengguna
        while ($row = mysqli_fetch_assoc($result)) {
            $id_soal = $row['id_soal'];
            $kunci_jawaban = $row['kunci_jawaban'];

            // Periksa apakah ada jawaban yang dikirimkan untuk pertanyaan ini
            if (isset($_POST['jawaban'][$id_soal])) {
                $jawaban_pengguna = $_POST['jawaban'][$id_soal];

                // Periksa apakah jawaban pengguna benar
                if ($jawaban_pengguna === $kunci_jawaban) {
                    // Jika benar, tambahkan 1 pada jumlah jawaban yang benar
                    $jawaban_benar++;
                } else {
                    // Jika salah, tambahkan nomor soal pada array jawaban_salah
                    $jawaban_salah[] = $id_soal;
                }
            }
        }

            $jumlah_soal = mysqli_num_rows($result);
            $total_nilai = ($jawaban_benar / $jumlah_soal) * 100;

  } else {
        echo "Tidak ada soal yang ditemukan.";
    }
}

?>

<!-- ... (Bagian lain dari kode HTML) ... -->

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
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
</head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-bra" href="index.php"><b>AlgoMate</b></a> <style>
                    .navbar-bra {
                        color: black !important;
                    }
                    </style>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                <style>
                    .navbar-nav .nav-link {
                        color: black !important;
                    }
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
        </nav><br.\><br>
        <style>
    /* Custom CSS styles for the header */
    header.kapi {
            background-color: white !important; /* Set background color to white */
        }
    
    header.masthead h1, header.masthead .subheading, header.masthead p {
        color: black; /* Set text color to green */
        text-align: left; /* Align text to the left */
    }

    header.masthead .site-heading {
        float: left; /* Float the site-heading to the left */
    }
    
    header.masthead img {
        float: right; /* Float the image to the right */
        margin-top: 10px !important;
    }
    .btn-primary {
    border-radius: 50px; /* Mengatur border menjadi lingkaran dengan radius 50px */
    padding: 10px 20px; /* Mengatur padding horizontal dan vertical pada tombol */
  }
  h3 {
    color: #007BFF; /* Warna biru muda dalam kode hex */
  }

  footer {
    background-color: #f2f2f2; /* Warna abu-abu muda */
  }
  </style>

<!-- exam.php -->
<header class="kapi"><br><br><br>
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading"><br><br><br>
                    <h1>AlgoFriends</h1><br><br>
                    <span class="subheading"><b>Mari kita evaluasi hasil belajarmu</b></span><br><br>
                    <br>
                    <?php
                    // Periksa apakah parameter id_materi telah diterima dari URL
                    if (isset($_GET['id_materi'])) {
                        // Ambil nilai id_materi dari URL parameter
                        $id_materi = $_GET['id_materi'];

                        // Tampilkan tombol kembali dengan hyperlink ke halaman materi
                        echo "<a class='btn btn-primary' href='file.php?id_materi=$id_materi'>Kembali Ke Halaman Materi</a>";
                    } else {
                        echo "ID Materi tidak ditemukan.";
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-2 col-lg-4 col-xl-5">
                <!-- Add your image here -->
                <img src="https://img.freepik.com/free-vector/man-with-business-coins-chat-bubbles_24877-53502.jpg?size=626&ext=jpg&ga=GA1.1.25915723.1659874066&semt=ais" width="400" height="420" alt="Foto Pembelajaran">
            </div>
        </div>
    </div>
</header>

<!-- exam.php -->

<!-- exam.php -->
<article class="artikel" style="margin: 120px 120px 120px 120px; text-align: justify;">
<form method="post">
    <?php
    if (isset($_GET['id_materi']) && isset($_GET['username_pengunjung'])) {
        // Ambil nilai id_materi dan username_pengunjung dari URL parameter
        $id_materi = $_GET['id_materi'];
        $username_pengunjung = $_GET['username_pengunjung'];
    
        // Periksa apakah ada data pengunjung dengan username_pengunjung yang sesuai di tabel "pengunjung"
        $query_pengunjung = "SELECT * FROM pengunjung WHERE username_pengunjung = '$username_pengunjung'";
        $result_pengunjung = mysqli_query($conn, $query_pengunjung);
    
    if (mysqli_num_rows($result_pengunjung) > 0) {
    // Query untuk mengambil pertanyaan dan opsi dari tabel "soal" berdasarkan "id_materi" yang diberikan
    $query = "SELECT id_soal, pertanyaan, a, b, c, kunci_jawaban FROM soal WHERE id_materi = $id_materi";
    $result = mysqli_query($conn, $query);    

    $questions = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $questions[] = $row;
    }

    // Acak urutan pertanyaan dan opsi jawaban
    shuffle($questions);

    // Periksa apakah ada baris yang dikembalikan
    if (mysqli_num_rows($result) > 0) {
        // Loop melalui setiap baris dan tampilkan pertanyaan serta opsi
        foreach ($questions as $question) {
            $id_soal = $question['id_soal'];
            $pertanyaan = $question['pertanyaan'];
            $optionA = $question['a'];
            $optionB = $question['b'];
            $optionC = $question['c'];
            $kunci_jawaban = $question['kunci_jawaban'];

            // Tampilkan pertanyaan
            echo '<b><p id="soal-' . $id_soal . '">' . $pertanyaan . '</p></b>';

            $options = array($optionA, $optionB, $optionC);

            // Acak urutan opsi jawaban
            shuffle($options);

            
            // Tampilkan opsi pilihan ganda sebagai radio button
            echo "<input type='radio' name='jawaban[$id_soal]' value='a'> A. $optionA<br>";
            echo "<input type='radio' name='jawaban[$id_soal]' value='b'> B. $optionB<br>";
            echo "<input type='radio' name='jawaban[$id_soal]' value='c'> C. $optionC<br><br>";
        }
    
        // Perbaikan 1: Tambahkan hidden input untuk menyimpan id_materi dan username_pengunjung
        echo "<input type='hidden' name='id_materi' value='$id_materi'>";
        echo "<input type='hidden' name='username_pengunjung' value='$username_pengunjung'>";

        // Perbaikan 2: Tambahkan tombol submit
        echo "<button type='submit' class='btn btn-primary'>Submit</button>";
    } else {
        echo "Tidak ada soal yang ditemukan.";
    }
}
} else {
    echo "ID Pengunjung tidak ditemukan di tabel pengunjung.";
}

    ?>
</form>
</article>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function showResultSweetAlert(totalNilai, jawabanSalah) {
        Swal.fire({
            icon: 'success',
            title: 'Total Nilai: ' + totalNilai,
            text: 'Jawaban Salah: ' + jawabanSalah.join(", "),
            confirmButtonText: 'Penjelasan'
        }).then(function () {
            window.location = 'jawaban.php?id_materi=<?php echo $id_materi; ?>&username_pengunjung=<?php echo $username_pengunjung; ?>';
        });
    }
</script>

<!-- Panggil fungsi showResultSweetAlert() di bawah kode JavaScript -->
<?php
echo "<script>";
echo "showResultSweetAlert($total_nilai, " . json_encode($jawaban_salah) . ");";
echo "</script>";
?>

      <!-- Footer-->
      <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div>
                    <h1><center>AlgoMate</center></h1>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
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