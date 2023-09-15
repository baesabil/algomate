<?php
// Include the database connection file
include 'koneksi.php';

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>DASHBOARD ALGOMATE</title>
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
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="login.php">LogOut</a></li>
                    </ul>
                </div>
            </div>
        </nav><br.\><br>
        <!-- Page Header-->
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

<header class="kapi"><br><br><br>
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading"><br><br><br>
                    <h1>AlgoMate</h1><br><br>
                    <span class="subheading"><b>Hai AlgoFriend, Mau belajar Apa hari ini?</b></span><br><br><br>
                    <br><a class="btn btn-primary" href="materi.php">Mulai Belajar</a>
                </div>
            </div>
            <div class="col-md-2 col-lg-4 col-xl-5">
                <!-- Add your image here -->
                <img src="assets/bglogin.png">
            </div>
        </div>
    </div>
</header>
        <!--main menu!-->
        <!-- Main Content-->
       
     <br><br><br>   <br>    
    <!-- Main Content -->
    <div class="materi">
    <div style="text-align: center;">
        <h1 style="font-size: 35px; margin-bottom: 15px;">PILIHAN MATERI</h1>
    </div>
    <br><br><br>

    <?php
    // Query to select data from the database
    $query = "SELECT file, judul, nama_kategori_materi, id_materi FROM materi INNER JOIN kategori_materi ON materi.id_kategori_materi = kategori_materi.id_kategori_materi";
    $result = mysqli_query($conn, $query);

    // Check if there are any records returned from the query
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Get the title, category, and file data from the row
            $judul_materi = $row['judul'];
            $kategori_materi = $row['nama_kategori_materi'];
            $gambar = $row['file']; // URL or path to the image
            $id_materi = $row['id_materi'];
    ?>

    <style>
        .post-preview {
            display: inline-block;
            vertical-align: top;
            width: 30%;
            margin-right: 3%;
            margin-left: 15%;
            
        }

        .post-preview img {
            display: block;
            width: 150px;
            height: auto;
            margin-bottom: 10px;
            
        }

        .post-title {
            font-size: 20px;
            margin: 0;
        }

        .post-meta {
            font-size: 16px;
            margin: 0;
            margin-bottom: 4%;
        }
    </style>

    <!-- Post preview -->
    <div class="post-preview">
        <a href="file.php?id_materi=<?php echo $id_materi; ?>">
            <!-- Display the image, title, and category data -->
            <img src="assets/buku.png" alt="Gambar Materi" width="150">
            <h2 class="post-title"><?php echo $judul_materi; ?></h2>
        </a>
        <p class="post-meta">
            <?php echo $kategori_materi; ?>
        </p>
    </div>
    <!-- Divider -->
    <?php
        }

    } else {
        echo "No records found.";
    }
    ?>
</div>

        <!--end main menu!-->
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

  
<?php
// Close the database connection
mysqli_close($conn);
?>
