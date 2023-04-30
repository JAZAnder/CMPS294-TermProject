<!DOCTYPE html>
<?php include './logincred.php' ?>
<?php 
if ((!(empty($_GET['isbn'])))&&(!(empty($_GET['cookie'])))) {
    $cookie = $_GET['cookie'];
    $isbn = $_GET['isbn'];
    //Check if Entry Exist

    $query = "SELECT `volume`, `ID` FROM `cart` WHERE `ISBN` = '"."$isbn"."' AND `cookie`= '"."$cookie"."';";
    $result = $conn->query($query);
    

    if ($result->num_rows == 0) {
        $query ="INSERT INTO `cart`(`cookie`, `ISBN`) VALUES ('$cookie','$isbn')";
        $conn->query($query);
    }else {
        $row = $result->fetch_assoc();

        $id = $row['ID'];
        $volume = $row['volume'];
        $volume = $volume+1;

        $query = "UPDATE `cart` SET `volume`="."$volume"." WHERE `ID` = '"."$id"."';";
        $conn->query($query);
        
    }

    
}
if ((!(empty($_GET['action'])))) {
    if ($_GET['action'] == 'remove') {
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
        


            echo "<h2>";
            echo "  Welcome to Your Cart, " . $_COOKIE['user']."  ";
            echo "<span style='width:200px'>      </span>";
            echo "<div > <a style='text-decoration:none; color:black;' href='./index.php'><img  src='https://cdn.onlinewebfonts.com/svg/img_167578.png' width='20px' /> Back to Search </a> </div>";
            echo "</h2>";
        



    if ($result->num_rows > 0) {
    // output data of each row
        echo '<table>';
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td rowspan="3"><img src="'.".$row[imagePath]".'"  width="100" height="100"/></td>';
            echo '<td colspan="2">'. "$row[Title]" .'</td>';
            echo '<td> ';
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
            echo '<td> 
                <form action="./cart.php">
                <input type="text" name="count" placeholder="'."$row[volume]".'">
            </td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td> Publisher : ', "$row[Publisher]",'</td>';
            echo '<td> Year : ', "$row[Year]",'</td>';
            echo '<td> ';
                echo ' 
                    
                        <input type="hidden" value="'."update".'" name="action">
                        <input type="hidden" value="'."$row[ISBN]".'" name="isbn">
                        <input type="submit" value="Update Amount">
                    </form>';
        echo '</td>';
        echo '</tr>';
        echo '<tr><td colspan="4"><hr/></td></tr>';
    }
    echo '</table>';
  }
    ?>
    
</body>
</html>