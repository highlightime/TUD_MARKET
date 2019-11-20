<?php
    $connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");

    $board_id = $_POST['board_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('Y-m-d');

    $query = "update board set title = '$title', content = '$content', date = '$date' where board_id = '$board_id'";

    $result = $connect->query($query);
    if($result){
        ?> <script>
            alert("success to update");
            location.replace("view.php?board_id=<?php echo $board_id?>");
        </script>
        <?php
    }else{
        echo "FAIL";
    }
    mysqli_close($connect);
?>
