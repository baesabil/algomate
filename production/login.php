<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title> Algomate - Admin Login</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css  -->
  <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login" style="background-color: #ffffff;">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
   
    <div class="login_wrapper" style="text-align: left;">
  <div class="animate form login_form">
    <center>
      <h1 style="color: black;"><b>AlgoMate - Login</b></h1>
    </center>
    <section class="login_content">
      <form method="POST">
      <div>
        <input type="text" class="form-control" placeholder="Username" required="" name="username" style="border: none; border-bottom: 1px solid #000000; outline: none; background: transparent;">
      </div><br>
      <div>
        <input type="password" class="form-control" placeholder="Password" required="" name="password" style="border: none; border-bottom: 1px solid #000000; outline: none; background: transparent;">
      </div>
        <div>
          <!-- <a class="btn btn-default submit" href="index.html">Log in</a> -->
          <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
          <br><br><br><br><br><br>
          <input type="submit" value="Log in" name="submit" class="btn btn-default submit btn-info" style="float:none !important;margin-left:none !important;">

        </div>

       <div class="clearfix"></div>

        <div class="separator">
          <!-- <p class="change_link">New to site?
              <a href="#signup" class="to_register"> Create Account </a>
            </p>

            <div class="clearfix"></div> -->
          <br />

          <div>
            <p>©2022 Gentelella Alela - Algomate</p>
          </div>
        </div>
        <div style="position: fixed; bottom: 0; right: 0;">
                  <img src="images/bglogin.png" style="width: 500px;">
        </div>
      </form>
    </section>
  </div>
</div>

          <?php
          session_start();
          include "koneksi.php";
          if (isset($_POST['submit'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];
           
            $sql = "SELECT * FROM admin WHERE username='$username' && password='$password'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            if (mysqli_num_rows($result) == 1) {
              $_SESSION['username'] = $username;

          ?>
              <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
              <script>
                Swal.fire({
                  icon: 'success',
                  title: 'Login Sukses - Algomate',
                  text: 'Hai Admin, Semangat Bekerja (^  O  ^)!',
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
        </section>
      </div>

      <!-- <div id="register" class="animate form registration_form">
        <section class="login_content">
          <form>
            <h1>Create Account</h1>
            <div>
              <input type="text" class="form-control" placeholder="Username" required="" />
            </div>
            <div>
              <input type="email" class="form-control" placeholder="Email" required="" />
            </div>
            <div>
              <input type="password" class="form-control" placeholder="Password" required="" />
            </div>
            <div>
              <a class="btn btn-default submit" href="index.html">Submit</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">Already a member ?
                <a href="#signin" class="to_register"> Log in </a>
              </p>

              <div class="clearfix"></div>
              <br />

              <div>
                <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
              </div>
            </div>
          </form>
        </section>
      </div> -->
    </div>
  </div>
</body>

</html>