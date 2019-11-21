<?php
    session_start();
    $userid = $_SESSION['userid'];
    $password = $_GET['password'];
    $email = $_GET['email'];
    $address = $_GET['address'];

    $connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");
    $query = "update member set user_password = '$password', user_email = '$email', user_adr1 = '$address' where user_id = '$userid'";

    $result = $connect->query($query);

    ?>
        <script>
            alert("Success to update your information!!");
            location.replace('index.php');
        </script>
    <?php


?>