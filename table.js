function novelInfo (title, author, genre){
    this.title = title;
    this.author = author;
    this.genre = genre;
}

let novelArray = [
    new novelInfo("Phantom", "Jo Nesbo", "Crime fiction"),
    new novelInfo("Daddy long legs", "Jean Webster", "Young adult"),
];

// function to disply Info of the array
function bookDisplay(){
    let tableBody = document.getElementById("table").getElementsByTagName('tbody')[0];

    novelArray.forEach(function (novelInfo){
        var row = tableBody.insertRow();
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);

        cell1.innerHTML = novelInfo.title;
        cell2.innerHTML = novelInfo.author;
        cell3.innerHTML = novelInfo.genre;
    });
}

// function to add data
function addData(){
    // get value from input
    let titleValue = document.getElementById("title").value;
    let authorValue = document.getElementById("author").value;
    let genreValue = document.getElementById("genre").value;

    //instance of object
    let newNovel = new novelInfo (titleValue, authorValue, genreValue);
    // add the new item to the array
    novelArray.push(newNovel);

    // Clear input fields
    document.getElementById("title").value = "";
    document.getElementById("author").value = "";
    document.getElementById("genre").value = "";

    //refresh the table
    refreshBookDisplay();
}

function refreshBookDisplay() {
    var tableBody = document.getElementById("table").getElementsByTagName('tbody')[0];
    tableBody.innerHTML = ""; // clear existing table rows
    bookDisplay(); // disply the updated data
}

// function to search info
function searchData(){
    let searchTitle = document.getElementById("searchTitle").value;
    // filter the array
    let searchResult = novelArray.filter(function (novelInfo){
            return novelInfo.title.toLowerCase().includes(searchTitle.toLowerCase());
        });
    // disply results:
    displayResults(searchResult, "table");
}

// function to display search results
function displayResults(results, tableName){
    var tableBody = document.getElementById("table").getElementsByTagName('tbody')[0];
    tableBody.innerHTML = "";

    results.forEach(function (result){
        var row = tableBody.insertRow();
        for(var key in result){
            var cell = row.insertCell();
            cell.innerHTML = result[key];
        }
    });
}


