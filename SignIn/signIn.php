<?php
    session_start();
    $hostname = "localhost";
    $user_name = "root";
    $password = "PASSWORD";
    $database = "web_ass_2";
    $error = array();
    
    $connect_handle = mysqli_connect($hostname, $user_name, $password, $database);

    if(isset($_POST['signInButton'])){
        $user_name = $_POST['username'];
        $password = $_POST['password'];

        if(empty($user_name)){
            array_push($error, "Bạn cần điền tên đăng nhập !");
        }
        
        if(empty($password)){
            array_push($error, "Bạn cần điền mật khẩu !");
        }

        if(count($error)==0){
            $check_username_query = "select * from account where username='$user_name'";
            $check_username_result = mysqli_query($connect_handle,$check_username_query);
            if (mysqli_num_rows($check_username_result) == 1){
                // username ok, check password
                $encrypt_password = md5($password);
                $check_password_query = "select * from account where username='$user_name' and password='$encrypt_password'";
                $check_password_result = mysqli_query($connect_handle,$check_password_query);
                
                if(mysqli_num_rows($check_password_result) == 1){
                    // check password ok => check signin ok
                    $_SESSION['username'] = $user_name;
                    $account_data = mysqli_fetch_assoc($check_password_result);
                    $_SESSION['role'] = $account_data['role'];
                    $query = "select avatar from user_information where user_id = (select account_id from account where username = '$user_name')";
                    $result = mysqli_query($connect_handle,$query);
                    $user_data = mysqli_fetch_assoc($result);
                    $_SESSION['avatar'] = $user_data['avatar'];
                    header('location: ../homepage/index.php'); //direct to hompage
                    exit();
                }else{
                    //wrong password
                    array_push($error, 'Sai mật khẩu !');
                }                
            }else{
                //sign in failed, wrong username or password
                array_push($error, 'Sai tên đăng nhập !'); 
            }
        }
    }

    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header('location: ../SignIn/index.php');
    }
?>