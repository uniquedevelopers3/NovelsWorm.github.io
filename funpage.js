var worm = document.getElementById("worm");
var book = document.getElementById("book");
var counter = 0;

function jump(){
    if(worm.classList == 'animate'){return}
    worm.classList.add("animate");
    setTimeout(function(){worm.classList.remove("animate")},300);
}

var checkCollide = setInterval(function(){
    let wormTop = parseInt(window.getComputedStyle(worm).getPropertyValue("top"));
    let bookLeft = parseInt(window.getComputedStyle(book).getPropertyValue("left"));        
    if(bookLeft < 20 && bookLeft > -40 && wormTop >= 130){
        book.style.animation = "none";
        if (Math.floor(counter/100) >= 10){
            alert("A reader can never escape from books (: ,\n but you scored "+Math.floor(counter/100)+
            "\nso you can get a 10% discount, enter the code : novelSworm10 ");
            book.style.animation = "book 2s infinite linear"
            document.getElementById("score").style.display ='none';
        }else{
            alert("A reader can never escape from books (: \ntry again! (press CTRL + R to retry)");
            book.style.animation = "book 2s infinite linear"
            counter = 0;
            document.getElementById("score").style.display ='none';
        }
        
        
    }else{
        counter++;
        document.getElementById("score").innerHTML = Math.floor(counter/100);;
    }
    },10);

