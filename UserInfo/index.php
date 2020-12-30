<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>User Infomation</title>
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

            $('#password').on('keyup', function () {
                var passwordLength = $('#password').val().length
                if ((passwordLength > 20 || passwordLength < 10) && passwordLength != 0) {
                    $('#passwordError').removeClass('text-success').addClass('text-danger')
                    $('#passwordError').html('Mật khẩu phải từ 10 đến 20 kí tự !');
                } else {
                    if ($('#password').val() != "") {
                        $('#passwordError').removeClass('text-danger').addClass('text-success')
                        $('#passwordError').html('Mật khẩu phù hợp');
                    }
                    else {
                        $('#passwordError').removeClass('text-danger').removeClass('text-success')
                        $('#passwordError').html('');
                    }
                }
            });

            $('#confirmPassword').on('keyup', function (e) {
                if (($('#password').val() == $('#confirmPassword').val()) && $('#password').val() != "") {
                    $('#checkPasswordMatching').removeClass('text-danger').addClass('text-success')
                    $('#checkPasswordMatching').html('Chính xác');
                } else {
                    if ($('#confirmPassword').val() != "") {
                        $('#checkPasswordMatching').removeClass('text-success').addClass('text-danger')
                        $('#checkPasswordMatching').html('Chưa chính xác !');
                        e.preventDefault();
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
<?php include('update.php'); ?>

<body>
    <div>
        <?php include_once("../header/index.php"); ?>
    </div>
    <div class="container-fluid" style="padding-top: 80px;">
        <section>
            <div class="row justify-content-center">
                <div class="col-md-auto">
                    <h4 class="display-4 text-center text-primary text-uppercase"><b>Thông tin cá nhân của tôi</b></h4>
                    <h6 class="text-center text-dark">Xin chào <span>
                            <h5>
                                <?php echo $_SESSION['username']; 
                                ?>
                            </h5>
                        </span></h6>
                </div>
            </div>
            <div class="row" style="padding-top:20px;">
                <div class="col-sm-5 col-md-4">
                    <?php 
                        $username = $_SESSION['username'];
                        $select_account_query = "select * from account where username = '$username'";
                        $select_account_result = mysqli_query($connect_handle, $select_account_query); 
                        $account_data = mysqli_fetch_assoc($select_account_result);
                        $account_id = $account_data['account_id'];
                        $select_user_query = "select * from user_information where user_id = '$account_id'";
                        $select_user_result = mysqli_query($connect_handle, $select_user_query); 
                        $user_data = mysqli_fetch_assoc($select_user_result);
                    ?>
                    <div class="card">
                        <?php 
                            if(($user_data['avatar']) != NULL):
                        ?>
                            <img class="card-img-top" src="data:image/jpg;base64,<?php echo base64_encode($user_data['avatar'])?>" alt="User Avatar">
                        <?php else:?>
                            <i class="text-center text-muted"><strong>Bạn chưa có ảnh đại diện, hãy cập nhật ảnh đại diện của mình !</strong></i>
                        <?php endif ?>
                        <div class="card-header">
                            <h5 class="text-center text-dark">Thông tin cá nhân</h5>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item text-left"><span class="pull-left"><strong>Tên: </strong>
                                    <?php if($user_data['firstname']===NULL): ?>
                                    <i class="text-muted">
                                        <?php echo "chưa có thông tin"; ?>
                                    </i>
                                    <?php else: echo $user_data['firstname'];?>
                                    <?php endif ?>
                                </span></li>
                            <li class="list-group-item text-left"><span class="pull-left"><strong>Họ và tên lót:
                                    </strong>
                                    <?php if($user_data['lastname']===NULL): ?>
                                    <i class="text-muted">
                                        <?php echo "chưa có thông tin"; ?>
                                    </i>
                                    <?php else: echo $user_data['lastname'];?>
                                    <?php endif ?>
                                </span></li>
                            <li class="list-group-item text-left"><span class="pull-left"><strong>Giới tính: </strong>
                                    <?php if($user_data['gender']===NULL): ?>
                                    <i class="text-muted">
                                        <?php echo "chưa có thông tin"; ?>
                                    </i>
                                    <?php else: 
                                    if($user_data['gender'] == 'male'): echo 'Nam'; 
                                    else: echo 'Nữ';?>
                                    <?php endif ?>
                                    <?php endif ?>
                                </span></li>
                            <li class="list-group-item text-left"><span class="pull-left"><strong>Số điện thoại:
                                    </strong>
                                    <?php if($user_data['phone']===NULL): ?>
                                    <i class="text-muted">
                                        <?php echo "chưa có thông tin"; ?>
                                    </i>
                                    <?php else: echo $user_data['phone'];?>
                                    <?php endif ?>
                                </span></li>
                            <li class="list-group-item text-left"><span class="pull-left"><strong>Ngày sinh: </strong>
                                    <?php if($user_data['bdate']===NULL): ?>
                                    <i class="text-muted">
                                        <?php echo "chưa có thông tin"; ?>
                                    </i>
                                    <?php else: echo date('d/m/Y', strtotime($user_data['bdate']));?>
                                    <?php endif ?>
                                </span></li>
                            <li class="list-group-item text-left"><span class="pull-left"><strong>Địa chỉ: </strong>
                                    <?php if($user_data['address']===NULL): ?>
                                    <i class="text-muted">
                                        <?php echo "chưa có thông tin"; ?>
                                    </i>
                                    <?php else: echo $user_data['address'];?>
                                    <?php endif ?>
                                </span></li>
                        </ul>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center text-primary">Thông tin tài khoản</h5>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item text-left text-primary"><span class="pull-left"><strong>Vai trò:
                                    </strong>
                                    <?php echo $account_data['role'];?>
                                </span> </li>
                            <li class="list-group-item text-left"><span class="pull-left"><strong>Tên tài khoản:
                                    </strong>
                                    <?php echo $account_data['username'];?>
                                </span>
                            </li>
                            <li class="list-group-item text-left"><span class="pull-left"><strong>Email: </strong>
                                    <?php echo $account_data['email']; ?>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-sm-5 col-md-8">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab"
                                href="#nav-profile" role="tab" aria-controls="nav-home" aria-selected="true">Cập nhật
                                thông tin cá nhân</a>
                            <a class="nav-item nav-link" id="nav-account-tab" data-toggle="tab" href="#nav-account"
                                role="tab" aria-selected="false">Cập nhật thông tin tài
                                khoản</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                            aria-labelledby="nav-profile-tab">
                            <hr>
                            <form class="form-container" name="updateInfo" id="updateInfo" method="POST" enctype="multipart/form-data"
                                action="index.php?accountId=<?php echo $account_id; ?>">
                                <div class="form-group">
                                    <label for="avatar">Ảnh đại diện của bạn : </label>
                                    <input type="file" name="image" id="image" placeholder="Chọn ảnh đại diện">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="FirstName">Tên</label>
                                        <input type="text" class="form-control" name="firstname" placeholder="Tên"
                                            required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="LastName">Họ và tên lót</label>
                                        <input type="text" class="form-control" name="lastname"
                                            placeholder="Họ và Tên lót" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="gender">Giới tính : </label><br>
                                    <label class="radio-inline"><input type="radio" name="gender" value="male" checked>
                                        Nam </label>
                                    <label class="radio-inline"><input type="radio" name="gender" value="female"> Nữ
                                    </label>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="number" class="form-control" name="phone"
                                            placeholder="Số điện thoại" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="birthdate">Ngày sinh</label>
                                        <input type="date" class="form-control" name="birthdate" placeholder="ngày sinh"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" placeholder="Địa chỉ"
                                        required>
                                </div>
                                <br>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success" name="updateInfoButton">Cập
                                        nhật</button>
                                    <button type="reset" class="btn btn-secondary" name="resetButton">Làm mới</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-account" role="tabpanel" aria-labelledby="nav-account-tab">
                            <hr>
                            <form class="form-container" name="updateAccount" id="updateAccount" method="POST"
                                action="index.php?accountId=<?php echo $account_id; ?>">
                                <div class="form-group">
                                    <label for="password">Mật khẩu mới</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Password" required>
                                    <div class="text-right text-danger" id="passwordError"></div>
                                </div>
                                <div class="form-group">
                                    <label for="confrimPassword">Nhập lại mật khẩu mới</label>
                                    <input type="password" class="form-control" id="confirmPassword"
                                        placeholder="Confirm Password" required>
                                    <div class="text-right" id="checkPasswordMatching"></div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ Email mới ( có thể trùng với địa chỉ Email hiện tại )</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                        aria-describedby="emailHelp" placeholder="Enter email" required>
                                </div>
                                <br>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success" name="updateAccountButton">Cập
                                        nhật</button>
                                    <button type="reset" class="btn btn-secondary" name="resetButton">Làm mới</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    <div class="modal fade" id="success-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cập nhật thông tin</h5>
                </div>
                <div class="modal-body">
                    <p class="text-success"><strong>Chúc mừng, bạn đã cập nhật thành công !</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="error-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cập nhật thông tin</h5>
                </div>
                <div class="modal-body">
                    <p class="text-danger"><strong>Có Lỗi xảy ra: Địa chỉ mail này đã có người sử dụng !</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    </div>

    <div style="padding-top: 40px;">
        <?php include_once("../footer/index.php"); ?>
    </div>

</body>

</html>