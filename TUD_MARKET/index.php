<!DOCTYPE html>
<html>
    <head>
        <title>TUD MARKET</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="index_style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
    </head>
    <body class="w3-content" style="max-width:1200px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
        <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
            <div class="w3-container w3-display-container w3-padding-16">
                <h3 class="w3-wide"><b>TUD<br>MARKET</b></h3>
                <!-- Login Button and Profile -->
                <div class="w3-row w3-grayscale profile">
                    <?php
                    session_start();
                    $connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");

                    if(!isset($_SESSION['id'])) {
                        ?>
                        <h5 style="cursor: hand" onclick="location.href = 'login.html'">LOGIN</h5>
                        <?php
                    }else{
                        $id = $_SESSION['id'];

                        $query = "select mail from member where id = '$id'";
                        $result = mysqli_query($connect, $query);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <!-- profile photo -->
                        <img src="profile_photo/DSC_0009.jpg" alt="<?php echo $_SESSION['id']?>" style="width: 100%">
                        <h1><?php echo $_SESSION['id']?></h1>
                        <p class="email"><?php echo $row['mail']?></p>
                        <div style="margin: 24px 0;">
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </div>
                        <p><button id="btn_sell_item">SELL MY ITEM</button></p>
                        <p><button id="btn_edit_info">EDIT YOUR INFO</button></p>
                        <p><button id="btn_logout">LOGOUT</button></p>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </nav>
        <!-- Main Page -->
        <div class="w3-main" style="margin-left:250px">
            <div class="w3-container w3-black w3-padding-32" id="search_section">
                <h1>ARE YOU LOOKING FOR ITEM</h1>
                <p><input class="w3-input w3-border" id="search_word" type="text" placeholder="ENTER NAME LOOKING FOR" style="width:100%"></p>
                <button class="w3-button w3-red w3-margin-bottom" id="btn_search">SEARCH</button>
            </div>
            <!-- Item board -->
            <div id="items" class="w3-row w3-grayscale items">
                <h2 align="center">Contents</h2>
                <table align="center">
                    <thead align="center">
                    <tr>
                        <td width="50" align="center">No</td>
                        <td width="500" align="center">Title</td>
                        <td width="100" align="center">Author</td>
                        <td width="200" align="center">Date</td>
                        <td width="50" align="center">Hits</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "select * from board";
                    $result = mysqli_query($connect, $query);
                    $total = mysqli_num_rows($result);

                    while($rows = mysqli_fetch_assoc($result)){
                    if ($total % 2 == 0){
                    ?>
                    <tr class="even">
                        <?php }else{
                        ?>
                    <tr>
                        <?php
                        }
                        ?>
                        <td width="50" align="center"><?php echo $total ?></td>
                        <td width="500" align="center"><a href = "view.php?board_id=<?php echo $rows['board_id']?>"><?php echo $rows['title'] ?></td>
                        <td width="100" align="center"><?php echo $rows['author'] ?></td>
                        <td width="200" align="center"><?php echo $rows['date'] ?></td>
                        <td width="50" align="center"><?php echo $rows['hit'] ?></td>
                        <?php
                        $total--;
                        }
                        ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- update profile modal -->
        <div id="private" class="w3-modal">
            <div class="w3-container w3-white w3-center w3-animate-zoom profile">
                <i class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge" onclick="document.getElementById('private').style.display='none'"></i>
                <h2 class="w3-wide">Profile update</h2>
                <img src="profile_photo/DSC_0009.jpg" alt="<?php echo $_SESSION['id']?>" style="width: 100%">
                <h1><?php echo $_SESSION['id']?></h1>
                <p><input class="w3-input w3-border" id="update_password" type="password" placeholder="ENTER NEW PASSWORD" style="width:100%"></p>
                <p><input class="w3-input w3-border" id="update_repassword" type="password" placeholder="RE-ENTER NEW PASSWORD" style="width:100%"></p>
                <p><input class="w3-input w3-border" id="update_email" type="text" placeholder="ENTER NEW EMAIL" style="width:100%"></p>
                <p><input class="w3-input w3-border" id="update_address" type="text" placeholder="ENTER NEW ADDRESS" style="width:100%"></p>
                <button id="btn_profile_update">UPDATE</button>
            </div>
        </div>
        <script src="index_script.js"></script>
    </body>
</html>