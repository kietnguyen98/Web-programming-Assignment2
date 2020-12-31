<!DOCTYPE html>
<html lang="en-US">
<?php 
include('product.php');
$select_slide_data = "select product_id, product_name, product_img, product_description from products";
$select_slide_data_result = mysqli_query($connect_handle, $select_slide_data);
$total_data = mysqli_num_rows($select_slide_data_result);
$select_card_data = "select product_id, product_name, product_img from products";
$select_card_data_result = mysqli_query($connect_handle, $select_card_data);
?>
<head>
    <title>Service-information</title>
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
</head>

<body>
    <div><?php include_once("../header/index.php"); ?></div>

    <div class="container-fluid" style="padding-top: 40px;">
        <section>
            <div class="text-center" id="headline-container">
                <h3 class="display-4 text-center">Thông tin về các dịch vụ đặt Tour</h3>
                <p class="text-center">Thỏa mãn niềm đam mê khám phá của bạn với những Tour du lịch cực kỳ hấp dẫn</p>
            </div>
            <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                    <?php for($i = 0;$i <= $total_data - 1; $i++): ?>
                        <li data-target="#demo" data-slide-to="<?php echo $i;?>" 
                            <?php  if($i == 0):?>
                                <?php echo  'class="active"'; ?>
                            <?php endif ?>">
                        </li>
                    <?php endfor ?>
                </ul>
                <div class="carousel-inner">
                    <?php if(mysqli_num_rows($select_slide_data_result) > 0):?>
                        <?php while($slide_data = mysqli_fetch_assoc($select_slide_data_result)):?>
                            <div class="carousel-item  
                                <?php  if($slide_data['product_id'] == '001'):?>
                                    <?php echo 'active'; ?>
                                <?php endif ?>
                                ">
                                <img src="data:image/jpg;base64,<?php echo base64_encode($slide_data['product_img'])?>" id="slide-img" style="opacity: 0.9;" alt="<?php echo $slide_data['product_name']; ?>" class="img-fluid">
                                <div class="carousel-caption text-light">
                                    <h1 class="text-uppercase"><?php echo $slide_data['product_name']; ?></h1>
                                    <p><strong>Mã Tour : </strong><?php echo $slide_data['product_id']; ?> </p>
                                    <p class="text-left"><?php echo $slide_data['product_description']; ?></p>
                                    <a class="btn btn-danger" href="../ProductDetail/index.php?productId=<?php echo $slide_data['product_id'];?>">Xem thêm</a>
                                </div>
                            </div>
                        <?php endwhile ?>
                    <?php endif ?>
                </div>
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </section>
    <section>
        <div class="text-center" id="headline-container">
            <h3 class="display-4 text-center">Thông tin về các dịch vụ của chúng tôi</h3>
            <p class="text-center">Đa dạng dịch vụ & tiện ích kèm theo đó là những khuyến mãi vô cùng hấp dẫn</p>
        </div>
        <div class="row">
            <?php while($card_data = mysqli_fetch_assoc($select_card_data_result)): ?>
                <div class="col-lg-3 col-md-3 mb-4">
                    <div class="card text-center">
                        <img src="data:image/jpg;base64,<?php echo base64_encode($card_data['product_img'])?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-dark text-uppercase"><?php echo $card_data['product_name']; ?></h5>
                            <p class="card-text text-center text-dark"><strong>Mã Tour : </strong><?php echo $card_data['product_id']; ?></p>
                            <p class="card-text text-left">Đắm mình trong những danh lam thắng cảnh đặc sắc hàng đầu
                                Việt
                                Nam, nơi lưu
                                giữ những nét đẹp tinh túy nhất của Dân Tộc.</p>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-outline-danger" href="../ProductDetail/index.php?productId=<?php echo $card_data['product_id'];?>">Xem ngay !</a>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </section>
    </div>
    <div><?php include_once("../footer/index.php"); ?></div>
</body>

</html>