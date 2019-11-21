<html>
    <body>
        <?php if(isset($message)){
            echo '<p>'.$message.'</p>';
        }?>

        <form action="" methos="post">
            <label for="email"></label>
            <input type="email" name="email" value="<?php if(isset($_POST['email'])){
                echo $_POST['email'];
            }?>" required> <br><br>

            <label for="password"></label>
            <input type="password" name="password" required><br><br>
            <input type="submit" name="action" value="Login">
        </form>
    </body>
</html>