<?php 
    $sql = "SELECT * FROM `Inventory` WHERE `Title` LIKE '%$Title%' AND `Author` LIKE '%$Author%' AND `ISBN` LIKE '%$ISBN%' AND `Publisher` LIKE '%$Publisher%' AND `Year` LIKE '%$Year%'";
    $result = $conn->query($sql);

    //If User Submits all empty forms they wil recive a message to Fill in blanks
    if((empty($Title)&empty($Author)&empty($ISBN)&empty($Publisher)&empty($Year))){
        //Posts a Try Again message to the User
        echo '<h2> Cannot Delete with Empty Parameters </h2>';
        
    }elseif($result->num_rows == 0){
        echo '<h2> No Results Match your Request </h2>';
    }elseif($result->num_rows > 1){
        echo '<h2> Your Request Returns to Many Results, Refine your Request </h2>';
    }else{
        
        $sql = "DELETE FROM `Inventory` WHERE `Title` LIKE '%$Title%' AND `Author` LIKE '%$Author%' AND `ISBN` LIKE '%$ISBN%' AND `Publisher` LIKE '%$Publisher%' AND `Year` LIKE '%$Year%'";
        $result = $conn->query($sql);
        echo '<h2> Book Deleted </h2>';
    }
?>