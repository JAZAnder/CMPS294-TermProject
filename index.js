function advancedSearch(){
    document.getElementById("actionForm").innerHTML= 'Operation : <select name="Operation" id=""><option value="Search">Search</option><option value="Add">Add</option><option value="Delete">Delete</option></select>Title : <input type="text" name="Title" id="">Author : <input type="text" name="Author" id="">ISBN : <input type="text" name="ISBN" id="">Publisher : <input type="text" name="Publisher" id="">Year : <input type="text" name="Year" id=""><input type="submit" value="Search"><button onclick="basicSearch()">Basic</button>';
}

function basicSearch(){
    document.getElementById("actionForm").innerHTML='<input type="hidden" value="Search" name="Operation"/>Search : <input type="text" name="Title" id=""><input type="submit" value="Search"><button onclick="advancedSearch()">Advanced</button>';
    
}


