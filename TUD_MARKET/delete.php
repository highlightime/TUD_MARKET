<?php
    $connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");

    $board_id = $_GET['board_id'];

    $query = "delete from board where board_id = '$board_id'";

    $result = $connect->query($query);
    if($result){
        ?> <script>
            alert("success to delete");
            location.replace("index.php");
        </script>
        <?php
    }else{
        echo "FAIL";
    }
    mysqli_close($connect);
?>
