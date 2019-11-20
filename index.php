<!DOCTYPE html>
<html>
<title>Main</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    table{
        border-top: 1px solid #444444;
        border-collapse: collapse;
    }
    tr{
        border-bottom: 1px solid #444444;
        padding: 10px;
    }
    td{
        border-bottom: 1px solid #efefef;
        padding: 10px;
    }
    table .even{
        background: #efefef;
    }
    .w3-sidebar a {font-family: "Roboto", sans-serif}
    body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>

<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
    <div class="w3-container w3-display-container w3-padding-16">
        <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
        <h3 class="w3-wide"><b>SECOND MARKET</b></h3>
        <!-- Login Button and Profile -->
        <div id="member_profile" class="w3-row w3-grayscale">
            <?php
                session_start();
                if(!isset($_SESSION['userid'])) {
                    ?>
                    <h5 style="cursor: hand" onclick="location.href = 'login.html'">LOGIN</h5>
                    <?php
                }else{
                   ?>
                    <h5 style="cursor: hand" onclick = "location.href = 'user_profile.php'">HELLO, <?php echo $_SESSION['userid'] ?></h5>
                    <h5 style="cursor: hand" onclick="location.href = 'logout.php'">LOGOUT</h5>
                <?php
                }
                ?>

        </div>
    </div>
    <!--
    <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
        <a onclick="myAccFunc1()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn1">
            CLOTHES <i class="fa fa-caret-down"></i>
        </a>
        <div id="demoAcc1" class="w3-bar-block w3-hide w3-padding-large w3-medium">
            <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>SHIRTS</a>
            <a href="#" class="w3-bar-item w3-button">PANTS</a>
            <a href="#" class="w3-bar-item w3-button">DRESS</a>
        </div>

        <a onclick="myAccFunc2()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn2">
            ELECTRONICS <i class="fa fa-caret-down"></i>
        </a>
        <div id="demoAcc2" class="w3-bar-block w3-hide w3-padding-large w3-medium">
            <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>CAMERA</a>
            <a href="#" class="w3-bar-item w3-button">PHONE</a>
            <a href="#" class="w3-bar-item w3-button">COMPUTER</a>
        </div>

        <a onclick="myAccFunc3()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn3">
            ACCECORIES <i class="fa fa-caret-down"></i>
        </a>
        <div id="demoAcc3" class="w3-bar-block w3-hide w3-padding-large w3-medium">
            <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>RINGS</a>
            <a href="#" class="w3-bar-item w3-button">SHOES</a>
            <a href="#" class="w3-bar-item w3-button">SUNGLASSES</a>
        </div>
    </div>
    -->
    <!--
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('password').style.display='block'">SELL MY ITEM</a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('private').style.display='block'">EDIT YOUR INFO</a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('password').style.display='block'">CHANGE PW</a>
    -->
    <a href="upload.php" class="w3-bar-item w3-button w3-padding">SELL MY ITEM</a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('private').style.display='block'">EDIT YOUR INFO</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
    <div class="w3-bar-item w3-padding-24 w3-wide">YD MART</div>
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

    <!-- Push down content on small screens -->
    <div class="w3-hide-large" style="margin-top:83px"></div>

    <!-- Top header -->
    <!--
    <header class="w3-container w3-xlarge">
        <p class="w3-right">
            <i class="fa fa-shopping-cart w3-margin-right">CART</i>
        </p>
    </header>
    -->

    <!-- Search section -->
    <div class="w3-container w3-black w3-padding-32">
        <form method="get" action="search.php">
            <h1>ARE YOU LOOKING FOR ITEM</h1>
            <p><input class="w3-input w3-border" name="search_word" type="text" placeholder="ENTER NAME LOOKING FOR" style="width:100%"></p>
            <button type="submit" class="w3-button w3-red w3-margin-bottom">SEARCH</button>
        </form>
    </div>


    <!-- Product grid -->
    <?php
        $connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");
        $query = "select * from board";
        $result = mysqli_query($connect, $query);
        $total = mysqli_num_rows($result);
    ?>
    <div id="contents" class="w3-row w3-grayscale"]>
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

    <!-- End page content -->
<!-- 회원정보 수정 -->
<div id="private" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
        <div class="w3-container w3-white w3-center">
            <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
            <h2 class="w3-wide">회원정보 수정</h2>
            <p>비밀번호를 입력하세요.</p>
            <p><input class="w3-input w3-border" type="text" placeholder="Enter password"></p>
            <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('private').style.display='none'">제출</button>
        </div>
    </div>
</div>
<!-- 비밀번호 수정 -->
<div id="password" class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
        <div class="w3-container w3-white w3-center">
            <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
            <h2 class="w3-wide">비밀번호 수정</h2>
            <p>새로운 비밀번호를 입력하세요.</p>
            <p><input class="w3-input w3-border" type="text" placeholder="Enter password"></p>
            <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('password').style.display='none'">제출</button>
        </div>
    </div>
</div>

<script>
    // Accordion
    function myAccFunc1() {
        var x = document.getElementById("demoAcc1");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }

    // Click on the "과일" link on page load to open the accordion for demo purposes
    document.getElementById("myBtn1").click();

    // Accordion
    function myAccFunc2() {
        var x = document.getElementById("demoAcc2");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }

    // Click on the "채소" link on page load to open the accordion for demo purposes
    document.getElementById("myBtn2").click();

    // Accordion
    function myAccFunc3() {
        var x = document.getElementById("demoAcc3");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }

    // Click on the "수산물" link on page load to open the accordion for demo purposes
    document.getElementById("myBtn3").click();




    // Script to open and close sidebar
    function w3_open() {
        document.get
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
    }

    function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
    }
</script>

</body>
</html>
