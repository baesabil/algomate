<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login Admin Algomate</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
   <div class="bg order-1 order-md-2 float-left" style="background-image: url('images/bg.png');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <div class="mb-4">
              <h3><b>Algomate - Admin Login</b></h3>
            <br>
              <p class="mb-4">Hai, Selamat Datang Di AlgoMate</p>
            </div> <br><br><br>
            <form action="#" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username">

              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password">
                
              </div>
              
              <!--<div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
              </div>-->

              <input type="submit" value="Log In" class="btn btn-block btn-primary btn-sm">
              <!--<span class="d-block text-center my-4 text-muted">&mdash; or &mdash;</span>
              
              <div class="social-login">
                <a href="#" class="facebook btn d-flex justify-content-center align-items-center">
                  <span class="icon-facebook mr-3"></span> Login with Facebook
                </a>
                <a href="#" class="twitter btn d-flex justify-content-center align-items-center">
                  <span class="icon-twitter mr-3"></span> Login with  Twitter
                </a>
                <a href="#" class="google btn d-flex justify-content-center align-items-center">
                  <span class="icon-google mr-3"></span> Login with  Google
                </a>
              </div>-->
            </form>
                <?php
              session_start();
              include "koneksi.php";
              if (isset($_POST['submit'])) {

                $username = $_POST['username'];
                $password = $_POST['password'];
              
                $sql = "SELECT * FROM pengunjung WHERE username='$username' && password='$password'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);

                if (mysqli_num_rows($result) == 1) {
                  $_SESSION['username'] = $username;

              ?>
                  <script language="javascript">
                    alert("Success Login!");
                    document.location = 'pengunjung/index.html'
                  </script>
                <?php
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
          </div>
        </div>
      </div>
    </div>

  </div>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>