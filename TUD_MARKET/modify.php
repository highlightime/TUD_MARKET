<!DOCTYPE>

<html>
<head>
    <meta charset = 'utf-8'>
</head>
<style>
    table.table2{
        border-collapse: separate;
        border-spacing: 1px;
        text-align: left;
        line-height: 1.5;
        border-top: 1px solid #ccc;
        margin : 20px 10px;
    }
    table.table2 tr {
        width: 50px;
        padding: 10px;
        font-weight: bold;
        vertical-align: top;
        border-bottom: 1px solid #ccc;
    }
    table.table2 td {
        width: 100px;
        padding: 10px;
        vertical-align: top;
        border-bottom: 1px solid #ccc;
    }

</style>
<body>

<?php
    session_start();

    $board_id = $_GET['board_id'];
    $title = $_GET['title'];
    $content = $_GET['content'];

    If(!isset($_SESSION['id'])){
        ?>
        <script>
            alert("only allowed to member");
            location.replace("index.php");
        </script>
        <?php
    }
?>

<form method = "post" action = "modify_action.php">
    <input type="hidden" id="board_id" name="board_id" value="<?php echo $board_id?>">
    <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
        <tr>
            <td height=20 align= center bgcolor=#ccc><font color=white> MODIFY</font></td>
        </tr>
        <tr>
            <td bgcolor=white>
                <table class = "table2">
                    <tr>
                        <td>Title</td>
                        <td><input type = text name = title size=60 value="<?php echo $title?>"></td>
                    </tr>

                    <tr>
                        <td>Content</td>
                        <td><textarea name = content cols=85 rows=15 ><?php echo $content?></textarea></td>
                    </tr>

                    <tr>
                        <td>File</td>
                        <td><input type = file name = file size=60></td>
                    </tr>
                </table>

                <center>
                    <input type = "submit" value="modify">
                </center>
            </td>
        </tr>
    </table>
</form>
</body>
</html>