<!DOCTYPE html>
<html lang="en-US">

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
    <div>
        <?php include_once("../header/index.php"); ?>
    </div>
    <?php 
    $product_id = $_GET['productId'];
    $select_query = "select * from products where product_id='$product_id'";
    $select_data_result = mysqli_query($connect_handle, $select_query);
    $product_data = mysqli_fetch_assoc($select_data_result);
    ?>
    <div class="container-fluid" style="padding-top: 80px;">
        <div class="card">
            <div class="card-header text-center display-4" id="Name">
                <?php echo $product_data['product_name']; ?>
            </div>
            <img class="card-img-top img-fluid" src="data:image/jpg;base64,<?php echo base64_encode($product_data['product_img'])?>" alt="Card image cap">
            <div class="card-body" id="title-description">
                <h4 class="card-title" id="title">
                    <?php echo $product_data['product_name']; ?> (Mã Tour:
                    <?php echo $product_data['product_id']; ?>)
                </h4>
                <p class="card-text" id="description">
                    <?php echo $product_data['product_description']; ?>
                </p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item" id="trip-time-price">
                    <h6><i class="far fa-calendar-alt"></i> Ngày khởi hành :
                        <?php echo date('d/m/Y', strtotime($product_data['product_startdate'])); ?>
                    </h6>
                    <h6><i class="far fa-calendar-alt"></i> Ngày kết thúc :
                        <?php echo date('d/m/Y', strtotime($product_data['product_enddate'])); ?>
                    </h6>
                    <h6><i class="fas fa-dollar-sign"></i> Mức giá :
                        <?php echo $product_data['product_price']; ?> VND
                    </h6>
                </li>
                <li class="list-group-item">
                    <div class="text-right">
                        <a href="#" class="btn btn-success">Liên hệ nhà cung cấp dịch vụ</a>
                        <a href="#" class="btn btn-primary">Đặt Tour</a>
                    </div>
                </li>
            </ul>
            <?php include("comment.php"); ?>
            <div class="card-body">
                <form name="commentForm" action="index.php?productId=<?php echo $product_data['product_id'];?>"
                    method="POST">
                    <h5>Bình luận</h5>
                    <?php 
                    $product_id = $product_data['product_id'];
                    $get_comment_query = "select a_id, rating_date, comment_content from rating_and_comment where p_id='$product_id'";
                    $get_comment_result = mysqli_query($connect_handle, $get_comment_query);
                    ?>
                    <?php if(mysqli_num_rows($get_comment_result) > 0):?>
                    <?php while($comment = mysqli_fetch_assoc($get_comment_result)):?>
                    <div class="form-group" id="commentSection">
                        <div class="card">
                            <strong class="card-header">
                                <?php 
                                $account_id = $comment['a_id'];
                                $get_account_query = "select username from account where account_id='$account_id'";
                                $get_account_result = mysqli_query($connect_handle, $get_account_query);
                                $account = mysqli_fetch_assoc($get_account_result);
                                $get_user_data = "select avatar from user_information where user_id = '$account_id'";
                                $get_user_data_result = mysqli_query($connect_handle, $get_user_data);
                                $user_data = mysqli_fetch_assoc($get_user_data_result);
                                if(($user_data == NULL) or ($user_data['avatar'] == NULL)){
                                    echo '<img alt="Blank User Avatar" style="height: 30px; width: 30px; border-radius:50% ;  border: 2px solid #555;" src="../productImg/blank-avatar.jpg">';
                                }else{
                                    echo '<img alt="User Avatar" style="height:30px ; width : 30px; border-radius: 50%;" src="data:image/jpg;base64,'.base64_encode($user_data['avatar']).'"/>';
                                }
                                echo " ";
                                echo $account['username'];
                                ?>
                            </strong>
                            <div class="card-body">
                                <p class="card-subtitle text-muted"><i>Ngày bình luận: <?php echo date('d/m/Y', strtotime($comment['rating_date'])); ?></i></p>
                                <p class="card-text"><?php echo $comment['comment_content'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endwhile ?>
                    <?php endif ?>
                    <?php if(mysqli_num_rows($get_comment_result) == 0):?>
                        <p class="text-left text-muted"><i>Chưa có bình luận nào !</i></p>
                    <?php endif ?>
                    <?php if(isset($_SESSION['username'])): ?>
                        <div class="form-group">
                            <label><strong>Viết bình luận :</strong></label>
                            <textarea class="form-control" name="comment" rows="4" placeholder="bình luận của bạn..."
                                required></textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" name="commentBtn">Đăng lên</button>
                        </div>
                    <?php endif ?>
                </form>
            </div>
        </div>
    </div>

    <div>
        <?php include_once("../footer/index.php"); ?>
    </div>
</body>

</html>