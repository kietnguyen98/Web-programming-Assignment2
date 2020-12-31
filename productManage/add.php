<?php

require './libs/function.php';

// Nếu người dùng submit form
if (!empty($_POST['add']))
{
    // Lay data
    $data['product_id']        = isset($_POST['product_id']) ? $_POST['product_id'] : '';
    $data['product_name']         = isset($_POST['product_name']) ? $_POST['product_name'] : '';
    $data['product_img'] = addslashes(file_get_contents($_FILES["image"]["tmp_name"])) ;
    $data['product_description']    = isset($_POST['product_description']) ? $_POST['product_description'] : '';
    $data['product_startdate']    = isset($_POST['product_startdate']) ? $_POST['product_startdate'] : '';  
    $data['product_enddate']    = isset($_POST['product_enddate']) ? $_POST['product_enddate'] : '';
    $data['product_price']    = isset($_POST['product_price']) ? $_POST['product_price'] : '';

    // Neu ko co loi thi insert
    $sql=add($data['product_id'], $data['product_name'],$data['product_img'],$data['product_description'],$data['product_startdate'],$data['product_enddate'],$data['product_price']);
    // Trở về trang danh sách
    header("location: list.php");
}

disconnect_db();
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>Add Product</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col align-self-center">
                <h1 class="text-center text-info">Add Product</h1>
                <hr style="width:100%;text-align:center;">
                <form method="post" action="add.php" enctype="multipart/form-data">
                    <table cellspacing="0" cellpadding="10">
                        <tr>
                            <td>Mã Tour</td>
                            <td>
                                <input type="number" name="product_id"
                                    value="<?php echo !empty($data['product_id']) ? $data['product_id'] : ''; ?>"
                                    required />
                                <?php if (!empty($errors['product_id'])) echo $errors['product_id']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tên Tour</td>
                            <td>
                                <input type="text" name="product_name"
                                    value="<?php echo !empty($data['product_name']) ? $data['product_name'] : ''; ?>"
                                    required />
                                <?php if (!empty($errors['product_name'])) echo $errors['product_name']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Ảnh minh họa</td>
                            <td>
                                <input type="file" name="image" id="image" required>
                                <?php if (!empty($errors['product_img'])) echo $errors['product_img']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Miêu tả về Tour</td>
                            <td>
                                <textarea type="text" name="product_description" rows="10" cols="100"
                                    placeholder="<?php echo !empty($data['product_description']) ? $data['product_description'] : ''; ?>"
                                    / required></textarea>
                                <?php if (!empty($errors['product_description'])) echo $errors['product_description']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày xuất phát</td>
                            <td>
                                <input type="date" name="product_startdate"
                                    value="<?php echo !empty($data['product_startdate']) ? $data['product_startdate'] : ''; ?>"
                                    required />
                                <?php if (!empty($errors['product_startdate'])) echo $errors['product_startdate']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Ngày kết thúc</td>
                            <td>
                                <input type="date" name="product_enddate"
                                    value="<?php echo !empty($data['product_enddate']) ? $data['product_enddate'] : ''; ?>"
                                    required />
                                <?php if (!empty($errors['product_enddate'])) echo $errors['product_enddate']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Giá Tour</td>
                            <td>
                                <input type="text" name="product_price"
                                    value="<?php echo !empty($data['product_price']) ? $data['product_price'] : ''; ?>"
                                    required />
                                <?php if (!empty($errors['product_price'])) echo $errors['product_price']; ?>
                            </td>
                        </tr>

                    </table>
                    <hr style="width:100%;text-align:center;">
                    <div class="text-right" style="padding-bottom: 50px;">
                        <input class="btn btn-primary" id="add" onclick="window.location = 'list.php'" type="button"
                            value="Quay về" />
                        <input class="btn btn-success" id="save" type="submit" name="add" value="Lưu thông tin" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>