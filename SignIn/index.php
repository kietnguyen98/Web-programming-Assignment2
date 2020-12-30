<!DOCTYPE html>
<html lang="en-US">
<?php include('signIn.php'); ?>
<head>
  <title>Sign In !</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">  

  <script>
  </script>
  <script defer src="checkform.js"></script>
</head>

<body>
  <div class="container-fluid bg">
    <section>
    <div class="row justify-content-center">
      <div class="col-md-auto">
        <h4 class="display-4 text-center text-primary text-uppercase"><b>Đăng Nhập</b></h4>
        <br>
        <br>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-sm-5 col-md-5">
        <form class="form-container" name="signUpForm" id="signUpForm" method="POST" action="index.php">
        <?php include('errors.php');  ?>
        <div class="form-group">
            <label for="userName">Tên tài khoản</label> 
            <input type="text" class="form-control" name="username" id="username" placeholder="User Name" required>
            <div class="text-right" id="usernameError"></div>
          </div>
          <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            <div class="text-right text-danger" id="passwordError"></div>
          </div>
          <br>
          <button type="submit" class="btn btn-primary btn-block" name="signInButton">Đăng nhập</button>
          <a href="../homepage" class="btn btn-success btn-block" name="signInButton">Truy cập với tư cách khách (Guest)</a>
          <br>
          <div>Bạn chưa có tài khoản ? <a href="../SignUp/index.php" class="text-primary">Đăng kí ngay!</a></div>
        </form>
      </div>
    </div>
  </div>
  </section>
</div>

<div>
  <?php include_once("../footer/index.php"); ?>
</div>

</body>
</html>