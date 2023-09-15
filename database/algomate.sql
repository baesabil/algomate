-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2023 pada 04.39
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `algomate`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(5) NOT NULL,
  `nama_admin` char(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
('102', 'Sultan Hafiz', 'sabila', 'sabila'),
('4', 'SABILA PRAMESTI', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` varchar(50) NOT NULL,
  `id_soal` varchar(50) NOT NULL,
  `jawaban` varchar(50) NOT NULL,
  `skor` varchar(4) NOT NULL,
  `username_pengunjung` varchar(10) NOT NULL,
  `id_materi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_materi`
--

CREATE TABLE `kategori_materi` (
  `id_kategori_materi` varchar(30) NOT NULL,
  `nama_kategori_materi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_materi`
--

INSERT INTO `kategori_materi` (`id_kategori_materi`, `nama_kategori_materi`) VALUES
('KM2', 'Algoritma'),
('KM3', 'Struktur Dasar Bahasa Pemrograman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` varchar(50) NOT NULL,
  `id_kategori_materi` varchar(30) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(100) NOT NULL,
  `link` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `id_kategori_materi`, `judul`, `deskripsi`, `file`, `link`) VALUES
('1', 'KM2', 'Pengantar Algorima ', '<p><b>Apa itu Algoritma dan Algoritma Pemrograman</b> <br><br>\r\nSecara tunggal, algoritma memang erat kaitannya dengan matematika dan ilmu komputer. Algoritma secara umum dipahami sebagai instruksi yang dirancang sistematis untuk menyelesaikan masalah. Sedangkan, Algoritma Pemrograman adalah dasar / fondasi suatu program pada komputer berupa langkah sistmematis dalam menyelesaikan masalah. <br><br>\r\nAlgoritma pemrograman adalah serangkaian langkah atau instruksi yang ditetapkan untuk menyelesaikan masalah atau tugas tertentu. Algoritma ini dirancang secara logis dan sistematis, dengan tujuan agar mudah diikuti dan diimplementasikan oleh komputer atau sistem pemrosesan data lainnya.Dengan kata lain, algoritma pemrograman adalah dasar logika dalam menciptakan suatu program pada komputer agar bisa berjalan sesuai perintah.Algoritma pemrograman digunakan dalam berbagai bidang, termasuk komputasi, matematika, dan ilmu data, untuk memecahkan masalah yang bervariasi dari sederhana hingga kompleks. <br><br>\r\n<b>Fungsi Algoritma Pemrograman</b><br><br>\r\nAlgoritma bertujuan untuk menyelesaikan berbagai macam kendala, mulai dari yang sederhana hingga yang kompleks. Dengan menggunakan algoritma, kita dapat memecahkan masalah dengan cara yang lebih terstruktur dan sistematis, sehingga memudahkan kita dalam mencari solusi.  Fungsi utama dari algoritma pemrograman adalah membantu programmer untuk merancang dan menulis kode yang efektif, efisien, dan mudah dipahami. Namun lebih dari itu adapun beberapa fungsi lainnya dari algoritma pemrograman: <br><br>\r\n1.	Menyelesaikan permasalahan rumit dalam program dan meminimalisir kesalahan pada perhitungan matematis tingkat tinggi<br>\r\n2.	Mampu menyederhanakan program yang besar menjadi program yang sederhana, sehingga penggunaannya lebih efektif dan efisien.<br>\r\n3.	Dapat digunakan secara berulang, kita tidak perlu report menuliskan lagi program yang sama sehingga memudahkan kita dalam pembuatan program.<br><br> \r\n<b>Contoh Dan Cara Kerja Algoritma Pemrograman</b><br><br>\r\nBerbagai kendala dapat diselesaikan lewat penyusunan algoritma, salah satu contoh permasalahan yang sering menggunakan algoritma adalah permasalahan matematis seperti: <br><br>\r\nTemukan nilai X dari persamaan X = 10 + 5Y<br>\r\nAlgoritmanya adalah: <br>\r\n•	Mulai<br>\r\n•	Tentukan nilai X<br>\r\n•	Hitung nilai X = 10 + 5Y<br>\r\n•	Cetak nilai x dan y<br>\r\n•	Selesai<br>\r\n \r\nContoh penggunaan algoritma dalam penghitungan matematis yang lebih praktikal seperti menghitung rapot atau kelulusan nilai murid dalam data nilai satu kelas. <br><br>Contohnya, jika terdapat data dengan nama dan nilai ujian murid dari skala 0-100, berapa jumlah murid yang dinyatakan lulus dan tidak lulus jika batas minimum kelulusannya adalah 75. Jika nilai siswa sama dengan atau lebih besar dari 75 maka siswa dinyatakan lulus, tetapi jika nilai siswa di bawah 75 maka dinyatakan tidak lulus. <br>\r\nAlgoritmanya adalah: <br>\r\n•	Baca nama dan nilai siswa<br>\r\n•	Jika nilai >= 75 maka<br>\r\n•	Keterangan = lulus<br>\r\n•	Tetapi jika<br>\r\n•	Keterangan <75 = tidak lulus<br>\r\n•	Tulis nama dan keterangan<br>\r\n•	Selesai<br><br>\r\n \r\nTetapi, tahukah kamu, algoritma tidak hanya terjadi dan dipakai dalam kedua contoh perhitungan matematis seperti di atas. Karena algoritma pada dasarnya bertujuan untuk memberikan urutan logis dalam menyelesaikan masalah, maka di kehidupan sehari-hari pun, algoritma juga kita terapkan lho tanpa sadar! <br>\r\n<br> \r\nDari berbagai contoh di atas, dapat kita simpulkan cara kerja algoritma pemrograman berasal dari deskripsi sebuah proses / urutan mengerjakan sesuatu yang disusun dengan sederet aksi. Sederhananya cara kerja algoritma di pemrograman melalui 3 tahap yaitu, input - proses - output. Input berisikan notasi bahasa pemrograman atau yang dinamakan program. Proses terjadi pada komputer yang mengidentifikasi bahasa pemrograman tersebut. Output nya adalah jawaban / hasil dari pemrosesan. <br><br>\r\nSehingga dapat disimpulkan bahwa, algoritma merupakan langkah-langkah menyelesaikan masalah, sedangkan program adalah implementasi / realisasi algoritma dalam bahasa pemrograman.</p>\r\n\r\n', 'gambar.jpeg', 'www.coksko.com'),
('3', 'KM3', 'Operator dalam Pemrograman', '\r\n    <p>Setelah belajar mengenai tipe data, hal yang tak kalah penting adalah <strong>operator</strong>. Operator adalah simbol atau tanda khusus dalam pemrograman yang digunakan untuk melakukan operasi tertentu pada variabel atau nilai. Operator dapat digunakan untuk melakukan operasi aritmatika, perbandingan, dan logika. Berikut adalah penjelasan tentang operator-aritmatika, operator-perbandingan, dan operator-logika, beserta contoh penggunaannya:</p>\r\n\r\n    <h3>1. Operator Aritmatika</h3>\r\n    <p>Operator aritmatika digunakan untuk melakukan operasi matematika pada nilai numerik. Beberapa operator aritmatika umum adalah:</p>\r\n    <ul>\r\n        <li>Penjumlahan (+): Menambahkan dua nilai.</li>\r\n        <li>Pengurangan (-): Mengurangkan nilai kedua dari nilai pertama.</li>\r\n        <li>Perkalian (*): Mengalikan dua nilai.</li>\r\n        <li>Pembagian (/): Membagi nilai pertama dengan nilai kedua.</li>\r\n        <li>Modulus (%): Mengembalikan sisa dari pembagian dua nilai.</li>\r\n    </ul>\r\n\r\n    <p><strong>Contoh penggunaan operator aritmatika:</strong></p>\r\n    <pre><code>\r\na = 10;\r\nb = 3;\r\n\r\nhasil_penjumlahan = a + b;       // 10 + 3 = 13\r\nhasil_pengurangan = a - b;       // 10 - 3 = 7\r\nhasil_perkalian = a * b;         // 10 * 3 = 30\r\nhasil_pembagian = a / b;         // 10 / 3 = 3.3333...\r\nhasil_modulus = a % b;           // 10 % 3 = 1\r\n    </code></pre>\r\n\r\n    <h3>2. Operator Perbandingan</h3>\r\n    <p>Operator perbandingan digunakan untuk membandingkan dua nilai dan menghasilkan nilai boolean (True atau False). Beberapa operator perbandingan umum adalah:</p>\r\n    <ul>\r\n        <li>Sama dengan (==): Memeriksa apakah kedua nilai sama.</li>\r\n        <li>Tidak sama dengan (!=): Memeriksa apakah kedua nilai berbeda.</li>\r\n        <li>Lebih besar dari (>): Memeriksa apakah nilai pertama lebih besar dari nilai kedua.</li>\r\n        <li>Lebih kecil dari (<): Memeriksa apakah nilai pertama lebih kecil dari nilai kedua.</li>\r\n        <li>Lebih besar atau sama dengan (>=): Memeriksa apakah nilai pertama lebih besar atau sama dengan nilai kedua.</li>\r\n        <li>Lebih kecil atau sama dengan (<=): Memeriksa apakah nilai pertama lebih kecil atau sama dengan nilai kedua.</li>\r\n    </ul>\r\n\r\n    <p><strong>Contoh penggunaan operator perbandingan:</strong></p>\r\n    <pre><code>\r\nx = 5;\r\ny = 8;\r\n\r\nsama_dengan = x == y;           // False\r\ntidak_sama_dengan = x != y;     // True\r\nlebih_besar = x > y;            // False\r\nlebih_kecil = x < y;            // True\r\nlebih_besar_sama_dengan = x >= y;   // False\r\nlebih_kecil_sama_dengan = x <= y;   // True\r\n    </code></pre>\r\n\r\n    <h3>3. Operator Logika</h3>\r\n    <p>Operator logika digunakan untuk mengkombinasikan beberapa nilai boolean dan menghasilkan nilai boolean baru. Operator logika umum adalah:</p>\r\n    <ul>\r\n        <li>AND (dan): Menghasilkan <code>True</code> jika kedua nilai boolean adalah <code>True</code>.</li>\r\n        <li>OR (atau): Menghasilkan <code>True</code> jika salah satu dari dua nilai boolean adalah <code>True</code>.</li>\r\n        <li>NOT (negasi): Menghasilkan <code>True</code> jika nilai boolean yang diberikan adalah <code>False</code>, dan sebaliknya.</li>\r\n    </ul>\r\n\r\n    <p><strong>Contoh penggunaan operator logika:</strong></p>\r\n    <pre><code>\r\np = true;\r\nq = false;\r\n\r\nhasil_and = p && q;         // False\r\nhasil_or = p || q;           // True\r\nhasil_not_p = !p;         // False\r\nhasil_not_q = !q;         // True\r\n    </code></pre>\r\n\r\n    <p>Operator-aritmatika, operator-perbandingan, dan operator-logika sangat penting dalam pemrograman karena membantu dalam pengambilan keputusan dan pemrosesan data. Pemahaman yang baik tentang operator dan penggunaannya membantu meningkatkan efisiensi dan ketepatan dalam menulis kode program.</p>\r\n\r\n', '', 'http://localhost/tomas/production/tambah-materi.ph'),
('4', 'KM3', 'Tipe Data', '<h1><b>Hai AlgoFriends</b></h1>dalam perancangan suatu program, kamu harus mengenali dengan baik tentang <b>Tipe Data</b>\r\nTipe data merupakan konsep penting dalam pemrograman yang digunakan untuk menentukan jenis nilai yang dapat disimpan dan dioperasikan oleh suatu variabel atau objek dalam sebuah program. \r\n<h2><b>Pengertian Tipe Data</b></h2><br>\r\nTipe data adalah klasifikasi nilai yang dapat disimpan dalam variabel atau diterima oleh suatu fungsi. Tipe data mendefinisikan ukuran memori dan jenis operasi yang dapat dilakukan pada nilai tersebut. Berikut adalah beberapa tipe data dan contohnya<br><br>\r\n\r\n<b>1. Tipe Data Integer</b><br>\r\n   Tipe data integer digunakan untuk menyimpan bilangan bulat tanpa pecahan.\r\n   Contohnya dalam bahasa python adalah : <br>\r\n   <center><b> # Deklarasi variabel dengan tipe data integer<br>\r\n      umur = 25<br>\r\n      jumlah_mahasiswa = 100<br>\r\n      ```</b></center><br>\r\n  \r\n<b>2. Tipe Data Float</b>\r\n   <br>Tipe data float digunakan untuk menyimpan bilangan desimal atau pecahan.\r\n   Contohnya dalam bahasa python adalah : <br>\r\n   <center><b># Deklarasi variabel dengan tipe data float<br>\r\n      nilai_mtk = 8.5<br>\r\n      harga_barang = 12.99<br>\r\n      ```</b></center><br>\r\n\r\n<b>3. Tipe Data String</b><br>\r\n   Tipe data string digunakan untuk menyimpan teks atau karakter.\r\n   Contohnya dalam bahasa python adalah : <br>\r\n   <center><b> # Deklarasi variabel dengan tipe data string<br>\r\n   nama = John Doe<br>\r\n   alamat = Jl. Raya No. 123<br>\r\n  </b></center><br>\r\n\r\n   <b>4. Tipe Data Boolean</b><br>\r\n   Tipe data boolean hanya memiliki dua nilai, yaitu True (benar) dan False (salah). Digunakan untuk operasi logika.\r\n   Contohnya dalam bahasa python adalah : <br>\r\n   <center><b> # Deklarasi variabel dengan tipe data boolean<br>\r\n   is_student = True<br>\r\n   has_car = False<br>\r\n</b></center><br>\r\n\r\n<b>5. Tipe Data List</b><br>\r\n   Tipe data list digunakan untuk menyimpan kumpulan nilai dalam satu variabel. List bersifat mutable, artinya isinya dapat diubah.\r\n   Contohnya dalam bahasa python adalah : <br>\r\n   <center><b> # Deklarasi variabel dengan tipe data list<br>\r\n   buah = [\"apel\", \"mangga\", \"pisang\"]<br>\r\n   nilai_ujian = [85, 90, 78, 92]<br>\r\n</b></center><br>\r\n\r\n<b>6. Tipe Data Tuple</b><br>\r\n   Tipe data tuple mirip dengan list, tetapi bersifat immutable, artinya isinya tidak dapat diubah setelah dideklarasikan.\r\n   Contohnya dalam bahasa python adalah : <br>\r\n   <center><b># Deklarasi variabel dengan tipe data tuple<br>\r\n   hari = (\"Senin\", \"Selasa\", \"Rabu\", \"Kamis\", \"Jumat\")<br>\r\n   point = (2, 5)<br>\r\n</b></center><br>\r\n\r\n<b>7. Tipe Data Set</b><br>\r\n   Tipe data set digunakan untuk menyimpan himpunan nilai unik tanpa urutan. Set tidak mengizinkan nilai duplikat.\r\n   Contohnya dalam bahasa python adalah : <br>\r\n   <center><b># Deklarasi variabel dengan tipe data set<br>\r\n   angka_genap = {2, 4, 6, 8, 10}<br>\r\n   huruf_vokal = {\"a\", \"e\", \"i\", \"o\", \"u\"}<br>\r\n</b></center><br>\r\n\r\n<b>8. Tipe Data Dictionary:</b><br>\r\n   Tipe data dictionary digunakan untuk menyimpan pasangan key-value (kunci-nilai). Setiap kunci harus unik dan nilainya dapat diakses melalui kunci tersebut.\r\n   Contohnya dalam bahasa python adalah : <br>\r\n   <center><b># Deklarasi variabel dengan tipe data dictionary<br>\r\n   biodata = {\"nama\": \"John Doe\", \"umur\": 25, \"alamat\": \"Jl. Raya No. 123\"}<br>\r\n   nilai_mahasiswa = {\"Matematika\": 90, \"Fisika\": 85, \"Kimia\": 78}<br>\r\n</b></center><br>\r\n\r\nSetiap bahasa pemrograman memiliki tipe data yang mirip atau serupa dengan yang disebutkan di atas. Pengetahuan tentang tipe data ini akan sangat berguna saat Anda bekerja dengan pemrograman, karena Anda akan sering berinteraksi dengan berbagai jenis data dalam pengembangan aplikasi.<br>\r\n', 'WhatsApp Image 2022-06-05 at 7.00.44 PM.jpeg', 'http://localhost/tomas/production/tambah-materi.ph');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` varchar(50) NOT NULL,
  `id_soal` varchar(50) NOT NULL,
  `id_pengunjung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` varchar(10) NOT NULL,
  `nama_pengunjung` varchar(30) NOT NULL,
  `username_pengunjung` varchar(10) NOT NULL,
  `password_pengunjung` varchar(8) NOT NULL,
  `nilai` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `nama_pengunjung`, `username_pengunjung`, `password_pengunjung`, `nilai`) VALUES
('01', 'Sabila Pramesti PH', 'baesabil', 'sabila', 0),
('02', 'M Sultan Hafiz Al-Kahfi', 'kapi', 'kapi', 0),
('04', 'Algo Friend Testing', 'algo', 'baesabil', 0),
('3', 'Fauzan Abdus Salam', 'fauzan', 'fauzan', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id_soal` varchar(5) NOT NULL,
  `id_materi` varchar(10) NOT NULL,
  `pertanyaan` text NOT NULL,
  `kunci_jawaban` varchar(4) NOT NULL,
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id_soal`, `id_materi`, `pertanyaan`, `kunci_jawaban`, `a`, `b`, `c`) VALUES
('O1', '4', '1. Operator dalam pemrograman digunakan untuk melakukan apa?', 'c', 'Menampilkan hasil program', 'Menggunakan variabel dalam program', 'Melakukan operasi tertentu pada variabel atau nilai'),
('O2', '4', 'Apa jenis operasi yang dapat dilakukan dengan operator aritmatika?', 'c', 'Operasi logika', 'Operasi perbandingan', 'Operasi matematika'),
('O3', '4', 'Operator mana yang digunakan untuk mengalikan dua nilai?', 'b', '(+)', '(*)', '(==)'),
('O4', '4', '4. Apa hasil dari operasi berikut? `8 % 3`', 'a', '2', '3', '4'),
('O5', '4', 'Operator perbandingan menghasilkan nilai boolean. Apa nilai dari operasi berikut? `10 >= 5`', 'a', 'true', 'false', 'bukan operator perbandingan'),
('SP1', '1', 'Apa yang dimaksud dengan algoritma?', 'c', 'Sebuah perangkat lunak', 'Serangkaian instruksi yang terstruktur untuk menyelesaikan masalah', 'Sebuah bahasa pemrograman'),
('SP2', '1', ' Apa tujuan dari menggunakan algoritma dalam pemrograman?', 'c', 'Menghasilkan gambar animasi', 'Meningkatkan kecepatan koneksi internet', 'Menyelesaikan masalah secara efisien'),
('SP3', '1', 'Algoritma yang berfungsi untuk mencari nilai terbesar dari sejumlah bilangan disebut?', 'c', 'Algoritma Pencarian', 'Algoritma Pengurutan', 'Algoritma Maksimum'),
('SP5', '1', 'Apa yang dimaksud dengan kompleksitas waktu dalam analisis algoritma?', 'b', 'Jumlah memori yang digunakan oleh algoritma', 'Jumlah operasi yang dilakukan oleh algoritma dalam kaitannya dengan ukuran masukan', 'Jumlah baris kode dalam algoritma'),
('SP6', '1', 'apa maksud kode ini C++ ', 'b', 'increment', 'decrement', 'pertamambahan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indeks untuk tabel `kategori_materi`
--
ALTER TABLE `kategori_materi`
  ADD PRIMARY KEY (`id_kategori_materi`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD UNIQUE KEY `id_soal` (`id_soal`),
  ADD UNIQUE KEY `id_pengunjung` (`id_pengunjung`);

--
-- Indeks untuk tabel `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
