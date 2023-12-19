<!DOCTYPE HTML>
<html>
    <head>
    <head>
        <!--Title, icon and bootstrap link-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <title>Search</title>
        <link rel="icon" href="icon.png">

        <style>
            /*Document level style sheet*/

            .navbar-nav  {
                gap: 30px;
                font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            }

            body {
                font-family: 'Nunito', sans-serif;
                background: #FFDD88;
                background: linear-gradient(0deg, rgba(203, 131, 100,0.4) 0%, rgba(255, 235, 178,1) 100%);
                
            }

            h1{
                text-align: center; 
                background-size: cover;
                color: white;
                padding: 10%;
                font-weight:bold;
                font-size:60px;
                background-repeat: no-repeat;
                background-image: url('datas.jpg')
           }

           table {
                border-collapse: collapse;
                margin-left: 10%;
                background-color: white;
            }

            th, td {
                border: 2px solid black;
                padding: 8px;
                text-align: left;
            }

            th {
                font-weight: bold !important;

            }

            h5 ,p{margin-left: 10%;}

            footer {
                position:relative;
                bottom:0;
            }

        </style>
    </head>
    <body>
        <!--Navbar-->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark rounded-top">
            <div>
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.html">
                            <img style="width: 30px; height: 30px;" src="icon.png"> </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="display.php">Display</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="cart.html">
                            <img src="cart.png" width="25px" height="24px" style="margin-top: 2.9px;">
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="JoinUs.html">Join us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="contactUs.html">Contact us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="aboutUs.html">About us</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!--Page header-->
        <div>         
            <h1 background-color:rgba(255, 249, 234, 1);>Search</h1>
        </div>
        <br><br><br>

        <?php
            $Auth = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST"){ //Check if the form is submitted by post method
                $Auth = search($_POST["Author"]); //Calling the search function
            }

            //A function that trims leading and trailing whitespaces, remove backslashes, and convert special characters to HTML elements
            function search($data){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>

        <!--Form to get the author's name (try "أسامة المسلم")-->
        <h5>Enter auther's name:</h5><br>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="margin-left: 10%;">
            <input type="text" name="Author" value="<?php echo $Auth;?>">
            <input type="submit" name="submit" value="search">
        </form><br>


        <?php
            //Database connection parameters
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "novelsworm";

            //Create a connection to the database
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            //Query to select novels based on the entered author
            $sql = "SELECT * FROM book WHERE author = '" . $Auth . "'";

            //Execute the SQL query
            $result = mysqli_query($conn, $sql);

            //Check if there are rows in the result set
            if (mysqli_num_rows($result) > 0) {
                //Display a table with the novel information
                echo "<table border = '1'><tr><th>Name</th><th>Author</th><th>Genre</th></tr>";
                while($row = mysqli_fetch_assoc($result)) {      
                    echo "<tr>".
                        "<td>".$row["name"]."</td>".
                        "<td>".$row["author"]."</td>".
                        "<td>".$row["genre"]."</td>".
                        "</tr>";
                }
                echo "</table>";
            } 
            
            //Display a message if no novels where found
            else {
                echo "<p>No novels were found</p>";
            }

            mysqli_close($conn);//Close the database connection
        ?><br><br><br>

        <!--Footer-->
        <footer class="text-center text-white" style="background-color:#14171a">
            <div class="text-center p-3" style="background-color: rgba(117, 117, 117, 0.179)">
              © 2023 Copyright:
                <a class="text-white" href=""> NovelsWorm.com </a>
            </div>
        </footer>
    </body>
</html>