<?php
    session_start();
    $connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");

    $board_id = $_POST['board_id'];
    $content = $_POST['content'];
    $author = $_SESSION['id'];

    $query = "insert into reply (board_id, content, author) values ('$board_id', '$content', '$author')";

    $result = $connect->query($query);
    if($result){
        ?> <script>
            alert("success to upload");
            location.replace("view.php?board_id=<?php echo $board_id?>");
        </script>
        <?php
    }else{
        echo "FAIL";
    }
    mysqli_close($connect);
?>