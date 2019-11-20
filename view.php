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

        <div class="reply_view">
            <h3>Reply List</h3>
            <?php
                $query = "select * from reply where board_id = $board_id";
                $result = mysqli_query($connect, $query);
                while($rows = mysqli_fetch_assoc($result)){
            ?>
            <div class="dap_lo">
                <div><b><?php echo $rows['author'];?></b></div>
                <div class="dap_to comt_edit"><?php echo $rows['content'];?></div>
                <div class="rep_me dap_to"><?php echo $rows['date']?></div>
            </div>
        </div>
        <?php } ?>

        <div class="dap_ins">
            <div style="margin-top:10px;">
                <form method="post" action="reply_action.php">
                    <input type="hidden" name="board_id" class="bno" value="<?php echo $board_id?>">
                    <textarea name="content" class="reply_content" id="re_content"></textarea>
                 <input type="submit" value="Reply">
                </form>
            </div>
        </div>
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
<style>
    /* 댓글 */
    .reply_view {
        width:900px;
        margin-top:100px;
        word-break:break-all;
    }
    .dap_lo {
        font-size: 14px;
        padding:10px 0 15px 0;
        border-bottom: solid 1px gray;
    }
    .dap_to {
        margin-top:5px;
    }
    .rep_me {
        font-size:12px;
    }
    .rep_me ul li {
        float:left;
        width: 30px;
    }
    .dat_delete {
        display: none;
    }
    .dat_edit {
        display:none;
    }
    .dap_sm {
        position: absolute;
        top: 10px;
    }
    .dap_edit_t{
        width:520px;
        height:70px;
        position: absolute;
        top: 40px;
    }
    .re_mo_bt {
        position: absolute;
        top:40px;
        right: 5px;
        width: 90px;
        height: 72px;
    }
    #re_content {
        width:700px;
        height: 56px;
    }
    .dap_ins {
        margin-top:50px;
    }
    .re_bt {
        position: absolute;
        width:100px;
        height:56px;
        font-size:16px;
        margin-left: 10px;
    }
    #foot_box {
        height: 50px;
    }
</style>
