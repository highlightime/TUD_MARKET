<?php
    session_start();

    $target_dir = "files/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;


    if($_FILES['file']['error'] > 0) {
    }else {
        // Check if file already exists
        if (file_exists($target_file)) {
            ?>
            <script>
                alert("Sorry, file already exists");
                location.replace("index.php");
            </script>
            <?php
        }
        // Check file size
        if ($_FILES["file"]["size"] > 500000) {
            ?>
            <script>
                alert("Sorry, your file is too large.");
                location.replace("index.php");
            </script>
            <?php
        }

        if (!move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

            echo "Sorry, there was an error uploading your file.";
            ?>
            <script>
                alert("Sorry, there was an error uploading your file.");
                location.replace("index.php");
            </script>
            <?php
        }
    }

    $connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");

    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_SESSION['id'];
    $date = date('Y-m-d');

    $query = "insert into board (title, content, author, date, hit) values ('$title', '$content', '$author', '$date', 0)";

    $result = $connect->query($query);
    if($result){
        ?> <script>
            alert("success to upload");
            location.replace("index.php");
        </script>
        <?php
    }else{
        echo "FAIL";
    }
    mysqli_close($connect);

?>
