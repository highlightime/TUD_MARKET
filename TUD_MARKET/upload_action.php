<?php
    $target_dir = "files/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;


    if($_FILES['file']['error'] == 0) { //if there is no error, like there is no file to upload
        if (file_exists($target_file)) { // Check if file already exists
            ?>
            <script>
                alert("Sorry, file already exists.");
                location.replace("index.php");
            </script>
            <?php

            $uploadOk = 0;
        }
        if ($uploadOk == 0) { // Check if $uploadOk is set to 0 by an error
            ?>
            <script>
                alert("Sorry, your file was not uploaded.");
                location.replace("index.php");
            </script>
            <?php
        } else {
            if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) { // if everything is ok, try to upload file
                ?>
                <script>
                    alert("Sorry, there was an error uploading your file.");
                    location.replace("index.php");
                </script>
                <?php
            }
        }
    }
    if($uploadOk == 1) { //if everything is ok, try to upload
        session_start();

        $connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");

        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_SESSION['id'];
        $date = date('Y-m-d');

        $query = "insert into board (title, content, author, date, hit) values ('$title', '$content', '$author', '$date', 0)";

        $result = $connect->query($query);
        if ($result) {

            ?>
            <script>
                alert("success to upload");
                location.replace('index.php');
            </script>
            <?php
        } else {
            echo "FAIL";
        }
        mysqli_close($connect);
    }
?>