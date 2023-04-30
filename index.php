<?php
$cookie_name = "user";
if(((empty($_GET['userName'])) && empty($_COOKIE['user'] ))){
    $cookie_value = "";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
}
if(!(empty($_GET['userName'])) && empty($_COOKIE['user'] )){
    $cookie_value = $_GET['userName'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
}
if (!(empty($_GET['userName']))) {
    if ($_GET['userName'] == 'logout') {
        $cookie_value = "";
        setcookie($cookie_name, $cookie_value, time() + (-20), "/"); // 86400 = 1 day
    }
}


?>
<!DOCTYPE >
<html>
    <head>
        <script src="./index.js"></script>
    </head>
    <title>Assignment</title>
    <body>
        <div>
            <!-- Server Login and Database Selection -->
            <?php 
            include './logincred.php';
            
            ?>
            <!-- The Add an the Delete Functions -->
            <?php
                //Setting the Variables before the Extract 
                $Operation = "";
                $Title = "";
                $Author = "";
                $ISBN = "";
                $Publisher = "";
                $Year = "";
                //Extracting the Input
                extract($_POST);
                //Runs the add.php, if the User Selected to preform the Add Operation 
                if($Operation == "Add"){
                    include './operations/add.php';
                }
                //Runs the delete.php, if the User Selected to preform the Delete Operation 
                if($Operation == "Delete"){
                    include './operations/delete.php';
                }
            ?>
        </div>
        
        <!--Begining of HTML -->
        <h1>Book Inventory Managenment</h1>

         <?php 
            if(empty($_COOKIE['user'])) {
                echo '<form action="./index.php" method="GET">
                <input type="text" name="userName" placeholder="User Name">    
                <input type="submit" value="Login x2">
                      </form>';
            }       
        else {  echo "<div style='display:flex; width:100vw; flex-direction: row'>";
                echo "<h2>Welcome Back, " . $_COOKIE[$cookie_name]."  ";
                echo '<a href="./index.php?userName=logout"><button>Logout x2</button></a>';
                echo "<span style='width:200px'>      </span>";
                echo "<a href='./cart.php'><img  src='https://static.vecteezy.com/system/resources/previews/000/356/583/original/vector-shopping-cart-icon.jpg' width='45px' /></a>";
                echo "</h2>";
                echo "</div>";
            }
        ?>

        <hr/>

       

        <?php
            //Sets the Form Handler to be this file.
            $script = $_SERVER['SCRIPT_NAME']; 
            $script = preg_replace("/^.*\//", "", $script);
            echo "<form action=\"$script\" method=post>";
        ?>
            <!--Options for Actions-->
            <div class="Operation" id="actionForm">
                <input type="hidden" value="Search" name="Operation"/>
                Search : <input type="text" name="Title" id="">
                <input type="submit" value="Search">
                <button onclick="advancedSearch()">Advanced</button>
            </div>



            <hr/>
            <!--List all the Text Feilds for Actions-->

        </form>
        <!--Link to the Database in text Format-->
        <hr/>
        <?php 
            //Runs the search.php, if the User Selected to preform the Search Operation 
            if($Operation == "Search"){
                    include './operations/search.php';
            }
        ?>
    </body>
</html>
