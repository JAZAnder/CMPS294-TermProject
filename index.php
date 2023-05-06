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
            $cookie_name = "user";
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
                if ($Operation == "Add") { //Runs the add.php, if the User Selected to preform the Add Operation 
                    include './operations/add.php';
                }
                if ($Operation == "Delete") {//Runs the delete.php, if the User Selected to perform the Delete Operation 
                    include './operations/delete.php';
                }
            ?>
        </div>
        
        <!--Begining of HTML -->
        <h1>Book Inventory Managenment</h1>
         <?php 
            if(empty($_COOKIE['user'])) {
                echo '<input type="text" id="userName" placeholder="User Name">    
                <button type="button" onclick="login()">Login</button>';
            }       
        else {  echo "<div style='display:flex; width:100vw; flex-direction: row'>";
                echo "<h2>Welcome Back, " . $_COOKIE[$cookie_name]."  ";
                echo '<button type="button" onclick="logout()">Logout</button>';
                echo "<span style='width:200px'>      </span>";
                echo "<a href='./cart.php'><img border='2px solid purple'src='./images/cart.jpg' width='45px' /></a>";
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
