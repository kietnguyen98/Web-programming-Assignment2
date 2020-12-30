<!DOCTYPE html>
<html lang="vi">
<?php 
include('../SignUp/insert.php');
$select_card_data = "select product_id, product_name, product_img from products";
$select_card_data_result = mysqli_query($connect_handle, $select_card_data);
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content=" Ứng dụng du lịch số 1 Việt Nam">
  <meta name="author" content="team 20">
  <title>Wetour - Ứng dụng du lịch số 1 Việt Nam</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
    integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
  <div><?php include_once("../header/index.php"); ?></div>

  <!-- Page Content -->
  <div class="container-fluid">
    <div class="jumbotron banner">
      <div class="wordart slate"><span class="text">Chào mừng đến với Wetour</span></div>
    </div>

    <div class="row text-center">

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <img class="image" src="./service.png" alt="" width="100" height="100">
          <div class="card-body">
            <h4 class="card-title">Dịch vụ</h4>
            <p class="card-text">Dịch vụ đặt tour du lịch với nhiều loại hình tour hấp dẫn</p>
          </div>
          <div class="card-footer">
            <a href="../ServiceInfomation" class="btn bg-success">Chi tiết</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <img class="image" src="./people.png" alt="" width="100" height="100">
          <div class="card-body">
            <h4 class="card-title">Về chúng tôi</h4>
            <p class="card-text">Thông tin chi tiết về nhân sự của công ty của chúng tôi</p>
          </div>
          <div class="card-footer">
            <a href="../AboutUs" class="btn bg-success">Chi tiết</a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <img class="image" src="./contact.png" alt="" width="100" height="100">
          <div class="card-body">
            <h4 class="card-title">Liên lạc</h4>
            <p class="card-text">Hệ thống chăm sóc khách hàng nhanh chóng và thuận tiện</p>
          </div>
          <div class="card-footer">
            <a href="../Contact" class="btn bg-success">Chi tiết</a>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>

  <div><?php include_once("../footer/index.php"); ?></div>
</body>

</html>