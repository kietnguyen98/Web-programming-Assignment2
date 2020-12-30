<?php 
    $hostname = "localhost";
    $user_name = "root";
    $password = "PASSWORD";
    $database = "web_ass_2";
    $error = array();
    
    $connect_handle = mysqli_connect($hostname, $user_name, $password, $database);

    if(isset($_POST['signUpButton'])){
        $user_name = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $check_username = "select * from account where username = '$user_name'";
        $check_username_result = mysqli_query($connect_handle, $check_username);
    
        if(mysqli_num_rows($check_username_result) != 0){
            //username phu hop
            array_push($error, "Tên tài khoản này đã tồn tại !");
        }

        $check_email = "select * from account where email = '$email'";
        $check_email_result = mysqli_query($connect_handle, $check_email);
        
        if(mysqli_num_rows($check_email_result) != 0){
            array_push($error, "Địa chỉ Email này đã tồn tại !");
        }

        if(count($error)==0){
            $account_num = mysqli_num_rows(mysqli_query($connect_handle,"select account_id from account"));
            $insert_account_id = $account_num + 1;
            $encrypt_password = md5($password);
            $insert_query = "insert into account (account_id, username, password, email, role) values ('$insert_account_id','$user_name','$encrypt_password','$email', 'User')";
            $insert_result = mysqli_query($connect_handle, $insert_query);
            echo 
                "<script>
                    $(window).on('load', function () {
                        $('#redirect-modal').modal('show');
                    });
                </script>";
        }
    }
?>