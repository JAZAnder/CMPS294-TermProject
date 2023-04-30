function advancedSearch(){
    document.getElementById("actionForm").innerHTML= 'Operation : <select name="Operation" id="Operation" onchange="changer()"><option value="Search" onClick="searchButton()">Search</option><option value="Add" onClick="addButton()">Add</option><option value="Delete" onClick="deleteButton()">Delete</option></select>Title : <input type="text" name="Title" id="">Author : <input type="text" name="Author" id="">ISBN : <input type="text" name="ISBN" id="">Publisher : <input type="text" name="Publisher" id="">Year : <input type="text" name="Year" id=""><span id="submitButton"><input type="submit" value="Search"></span><button onclick="basicSearch()">Basic</button>';
}

function basicSearch(){
    document.getElementById("actionForm").innerHTML='<input type="hidden" value="Search" name="Operation"/>Search : <input type="text" name="Title" id=""><input type="submit" value="Search"><button onclick="advancedSearch()">Advanced</button>';
    
}

function changer(){
   var option = document.getElementById("Operation").value;

    if(option == "Search"){
        document.getElementById('submitButton').innerHTML = '<input type="submit" value="Search">';     
    }
    else if(option == "Add"){
        document.getElementById('submitButton').innerHTML = '<input type="submit" value="Add">';
    }
    else if(option == "Delete"){
        document.getElementById('submitButton').innerHTML = '<input type="submit" value="Delete">';
    }
}




