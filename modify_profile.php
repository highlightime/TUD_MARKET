<?php
    session_start();
    $id = $_SESSION['id'];
    $password = $_GET['password'];
    $email = $_GET['email'];
    $address = $_GET['address'];
    $city = $_GET['city'];

    $connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");

    $query = "update member set pw = '$password', mail = '$email', addr = '$address' where id = '$id'";

    $result = $connect->query($query);

    if($result) {
        ?>
        <script>
            alert("Success to update your information!!");
            location.replace('index.php');
        </script>
        <?php
    }
?>