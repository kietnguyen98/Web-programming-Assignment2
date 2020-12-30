<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Contact</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="lienhe.css">
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
</head>

<body>
    <div>
        <?php include_once("../header/index.php"); ?>
    </div>

    <div>
        <?php include("contactServer.php"); ?>
    </div>
    <div class="container-fluid" id="container">
        <div class="row" id="row-container">
            <div class="col-md-7" id="col-right">
                <p class="display-4 text-center text-light">Hãy tận hưởng cuộc sống của bạn nhé !</p>
                <p class="text-center text-light">Khám phá vẻ đẹp của Việt Nam qua những điều nhỏ nhất <i
                        class="fa fa-heart" aria-hidden="true"></i></p>
                <img src="travel.jpg" alt="anh bia" class="img-fluid">
            </div>
            <div class="col-md-5" id="col-left">
                <br>
                <h4 class="text-center text-light text-uppercase">Đăng kí nhận thông báo mới nhất</h4>
                <p class="text-center text-light">Để lại thông tin của bạn ở đây để nhận thông báo mới nhất
                    từ
                    chúng tôi !</p>
                <form class="form-container text-right" method="POST" action="index.php" id="form-submit">
                    <div class="form-group text-left">
                        <label for="name">Tên của bạn</label>
                        <input type="text" class="form-control" id="name-input" placeholder="Tên của bạn..."
                            name="guestName" required>
                    </div>
                    <div class="form-group text-left">
                        <label for="email">Email của bạn</label>
                        <input type="email" class="form-control" id="email-input" aria-describedby="emailHelp"
                            placeholder="Nhập email..." name="guestEmail" required>
                    </div>
                    <button type="submit" name="guestSubmitBtn" class="btn btn-success">Gửi thông tin</button>
                </form>
                <br>
                <h4 class="text-center text-light text-uppercase">Hoặc liên lạc với chúng tôi qua</h4>
                <br>
                <div class="row" id="contact-info">
                    <div class="col-sm-6">
                        <h6 class="text-left text-light text-uppercase">Địa điểm</h6>
                        <p class="text-left text-light">268 Lý Thường Kiệt, Phường 14, Quận 10,
                            Thành
                            phố Hồ Chí Minh</p>
                        <h6 class="text-left text-light text-uppercase">Số điện thoại</h6>
                        <p class="text-left text-light">0123456789</p>
                    </div>
                    <div class="col-sm-6 text-left">
                        <h6 class="text-left text-light text-uppercase">Các trang mạng xã hội</h6>
                        <div class="py-3 d-flex align-items-center">
                            <div class="col-md-12 text-left">
                                <a href="#"><i class="fab fa-facebook fa-lg text-primary mr-2"></i></a>
                                <a href="#"><i class="fab fa-twitter-square fa-lg text-primary mr-2"></i></a>
                                <a href="#"><i class="fab fa-google-plus-g fa-lg text-primary mr-2"></i></a>
                                <a href="#"><i class="fab fa-instagram fa-lg text-primary mr-2"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in fa-lg text-primary mr-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="success-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-success">Gửi thông tin liên hệ thành công</h4>
                    </div>
                    <div class="modal-body text-info">
                        <p>Chúng tôi đã nhận được thông tin liên lạc của bạn và sẽ kết nối với bạn sớm nhất có thể ! Chúc bạn một ngày tốt lành nhé ^^</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
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