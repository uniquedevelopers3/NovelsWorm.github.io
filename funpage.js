var worm = document.getElementById("worm");
worm.style.left = "20px";
var book = document.getElementById("book");
var counter = 0;

function jump(){
    
    if(worm.classList == 'animate'){return}
    worm.classList.add("animate");
    setTimeout(function(){worm.classList.remove("animate")},300);
}

function areElementsOverlapping(element1, element2) {
    const rect1 = element1.getBoundingClientRect();
    const rect2 = element2.getBoundingClientRect();

    return (
        rect1.right >= rect2.left &&
        rect1.left <= rect2.right &&
        rect1.bottom >= rect2.top &&
        rect1.top <= rect2.bottom
    );
}

var checkCollide = setInterval(function(){ 
         
    if (areElementsOverlapping(worm, book)) {

        book.style.animation = "none";
        if (Math.floor(counter/100) >= 10){
            alert("A reader can never escape from books (:\n but you scored "+Math.floor(counter/100)+
            "\nso you can get a 10% discount, enter the code : novelSworm10 ");
            book.style.animation = "book 2s infinite linear"
            document.getElementById("score").style.display ='none';
        }else{
            alert("A reader can never escape from books (: \nTry again! (Press CTRL + R to retry)");
            book.style.animation = "book 2s infinite linear"
            counter = 0;
            document.getElementById("score").style.display ='none';
        }
        
        
    }else{
        counter++;
        document.getElementById("score").innerHTML = Math.floor(counter/100);;
    }
    },10);

