<?php
    header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <title>Disply-Phantom</title>
        <link rel="icon" type="icon/x-image" href="icon.png">
        <!--styling sheet-->
        <link rel="stylesheet" href="books.css">
        <script type="text/javascript" src="calclation.js"></script>
        
        <style>
            .navbar-nav{gap: 30px;}

            .text {
            width: 180px;
        }
        </style>
    </head>
<!----------------------------------------------------------------------------------------------------------------->
    <body style="background-color: rgb(203, 131, 100);">
        <div>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark rounded-top">
                <div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.html">
                                <img style="width: 30px; height: 30pxS;" src="icon.png"> </a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link active" href="display.php">Display</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="cart.html">
                                <img src="cart.png" width="25px" height="24px">
                            </a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="JoinUs.html">Join us</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="contactUs.html">Contact us</a>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link " href="aboutUs.html">About us</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--header-->
            <div >         
                <h1 style=" 
                background-image: url('disply_bg.png'); 
                color: white;
                padding: 10%;
                font-family: 'Courier New';
                font-weight: bold;
                float:center;
                text-align: center; "> Display</h1>
                </div>

            <!--the book disply-->
            <div>
                <br>
                <div class="row">
                    <h2>Novel Information :</h2>
                </div>
                <br> 
                <div class="row" >
                    <div class="col-1"></div>
                    <!--this colomn will disply the book cover and add to cart link-->
                    <div class="col-5">

                        <!--book cover-->
                        <img src="phantom.jpg" alt="phantom book cover" class="styling">
                        <br>
                        <br>
                        <!--add to cart link-->
                        <!-- Button to trigger calculatePrice() and redirect to cart.html -->
                        <button onclick="addToCart()" class="btn btn-outline-light" style="margin-top: 20px; margin-right: 20px; margin-bottom: 20px; padding: 10px; margin-left: 180px;">Add to Cart</button>

                        <!-- Input element for displaying total price -->
                         <span id="totalPrice" style="font-size: 0px;">0.00 OR</span>
                        
                    </div>

                    <!--this colomn has a table to disply the book info-->
                    <div class="col">
                        <table>
                            <tr>
                                <td class="td">الشبح</td>
                                <th class="th"> الرواية</th>
                            </tr>
                            <tr>
                                <td class="td">جو نيسبو</td>
                                <th class="th"> المؤلف</th>
                            </tr>
                            <tr>
                                <td class="td">جريمة\ بوليسي</td>
                                <th class="th">التصنيف</th>
                            </tr>
                            <tr>
                                <td class="td">حين انتقل "هاري هول" إلى هونغ كونغ، كان يظن أنه يهرب من جروح حياته في أوسلو،
                                     ومن مهنته كمحقق يسعى لفعل الخير. لكن ما لم يفكر فيه قد حصل؛
                                      فها هو أوليغ الصبي الذي ساعد في تربيته قد تم اعتقاله بتهمة قتل رجل. لم يصدق هاري أن أوليغ
                                     قد يكون القاتل، لذا عاد إلى أوسلو لمطاردة القاتل الحقيقي. وعلى الرغم من
                                    أنه لم يعد يعمل في سلك الشرطة، كانت لديه قضية عليه حلها. وسترسله هذه القضية إلى أعماق عالم المخدرات في المدينة،
                                     حيث ينتشر نوع جديد من المخدرات القاتلة. هذه التحريات الشخصية ستقود هاري هول لمواجهة ماضيه والحقيقة المرة المتعلقة به وبأوليغ.</td>
                                <th class="th">النبذة</th>
                            </tr>
                        </table>
                    </div>
                    <div class="col-1"></div>
                </div>
                <br>
                <br>

                <!--rating-->
                <div class="row">
                    <div><h2>Ratings and Reviews</h2></div>
                    <form action="FormHandling.php" id="myfont" method="post">
                    <div class="col">
                        <!--comments box-->
                        <label style="padding-left:10%;"> Comments on the novel: <p> <textarea name="comment" rows="4" cols="50" placeholder=" you can write your opinions and thoughts"></textarea></p></label>
                        
                        <!--star rating-->
                        <label style="padding: 5%; float:left;" > Rate the novel: 
                          <select size="1" name="rate">
                            <option>5 stars</option>
                            <option>4 stars</option>
                            <option>3 stars</option>
                            <option>2 stars</option>
                            <option>1 stars</option>
                        </select></label>
                        <label style="padding-bottom: 2%; padding-left: 5%;">
                            <input type="submit" value="Submit review" style="float: right;"/>
                        </label>
                    </div>
                    </form>
                </div>
            </div><br>
            <!--link to ratings and reviews page-->
            <div>
            <a href="FormHandling.php" style="text-align:center;
                text-decoration:none;
                color:rgb(253, 224, 224);
                font-weight:bold; margin-left:42%;">Check ratings & reviews &gt &gt</a>
            </div>
            <br><br><br>
            <!--dynamic table-->
            <div class="container rounded" style="font-size: 20px; border: 5px dashed rgba(0,0,0, 0.65); background-color: rgba(128, 73, 45, 0.4); color: rgb(255, 255, 255) ; ">
            <h2 style="text-align: center; font-weight: bold; color: white; margin-top: 20px;"> Novel<img src="headicon.png" height="60px" width="60px"> Info</h2> 
            <table id="table" class="table">
                <thead>
                    <tr>
                        <th style="text-align: center;">Title</th>
                        <th style="text-align: center;">Author</th>
                        <th style="text-align: center;">Genre</th>
                    </tr>
                </thead>
                <tbody></tbody>
             </table>
             <br><br>
             <!--form for adding Info-->
             <form onsubmit="addData(); return false;">
                <label > Title:</label>
                <input type="text" id="title" class="text" style="margin-right: 10px;">
                
                <label> Author:</label>
                <input type="text" id="author" class="text" style="margin-right: 10px;">
                
                <label> Genre: </label>
                <input type="text" id="genre" class="text" style="margin-right: 10px;">

                <button type="submit" class="btn btn-outline-light" style="width: 100px; height: 40px; border-radius: 10px; font-weight: bold; margin-left: 2%;"> Add</button>
             </form>
             <br>
             <!--form for searching-->
             <form onsubmit="searchData(); return false;">
                <p>Do want to search for a specific book ?</p>
                <label for="searchTitle">Enter title:</label>
                <input type="text" id="searchTitle" class="text">
                <button type="submit" class="btn btn-outline-light" style="width: 100px; height: 40px; border-radius: 10px; font-weight: bold; margin-left: 2%;"> Search </button>
             </form>
             <br>
            </div>
            <br><br>
            <!--footer-->
            <footer class="text-center text-white" style="background-color: #14171a">
                <div class="text-center p-3" style="background-color: rgba(117, 117, 117, 0.179)">
                  © 2023 Copyright:
                  <a class="text-white" href=""> NovelsWorm.com </a>
                </div>
              </footer>
        </div><!--container div-->

        <script>
            function calculatePrice() {
                count += 1;
                var totalPrice = (count * 0.500).toFixed(2);
                document.getElementById("totalPrice").innerText = totalPrice + " OR";
                return totalPrice; // Add this line to return the calculated total price
            }

        
            function addToCart() {
                var totalPrice = calculatePrice(); // Get the total price
                window.location.href = 'cart.html?total=' + totalPrice; // Redirect to cart.html with total price parameter
            }

            //----------------------------------------------------------------------------------------------------------------------

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

                    cell1.style.textAlign = "center";
                    cell2.style.textAlign = "center";
                    cell3.style.textAlign = "center";
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
                var tableBody = document.getElementById(tableName).getElementsByTagName('tbody')[0];
                tableBody.innerHTML = "";
                tableBody.style.textAlign = "center";

                results.forEach(function (result){
                    var row = tableBody.insertRow();
                    for(var key in result){
                        var cell = row.insertCell();
                        cell.innerHTML = result[key];
                    }
                });
            }



        </script>
    </body>
</html>