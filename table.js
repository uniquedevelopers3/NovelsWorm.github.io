function novelInfo (title, author, genre){
    this.title = title;
    this.author = author;
    this.genre = genre;
}

let novelArray = [
    new novelInfo("Phantom", "Jo Nesbo", "Crime fiction")
];

// function to disply Info of the array
function bookDisply(){
    let tableBody = document.getElementById("table").getElementsByTagName('tbody')[0];
    // clear rows
    tableBody.innerHTML = "";

    novelArray.forEach(item =>{
        let row = tableBody.insertRow();
        row.insertCell(0).textContent = item.title;
        row.insertCell(1).textContent = item.author;
        row.insertCell(2).textContent = item.genre;
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

    bookDisply();
}

// function to search info
function searchData(){
    let searchQuery = document.getElementById("searchQuery").value;
    // filter the array
    let searchResult = novelArray.filter(item =>
            item.title.toLowerCase().includes(searchQuery.toLowerCase()) ||
            item.author.toLowerCase().includes(searchQuery.toLowerCase()) ||
            item.genre.toLowerCase().includes(searchQuery.toLowerCase()) 
        );
    // disply results:
    novelArray = searchResult; 
    bookDisply();
}


