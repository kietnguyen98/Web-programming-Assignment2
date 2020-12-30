<?php
require './libs/function.php';
global $conn;
connect_db();
$sql = "select count(product_id) as total from products";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 3;
$total_page = ceil($total_records / $limit);
if ($current_page > $total_page){
    $current_page = $total_page;
}
else if ($current_page < 1){
    $current_page = 1;
}
$start = ($current_page - 1) * $limit;
$result = mysqli_query($conn, "SELECT * FROM products LIMIT $start, $limit");

$function=$result;
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>PRODUCT LIST</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <div class="container-fluid" style="padding-top: 80px;">
    <h1 class="display-4 text-dark text-center">PRODUCTS LIST</h1>
    <hr style="width:70%;text-align:center;">
    <div class="text-center">
        <button class="btn btn-primary" id="add" onclick="window.location='add.php'">Add Product</button>
    </div>
    <br>
        <table class="table table-sm table-bordered">
            <thead>
            <tr class="table-success text-center">
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">ImgDirectory</th>
                <th scope="col">Description</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Price</th>
                <th scope="col">Option</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($function as $item){ ?>
            <tr>
                <td>
                    <?php echo $item['product_id']; ?>
                </td>
                <td>
                    <?php echo $item['product_name']; ?>
                </td>
                <td>
                    <?php echo $item['product_img']; ?>
                </td>
                <td>
                    <?php echo $item['product_description']; ?>
                </td>
                <td>
                    <?php echo date('d/m/Y', strtotime($item['product_startdate']));?>
                </td>
                <td>
                    <?php echo date('d/m/Y', strtotime($item['product_enddate']));?>
                </td>
                <td>
                    <?php echo $item['product_price']; ?>
                </td>
                <td>
                    <form class="option" method="post" action="delete.php">
                        <a id="fix" class="btn btn-success btn-block"
                            onclick="window.location = 'edit.php?product_id=<?php echo $item['product_id']; ?>'">Update</a>
                        <input id="fix" type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>" />
                        <br>
                        <button class="btn btn-danger btn-block" id="delete" onclick="return confirm('Are you sure?');"
                            type="submit" name="delete">Delete </button>
                    </form>
                </td>
            </tr>
            <?php } ?>
            </tbody>
        </table>
        <br>
        <div>
            <nav>
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <a class="page-link" href="<?php echo 'list.php?page='.($current_page-1) ?>"
                            tabindex="-1">Previous</a>
                    </li>
                    <?php for($i = 1; $i <= $total_page; $i++):?>
                    <?php if($i == $current_page): ?>
                    <li class="page-item active"><a class="page-link" href="<?php echo 'list.php?page='.$i ?>">
                            <?php echo $i ?>
                        </a></li>
                    <?php else: ?>
                    <li class="page-item"><a class="page-link" href="<?php echo 'list.php?page='.$i ?>">
                            <?php echo $i ?>
                        </a></li>
                    <?php endif ?>
                    <?php endfor ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo 'list.php?page='.($current_page+1) ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

</div>
    <div>
        <?php include_once("../footer/index.php"); ?>
    </div>
</body>
</html>