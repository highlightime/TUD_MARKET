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

    If(!isset($_SESSION['id'])){
        ?>
        <script>
            alert("only allowed to member");
            location.replace("index.php");
        </script>
<?php
    }
?>

<form enctype="multipart/form-data" method = "post" action = "upload_action.php">
    <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
        <tr>
            <td height=20 align= center bgcolor=#ccc><font color=white> UPLOAD</font></td>
        </tr>
        <tr>
            <td bgcolor=white>
                <table class = "table2">
                    <tr>
                        <td>Title</td>
                        <td><input type = text name = title size=60></td>
                    </tr>

                    <tr>
                        <td>Content</td>
                        <td><textarea name = content cols=85 rows=15></textarea></td>
                    </tr>

                    <tr>
                        <td>File</td>
                        <td><input type = file name = file size=60></td>
                    </tr>
                </table>

                <center>
                    <input type = "submit" value="upload">
                </center>
            </td>
        </tr>
    </table>
</form>
</body>
</html>