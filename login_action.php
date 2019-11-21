<?php
    session_start();

    $connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");
    //입력받은 id와 password
    $id = $_GET['id'];
    $password = $_GET['pw'];

    //id가 있는지 체크
    $query = "select * from member where user_id='$id'";
    $result = $connect -> query($query);

    //password 체크
    if(mysqli_num_rows($result) == 1){
     $row = mysqli_fetch_assoc($result);

     if($row['user_password'] == $password){
       $_SESSION['userid'] = $id;
       if(isset($_SESSION['userid'])){
        ?>
         <script>
          alert("success!!");
          location.replace("index.php");
         </script>
<?php
       }else{
         echo "session fail";
       }
     }else{
      ?><script>
         alert("id or password is not valid");
         history.back();
        </script>
<?php
     }
     }else {
     ?>
     <script>
      alert("id or password is not valid");
      history.back();
     </script>
     <?php
    }
?>
