<?php
    $hostname = "localhost";
    $user_name = "root";
    $password = "PASSWORD";
    $database = "web_ass_2";
    $update_error = array();

    $connect_handle = mysqli_connect($hostname, $user_name, $password, $database);

    if(isset($_POST['updateInfoButton'])){
        $avatar = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $bdate = date('Y-m-d', strtotime($_POST['birthdate']));
        $address = $_POST['address'];
        if(isset($_POST['gender'])&&($_POST['gender'] == 'male')){
            $gender = 'male';
        }elseif(isset($_POST['gender'])&&($_POST['gender'] == 'female')){
            $gender = 'female';
        }
        $account_id = $_GET['accountId'];

        $select_query = "select * from user_information where user_id = '$account_id'";
        $select_result = mysqli_query($connect_handle, $select_query);

        if(mysqli_num_rows($select_result) == 0){
            //khong thay data => insert
            $insert_query = "INSERT INTO user_information VALUES ('$account_id','$firstname', '$lastname', '$gender', '$phone', '$address', '$bdate','$avatar')";
            $update_user_result = mysqli_query($connect_handle, $insert_query); 
            echo 
                "<script>
                    $(window).on('load', function () {
                        $('#redirect-modal').modal('show');
                    });
                </script>";
        }else{
            //co data => update
            echo $gender;
            $update_query = "UPDATE user_information
            SET firstname = '$firstname', lastname = '$lastname', phone = '$phone', bdate = '$bdate', address = '$address', gender = '$gender', avatar = '$avatar'
            WHERE user_id = '$account_id'";
            $update_user_result = mysqli_query($connect_handle, $update_query); 
            echo 
                "<script>
                    $(window).on('load', function () {
                        $('#redirect-modal').modal('show');
                    });
                </script>";
        }
    }

    if(isset($_POST['updateAccountButton'])){
        $new_password = $_POST['password'];
        $new_email = $_POST['email'];
        $account_id = $_GET['accountId'];

        $check_email = "select * from account where email = '$new_email' and account_id <> '$account_id'";
        $check_email_result = mysqli_query($connect_handle, $check_email);
        
        if(mysqli_num_rows($check_email_result) != 0){
            echo 
                "<script>
                    $(window).on('load', function () {
                        $('#error-modal').modal('show');
                    });
                </script>";
        }else{
            $hash_password = md5($new_password);

            $update_query = "UPDATE account
                SET password = '$hash_password', email = '$new_email'
                WHERE account_id = '$account_id'";
            $update_result = mysqli_query($connect_handle, $update_query); 
            echo 
                "<script>
                    $(window).on('load', function () {
                        $('#success-modal').modal('show');
                    });
                </script>";
        }
    }
?>