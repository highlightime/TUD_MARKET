<?php
    session_start();

    if(!isset($_SESSION['userid'])){
        ?>
            <script>
                alert("You're not allowed to access");
                history.back();
            </script>
        <?php
    }else {

        $connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");
        $board_id = $_GET['board_id'];
        $query = "select title, content, date, hit, author from board where board_id =$board_id";
        $result = $connect->query($query);
        $rows = mysqli_fetch_assoc($result);
        $hit = $rows['hit'] + 1;
        ?>

        <style>
            view_table {
                border: 1px solid #444444;
                margin-top: 30px;
            }

            .view_title {
                height: 30px;
                text-align: center;
                background-color: #cccccc;
                color: white;
                width: 1000px;
            }

            .view_id {
                text-align: center;
                background-color: #EEEEEE;
                width: 30px;
            }

            .view_id2 {
                background-color: white;
                width: 60px;
            }

            .view_hit {
                background-color: #EEEEEE;
                width: 30px;
                text-align: center;
            }

            .view_hit2 {
                background-color: white;
                width: 60px;
            }

            .view_content {
                padding-top: 20px;
                border-top: 1px solid #444444;
                height: 500px;
            }

            .view_btn {
                width: 700px;
                height: 200px;
                text-align: center;
                margin: auto;
                margin-top: 50px;
            }

            .view_btn1 {
                height: 50px;
                width: 100px;
                font-size: 20px;
                text-align: center;
                background-color: white;
                border: 2px solid black;
                border-radius: 10px;
            }

            .view_comment_input {
                width: 700px;
                height: 500px;
                text-align: center;
                margin: auto;
            }

            .view_text3 {
                font-weight: bold;
                float: left;
                margin-left: 20px;
            }

            .view_com_id {
                width: 100px;
            }

            .view_comment {
                width: 500px;
            }

        </style>

        <table class="view_table" align=center>
            <tr>
                <td colspan="4" class="view_title"><?php echo $rows['title'] ?></td>
            </tr>
            <tr>
                <td class="view_id">Author</td>
                <td class="view_id2"><?php echo $rows['author'] ?></td>
                <td class="view_hit">Hits</td>
                <td class="view_hit2"><?php echo $hit ?></td>
            </tr>
            <tr>
                <td colspan="4" class="view_content" valign="top">
                    <?php echo $rows['content'] ?></td>
            </tr>
        </table>
        <?php
            $query = "update board set hit = $hit where board_id = $board_id";
            $result = $connect->query($query);
        ?>

        <!-- MODIFY & DELETE -->
        <div class="view_btn">
            <button class="view_btn1" onclick="location.href='./index.php'">To List</button>
            <button class="view_btn1"
                    onclick="location.href='modify.php?board_id=<?= $board_id ?>&title=<?= $rows['title']?>&content=<?= $rows['content']?>'">Modify
            </button>

            <button class="view_btn1"
                    onclick="location.href='delete.php?board_id=<?= $board_id ?>'">Delete
            </button>
        </div>
        <?php
    }
    ?>
