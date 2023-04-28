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
            $conn = new mysqli($host, $user, $pass, $database);
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
            if($Operation == "Edit"){
                include './operations/edit.php';
            }
        ?>
    </body>
</html>
