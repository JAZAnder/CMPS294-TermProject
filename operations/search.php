<?php 
$sql = "SELECT * FROM `Books` WHERE `Title` LIKE '%$Title%' AND `Author` LIKE '%$Author%' AND `ISBN` LIKE '%$ISBN%' AND `Publisher` LIKE '%$Publisher%' AND `Year` LIKE '%$Year%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo '<table>';
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
            echo '<td rowspan="3"><img src="'.".$row[imagePath]".'"  width="100" height="100"/></td>';
            echo '<td colspan="2">'. "$row[Title]" .'</td>';
            echo '<td rowspan="3"><button>Add to Cart</button></td>';
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
  } else {
    echo "No Results Match your Search";
  }


?>
