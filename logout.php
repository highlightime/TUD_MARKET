<?php
    session_start();
    $result = session_destroy();

    if($result) {
        ?>
        <script>
            alert("Logged out!!");
            history.back();
        </script>
<?php   }
?>
