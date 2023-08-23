<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Login </title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  <!--<img src="images/bg.png">-->
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">

      <div class="animate form login_form">
       <!--<center>
          <img src="images/logo.png" alt="..." width="200px">
        </center> -->
        <section class="login_content">

          <form method="POST">
            <h1>Login Form</h1>
            <div>
              <input type="text" class="form-control" placeholder="Username" required="" name="username" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" name="password" />
            </div>
            <div>
              <input type="submit" value="Log in" name="login_submit" class="btn btn-default submit" style="float:none !important;margin-left:none !important;">
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">New to site?
                <a href="#signup" class="to_register"> Create Account </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>

                <p>©2022 Gentelella Alela - Algomate.</p>
              </div>
            </div>
          </form>
          <?php
          session_start();
          include "koneksi.php";
          if (isset($_POST['login_submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            if (mysqli_num_rows($result) == 1) {
              $_SESSION['username'] = $username;
              header("Location: index.php"); // Redirect to index.php after successful login
              exit();
            } else {
          ?>
              <script language="javascript">
                alert("Username / Password Failed!");
                document.location = 'login.php'
              </script>
          <?php
            }
          }
          ?>
        </section>
      </div>

      <div class="animate form registration_form">
        <section class="login_content">
          <form method="POST">
            <h1>Create Account</h1>
            <div>
              <input type="text" class="form-control" placeholder="Username" required="" name="username" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" name="password" />
            </div>
            <div>
              <input type="submit" value="Submit" name="register_submit" class="btn btn-default submit">
            </div>

            <div class="clearfix"></div>

            <?php
            include "koneksi.php";

            if (isset($_POST["register_submit"])) {
              $username = $_POST['username'];
              $password = $_POST['password'];

              $query = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";

              $sql = mysqli_query($conn, $query) or die(mysqli_error($conn));

              if ($sql) {
                echo "Berhasil input Data<br><a href='login.php'> <br> Kembali ke Halaman login</a>";
              } else {
                echo "Gagal Input Data";
              }
            }
            ?>

            <div class="separator">
              <p class="change_link">Already a member ?
                <a href="#signin" class="to_register"> Log in </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><i class="fa fa-paw"></i> AlgoMate!</h1>
              </div>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>
</body>

</html>
