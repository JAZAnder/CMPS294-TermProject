<?php 
    
    if(empty($Title) || empty($Author) || empty($ISBN) || empty($Publisher) || empty($Year)){
        echo '<h2>Fill Out All Fields to complete an ADD Operation </h2>';
    }else{
        $sql = "INSERT INTO `Inventory` (`Title`, `Author`, `ISBN`, `Publisher`, `Year`) VALUES ('$Title', '$Author', '$ISBN', '$Publisher', '$Year');";
        if ($conn->query($sql) === TRUE) {
            echo '<h2> New Book Added </h2>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
      
?>