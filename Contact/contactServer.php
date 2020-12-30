<?php 
$hostname = "localhost";
$user_name = "root";
$password = "PASSWORD";
$database = "web_ass_2";
$error = array();

$connect_handle = mysqli_connect($hostname, $user_name, $password, $database);

if(isset($_POST['guestSubmitBtn'])){
    $guestName = $_POST['guestName'];
    $guestEmail = $_POST['guestEmail'];

    $query = "insert into guest_contact_info (contact_name, contact_email) values ('$guestName', '$guestEmail')";
    mysqli_query($connect_handle, $query);

    echo 
        "<script>
            $(window).on('load', function () {
                $('#success-modal').modal('show');
            });
        </script>";
}

?>