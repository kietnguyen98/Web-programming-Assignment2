<?php
require './libs/function.php';
global $conn;
connect_db();
$sql = "select count(contact_id) as total from guest_contact_info";
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

$result = mysqli_query($conn, "SELECT * FROM guest_contact_info LIMIT $start, $limit");
$function=$result; 
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <title>GUEST CONTACT LIST</title>
    <meta charset="UTF-8">

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
        <h1 class="display-4 text-dark text-center">GUEST CONTACT LIST</h1>
        <hr style="width:70%;text-align:center;">

        <br>
        <table class="table table-sm table-bordered">
            <thead>
            <tr class="table-primary">
                <th scope="col">ID</th>
                <th scope="col">FullName</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($function as $item){ ?>
            <tr>
                <td>
                    <?php echo $item['contact_id']; ?>
                </td>
                <td>
                    <?php echo $item['contact_name']; ?>
                </td>
                <td>
                    <?php echo $item['contact_email']; ?>
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
                        <a class="page-link" href="<?php echo 'index.php?page='.($current_page-1) ?>"
                            tabindex="-1">Previous</a>
                    </li>
                    <?php for($i = 1; $i <= $total_page; $i++):?>
                    <?php if($i == $current_page): ?>
                    <li class="page-item active"><a class="page-link" href="<?php echo 'index.php?page='.$i ?>">
                            <?php echo $i ?>
                        </a></li>
                    <?php else: ?>
                    <li class="page-item"><a class="page-link" href="<?php echo 'index.php?page='.$i ?>">
                            <?php echo $i ?>
                        </a></li>
                    <?php endif ?>
                    <?php endfor ?>
                    <li class="page-item">
                        <a class="page-link" href="<?php echo 'index.php?page='.($current_page+1) ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div>
        <?php include_once("../footer/index.php"); ?>
    </div>
</body>

</html>