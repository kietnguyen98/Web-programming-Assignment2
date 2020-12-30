<!DOCTYPE html>
<html lang="en-US">
<head>
  <title>Sign Up !</title>
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
    $(document).ready(function () {
      $('#username').on('keyup', function () {
        var usernameLength = $('#username').val().length
        if((usernameLength > 20 || usernameLength < 8) && usernameLength != 0){
          $('#usernameError').removeClass('text-success').addClass('text-danger')
          $('#usernameError').html('Tên tài khoản phải từ 8 đến 20 kí tự !');
        }else{
          if($('#username').val() != ""){
            $('#usernameError').removeClass('text-danger').addClass('text-success')
            $('#usernameError').html('Tên tài khoản phù hợp');
          }
          else{
            $('#usernameError').removeClass('text-danger').removeClass('text-success')
            $('#usernameError').html('');
          }
        }
      });

      $('#password').on('keyup', function () {
        var passwordLength = $('#password').val().length
        if((passwordLength > 20 || passwordLength < 10) && passwordLength != 0){
          $('#passwordError').removeClass('text-success').addClass('text-danger')
          $('#passwordError').html('Mật khẩu phải từ 10 đến 20 kí tự !');
        }else{
          if($('#password').val() != ""){
            $('#passwordError').removeClass('text-danger').addClass('text-success')
            $('#passwordError').html('Mật khẩu phù hợp');
          }
          else{
            $('#passwordError').removeClass('text-danger').removeClass('text-success')
            $('#passwordError').html('');
          }
        }
      });

      $('#confirmPassword').on('keyup', function () {
        if (($('#password').val() == $('#confirmPassword').val()) && $('#password').val() != "") {
          $('#checkPasswordMatching').removeClass('text-danger').addClass('text-success')
          $('#checkPasswordMatching').html('Chính xác');
        } else {
          if ($('#confirmPassword').val() != "") {
            $('#checkPasswordMatching').removeClass('text-success').addClass('text-danger')
            $('#checkPasswordMatching').html('Chưa chính xác !');
          } else {
            $('#checkPasswordMatching').removeClass('text-success').removeClass('text-danger')
            $('#checkPasswordMatching').html('');
          }
        }
      });
    });
  </script>        
  <script defer src="checkform.js"></script>
</head>
<?php include('insert.php'); ?>
<body>
  <div class="container-fluid bg">
    <section>
    <div class="row justify-content-center">
      <div class="col-md-auto">
        <h4 class="display-4 text-center text-primary text-uppercase"><b>Đăng kí</b></h4>
        <p class="text-center text-white text-uppercase">Đăng kí ngay hôm nay để trở thành thành viên của chúng
          tôi
          và
          được hưởng nhiều ưu đãi đi kèm !</p>
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
          <div class="form-group">
            <label for="confrimPassword">Nhập lại mật khẩu</label>
            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
            <div class="text-right" id="checkPasswordMatching"></div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Địa chỉ Email</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
              placeholder="Enter email" required>
            <small class="form-text text-muted">Chúng tôi sẽ không chia sẻ E-mail này cho bất cứ
              ai.</small>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
            <label class="form-check-label" for="exampleCheck1">Tôi đồng ý với toàn bộ <a href="#">điều khoản</a> của
              công ty.</label>
          </div>
          <br>
          <button type="submit" class="btn btn-primary btn-block" name="signUpButton">Đăng ký</button>
          <br>
          <div>Bạn đã có tài khoản ? <a href="../SignIn/index.php" class="text-primary">Đăng nhập ngay!</a></div>
        </form>
      </div>
    </div>
  </div>
  </section>
  
  
  <div class="modal fade" id="redirect-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Đăng kí</h4>
        </div>
        <div class="modal-body">
          <p>Chúc mừng, bạn đã đăng kí thành công !</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <a href="../SignIn/index.php" class="btn btn-primary" role="button">Đến đăng nhập</a>
        </div>
      </div>
    </div>
  </div>
  
</div>

<div>
  <?php include_once("../footer/index.php"); ?>
</div>

</body>
</html>