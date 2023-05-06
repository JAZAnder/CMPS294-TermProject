function advancedSearch() {
  document.getElementById("actionForm").innerHTML =
    'Operation : <select name="Operation" id="Operation" onchange="changer()"><option value="Search" onClick="searchButton()">Search</option><option value="Add" onClick="addButton()">Add</option><option value="Delete" onClick="deleteButton()">Delete</option></select>Title : <input type="text" name="Title" id="">Author : <input type="text" name="Author" id="">ISBN : <input type="text" name="ISBN" id="">Publisher : <input type="text" name="Publisher" id="">Year : <input type="text" name="Year" id=""><span id="submitButton"><input type="submit" value="Search"></span><button onclick="basicSearch()">Basic</button>';
}

function basicSearch() {
  document.getElementById("actionForm").innerHTML =
    '<input type="hidden" value="Search" name="Operation"/>Search : <input type="text" name="Title" id=""><input type="submit" value="Search"><button onclick="advancedSearch()">Advanced</button>';
}

function changer() { // This javascript function is used for the operations dropdown to change the options dynamically on the screen depending on the users choice.
  var option = document.getElementById("Operation").value;

  if (option == "Search") {
    document.getElementById("submitButton").innerHTML =
      '<input type="submit" value="Search">';
  } else if (option == "Add") {
    document.getElementById("submitButton").innerHTML =
      '<input type="submit" value="Add">';
  } else if (option == "Delete") {
    document.getElementById("submitButton").innerHTML =
      '<input type="submit" value="Delete">';
  }
}

function login() { // This is a javascript function that will set the cookie to the value that is inside the field and then reload the page.
 let username = document.getElementById("userName").value;
 document.cookie = 'user='+username;
  window.location.reload();

  

}
function logout(){ // This is a javascript function that will remove the cookie from the browser by setting it to nothing and then reload the page.
    document.cookie = "user=";
    window.location.reload();
}
