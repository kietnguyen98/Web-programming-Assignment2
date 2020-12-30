<?php
    $hostname = "localhost";
    $user_name = "root";
    $password = "PASSWORD";
    $database = "web_ass_2";
    
    $connect_handle = mysqli_connect($hostname, $user_name, $password, $database);

    if(isset($_POST['commentBtn'])){
        $comment_content = $_POST['comment'];
        $comment_num = mysqli_num_rows(mysqli_query($connect_handle,"select rating_id from rating_and_comment"));
        $insert_comment_id = $comment_num + 1;
        $username = $_SESSION['username'];
        $product_id = $product_data['product_id'];
        $account_info = mysqli_fetch_assoc(mysqli_query($connect_handle,"select account_id from account where username='$username'"));
        $user_account_id = $account_info['account_id'];
        $comment_date = date("Y-m-d");
        $insert_comment_query = "insert into rating_and_comment (rating_id, p_id, a_id, rating_date, comment_content) values ('$insert_comment_id','$product_id','$user_account_id','$comment_date','$comment_content')";
        $insert_comment_result = mysqli_query($connect_handle,$insert_comment_query);
    }
?>