<?php
  session_start();
  require 'config/functions.php';

  if(isset($_POST['masuk'])){
    $uname = $_POST['uname'];
    $pass  = $_POST['pass'];
    // cek apakah username yang di input ada / tidak
    $cek   = mysqli_query($conn, "SELECT * FROM tb_user WHERE uname = '$uname' ");
    // Jika username ada jalankan kode berikut
    if (mysqli_num_rows($cek) === 1) {
      $row = mysqli_fetch_assoc($cek);
      // Cek level jika A (Admin)
      if($row['level'] === 'A'){
        // melakukan password_verify
        if(password_verify($pass, $row['password'])){
          // Set Session
          $_SESSION['logAdmin'] = true;
          $_SESSION['uid'] = $row['uid'];
        }
      // Cek jika button ingat saya diklik set cookie
        if (isset($_POST['remember'])) {
          setcookie('id', $row['uid'], time() + 2500);
          setcookie('keyA', hash('sha256', $row['uid']), time() + 2500);
        }
        header("Location:admin/?hal=");
        exit;
      // Cek level jika R (Resepsionis)
      } if($row['level'] === 'R'){
      // melakukan password_verify
      if (password_verify($pass, $row['password'])) {
        // Set Session
        $_SESSION['logRes'] = true;
        $_SESSION['uid'] = $row['uid'];
      }
      // Cek jika button ingat saya diklik set cookie
      if (isset($_POST['remember'])) {
        setcookie('id', $row['uid'], time() + 2500);
        setcookie('keyR', hash('sha256',
          $row['uid']
        ), time() + 2500);
      }
      header("Location:resepsionis/?hal=");
      exit;
      }
    }
  }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Boostrap 5.2 -->
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <!-- CSS -->
  <link rel="stylesheet" href="assts/css/style.css">
</head>
<!-- Internal Style Sheet -->
<style>
  html,
  body {
    height: 100%;
  }

  body {
    display: flex;
    align-items: center;
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: #f5f5f5;
  }

  .form-signin {
    max-width: 330px;
    padding: 15px;
  }

  .form-signin .form-floating:focus-within {
    z-index: 2;
  }

  .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }

  .form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }

  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }

  .b-example-divider {
    height: 3rem;
    background-color: rgba(0, 0, 0, .1);
    border: solid rgba(0, 0, 0, .15);
    border-width: 1px 0;
    box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }

  .b-example-vr {
    flex-shrink: 0;
    width: 1.5rem;
    height: 100vh;
  }

  .bi {
    vertical-align: -.125em;
    fill: currentColor;
  }

  .nav-scroller {
    position: relative;
    z-index: 2;
    height: 2.75rem;
    overflow-y: hidden;
  }

  .nav-scroller .nav {
    display: flex;
    flex-wrap: nowrap;
    padding-bottom: 1rem;
    margin-top: -1px;
    overflow-x: auto;
    text-align: center;
    white-space: nowrap;
    -webkit-overflow-scrolling: touch;
  }

  
</style>

<body>
  <div class="container text-center">
    <main class="form-signin w-100 m-auto">
      <form method="post">
        <img class="mb-4" src="assets/img/" alt="ICON" width="150" height="165">
        <h1 class="h3 mb-3 fw-normal">SILAKAN LOGIN</h1>

        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" placeholder="Masukan Username" name="uname">
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass">
          <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me" name="remember"> Ingat saya
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="masuk">Masuk</button>
        <p class="mt-5 mb-3 text-muted">Bimatio_ &copy; 2023</p>
      </form>
    </main>
  </div>
  <!-- Script Boostrap .js -->
  <script src="assets/js/bootstrap.js"></script>
</body>

</html>