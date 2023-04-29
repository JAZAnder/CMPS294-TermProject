<!DOCTYPE html>
<?php include './logincred.php' ?>
<?php 
if ((!(empty($_GET['isbn'])))&&(!(empty($_GET['cookie'])))) {
    $cookie = $_GET['cookie'];
    $isbn = $_GET['isbn'];
    $query ="INSERT INTO `cart`(`cookie`, `ISBN`) VALUES ('$cookie','$isbn')";
    $conn->query($query);
}
if ((!(empty($_GET['action'])))) {
    if ($_GET['action'] = 'remove') {
        $isbn = $_GET['isbn'];
        $query ="DELETE FROM `cart` WHERE `cookie` = '"."$_COOKIE[user]"."' AND `ISBN` = '"."$isbn"."'; ";
        //echo $query;
        $conn->query($query);
    }
}
?>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <?php 
        $query = "SELECT `cart`.`volume`, `Books`.*
                    FROM `cart` 
                        LEFT JOIN `Books` ON `cart`.`ISBN` = `Books`.`ISBN`
                    WHERE `cart`.`cookie` ='"."$_COOKIE[user]"."'";
        $result = $conn->query($query);
        
    if ($result->num_rows > 0) {
    // output data of each row
        echo '<table>';
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td rowspan="3"><img src="'.".$row[imagePath]".'"  width="100" height="100"/></td>';
            echo '<td colspan="2">'. "$row[Title]" .'</td>';
            echo '<td rowspan="3"> ';
                echo ' 
                    <form action="./cart.php">
                        <input type="hidden" value="'."remove".'" name="action">
                        <input type="hidden" value="'."$row[ISBN]".'" name="isbn">
                        <input type="submit" value="Remove From Cart">
                    </form>';
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td>', "$row[Author]",'</td>';
            echo '<td> ISBN : ', "$row[ISBN]",'</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td>', "$row[Publisher]",'</td>';
            echo '<td>', "$row[Year]",'</td>';
        echo '</tr>';
        echo '<tr><td colspan="4"><hr/></td></tr>';
    }
    echo '</table>';
  }
    ?>
    
</body>
</html>