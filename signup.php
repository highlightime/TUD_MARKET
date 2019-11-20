<?php
    $connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");

    $id = $_GET['id_text'];
    echo $id;

  /*  $query = "insert into member values ()";

    $result = $connect -> query($query);

    if($result) {
        ?>
        <script>
            alert("Signed up!!");
            location.replace("../Login/login.html");
        </script>
        <?php
    }else{
        ?>
        <script>
            alert("fail");
        </script>
        <?php
    }
    mysqli_close($connect);*/

?>