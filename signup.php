<?php
 
        $connect = mysqli_connect('localhost', '', '', '') or die("fail");
 
        $id=$_GET[id];
        $pw=$_GET[pw];
        $email=$_GET[email];
        $addr=$_GET[addr1_text];
        $city=$_GET[city_text];
 
        $date = date('Y-m-d H:i:s');
 
        $query = "insert into member (id, pw, mail, date, addr, city, permit) values ('$id', '$pw', '$email', '$addr', '$city', '$date', 0)";
 
        $result = $connect->query($query);
 
        if($result) {
        ?>      <script>
                alert('가입 되었습니다.');
                location.replace("./login_action.php");
                </script>
 
<?php   }
        else{
?>              <script>                   
                        alert("fail");
                </script>
<?php   }
 
        mysqli_close($connect);
?>