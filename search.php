
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
<?php
$connect = mysqli_connect('localhost', 'root', '', 'Second_market') or die ("connect fail");
$search_word = $_GET['search_word'];

$query = "select * from board where title like '%$search_word%'";
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
