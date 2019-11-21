<?php
 
        session_start();

        $connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");

        $id=$_GET['id'];
        $pw=$_GET['pw'];
        $email=$_GET['email_text'];
        $addr=$_GET['addr1_text'];
        $city=$_GET['city_text'];
 
        $query1 = "select count(*) from member where id='$id'";
        $result1 = $connect->query($query1);
        if($result1){
                 $query = "insert into member (id, pw, mail, addr, city) values ('$id', '$pw', '$email', '$addr', '$city')";
                $result = $connect->query($query);
                if($result) {
                ?>      <script>
                        alert('Join complete');
                        location.replace("index.php");
                        </script>
<?php            }
                else{
?>                  <script>                   
                        alert("Join fail(ID duplicate or Incorrect info)");
                        history.back();
                    </script>
<?php           }
        }
        else{
?>                  <script>                   
                        alert("Join fail(ID duplicate or Incorrect info)");
                        history.back();
                    </script>
<?php           }
        mysqli_close($connect);
?>
