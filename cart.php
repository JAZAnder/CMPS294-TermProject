<!DOCTYPE html>
<?php include './logincred.php' ?> 

<!-- The above line includes the login creditials for the the sql database -->

<?php 
if ((!(empty($_GET['isbn'])))&&(!(empty($_GET['cookie'])))) { //Checking if the isbn and the cookie are not empty
    $cookie = $_GET['cookie']; //Setting the cookie into  the $cookie variable
    $isbn = $_GET['isbn']; // Setting the isbn to the $isbn variable
    $query = "SELECT `volume`, `ID` FROM `cart` WHERE `ISBN` = '"."$isbn"."' AND `cookie`= '"."$cookie"."';"; //Custom query string where we select the volume and the unique ID 
                                                                                                              // where the isbn and cookie are the same as the $isbn and the $cookie
    $result = $conn->query($query); // executing the query and storing into $result variable
    
    if ($result->num_rows == 0) { // If the result is empty we create a new query and execute it with the $cookie and $isbn variables.
        $query ="INSERT INTO `cart`(`cookie`, `ISBN`) VALUES ('$cookie','$isbn')";
        $conn->query($query);
    }else { // else there is a result we will fetch the result as and associative array and store it in the $result variable
        $row = $result->fetch_assoc();
        $id = $row['ID'];  // Grab the values from the row array and store into distinct variables.
        $volume = $row['volume'];
        $volume = $volume+1; //Increment the volume of the already found book by 1.
        $query = "UPDATE `cart` SET `volume`="."$volume"." WHERE `ID` = '"."$id"."';"; // We then update the entry with the new data and then run the query.
        $conn->query($query);
        
    }
}
if (!(empty($_GET['action']))) { // Checks the current action that the user is doing.
    if ($_GET['action'] == 'remove') { // if the action is the remove then we will remove the book.
        $isbn = $_GET['isbn']; // collect the isbn of the book to be removed
        $query ="DELETE FROM `cart` WHERE `cookie` = '"."$_COOKIE[user]"."' AND `ISBN` = '"."$isbn"."'; ";  //Custom delete query
        $conn->query($query);// Run the query to the database
    }elseif ($_GET['action'] == 'update') { // If the user wants to update the amount of books in the cart then we will have it updated
        $isbn = $_GET['isbn']; // grab isbn of the book
        $query = "UPDATE `cart` SET `volume`='"."$_GET[count]"."' WHERE `ISBN` = '"."$isbn"."' AND `cookie`= '"."$_COOKIE[user]"."';"; //custom update query
        $conn->query($query); // run query to database.
    }
}
?>
<html>
<head>
    <title>CART</title>
</head>
<body>
    <?php
        $query = "SELECT `cart`.`volume`, `Books`.*
                    FROM `cart` 
                        LEFT JOIN `Books` ON `cart`.`ISBN` = `Books`.`ISBN`
                    WHERE `cart`.`cookie` ='"."$_COOKIE[user]"."'"; // This query allows the page to show all the books that are in the users cart currently.
        $result = $conn->query($query); // runs the query to the database. Puts the result into $result.
            echo "<h2>";
            echo "  Welcome to Your Cart, " . $_COOKIE['user']."  "; // Welcome the user to the cart.
            echo "<span style='width:200px'>      </span>";
            echo "<div > <a style='text-decoration:none; color:black;' href='./index.php'><img  src='https://cdn.onlinewebfonts.com/svg/img_167578.png' width='20px' /> Back to Search </a> </div>";
            echo "</h2>";
        
    if ($result->num_rows > 0) {
    // output data of each row
        echo '<table>';
        while($row = $result->fetch_assoc()) { // Loads the associative array the $row variable
            echo '<tr>';
            echo '<td rowspan="3"><img src="'.".$row[imagePath]".'"    width="100" height="100"/></td>'; //Displays the image for the book
            echo '<td colspan="2">'. "$row[Title]" .'</td>'; //Displays the title for the book
            echo '<td> ';
                echo ' 
                    <form action="./cart.php"> 
                        <input type="hidden" value="'."remove".'" name="action">
                        <input type="hidden" value="'."$row[ISBN]".'" name="isbn">
                        <input type="submit" value="Remove From Cart">
                    </form>'; // this is the form that is used to delete the book from the cart
        echo '</td>';
        echo '</tr>';
        echo '<tr>';
            echo '<td>', "$row[Author]",'</td>'; // Displays the author of the book.
            echo '<td> ISBN : ', "$row[ISBN]",'</td>'; // Displays the ISBN of the book
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
                    </form>'; // This is the form to update the volume of a book inside the users cart.
        echo '</td>';
        echo '</tr>';
        echo '<tr><td colspan="4"><hr/></td></tr>';
    }
    echo '</table>';
  }
    ?>
</body>
</html>