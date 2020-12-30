<!DOCTYPE html>
<html lang="vi">
<?php include('../SignIn/signIn.php') ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="header">
    <meta name="author" content="team 20">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
            <a class="navbar-brand text-info" href="#">We Tour</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="navbar-nav" style="margin-right: auto;">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../homepage/index.php"><strong>Trang chủ</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../AboutUs/index.php"><strong>Giới thiệu</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../ServiceInfomation/index.php"><strong>Thông tin
                                dịch
                                vụ</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="../Contact/index.php"><strong>Liên hệ</strong></a>
                    </li>
                    <?php if(isset($_SESSION['username'])&&($_SESSION['role']=='Admin')): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-light dropdown-toggle" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>
                                Quản lý thông tin</strong>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../accountManage/list.php"><strong>Quản lý tài
                                    khoản</strong></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../accountManage/search.php"><strong>Tìm kiếm tài khoản</strong></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../productManage/list.php"><strong>Quản lý dịch
                                    vụ</strong></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../contactManage/index.php"><strong>Thông tin liên lạc khách hàng</strong></a>
                        </div>
                    </li>
                    <?php endif ?>
                </ul>
                <div class="input-group col-md-3" style="margin-left: auto;">
                    <input class="form-control py-2 border-right-0 border" type="search" placeholder="Tìm kiếm...">
                    <span class="input-group-append">
                        <button class="btn btn-success border-left-0" type="submit"><i
                                class="fas fa-search"></i></button>
                    </span>
                </div>

                <?php if(isset($_SESSION['username'])): ?>
                <div class="nav-item dropdown">
                    <a class="text-light nav-link dropdown-toggle" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <strong>
                        <?php 
                            if($_SESSION['avatar'] == NULL){
                                echo '<i class="fa fa-user" aria-hidden="true">
                                </i>';
                            }else{
                                echo '<img alt="User Avatar" style="height:30px ; width : 30px; border-radius: 50%;" src="data:image/jpg;base64,'.base64_encode($_SESSION['avatar']).'"/>';
                            }
                        ?>
                         <?php echo $_SESSION['username']; ?>
                        </strong></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="../UserInfo/index.php"><i class="fas fa-user-circle"></i> Thông tin cá nhân</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../homepage/index.php?logout=true"><i class="fas fa-sign-out-alt"></i> Đăng
                            xuất</a>
                    </div>
                </div>
                <?php else: ?>
                <div class="text-left text-light">
                    <a class="btn btn-outline-primary" href="../SignIn/index.php">Đăng nhập</a>
                    <a class="btn btn-outline-light" href="../SignUp/index.php">Đăng kí</a>
                </div>
                <?php endif ?>
            </div>
        </nav>
    </header>
</body>

</html>