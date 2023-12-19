<!DOCTYPE HTML>
<html>
    <head>
    <head>
        <!--Title, icon and bootstrap link-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <title>Insert</title>
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
            background-image: url('datas.jpg')
           }

            h5, p{margin-left: 10%;}

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
            <h1 background-color:rgba(255, 249, 234, 1);>Insert</h1>
        </div>
        <br><br><br>

        <!--A form for insertiing the novel's information-->
        <h5>Enter the novel's informations to insert it:</h5><br>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="margin-left: 10%;">
            <label for="name">Name: </label>
            <input type="text" name="name"><br><br>
            <label for="author">Author: </label>
            <input type="text" name="author"><br><br>
            <label for="genre">Genre: </label>
            <input type="text" name="genre"><br><br>
            <input type="submit" name="submit" value="insert">
        </form><br>

        <?php
            //Database connection parameters
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "novelsworm";

            //Variables
            $name = $auth = $genre = "";

            //Check if the form is submitted by post method
            if ($_SERVER["REQUEST_METHOD"] == "POST"){

                //Retrieve and store form data
                $name = $_POST["name"];
                $auth = $_POST["author"];
                $genre = $_POST["genre"];
                
                //Create a connection to the database
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                //SQL query to insert novel/s information into the database
                $sql = "INSERT INTO book (name, author, genre) VALUES ('$name','$auth','$genre')";

                //Display success or error message
                echo "<p>Record inserted successfully!</p>";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                mysqli_close($conn); //Close the database connection
            }

            
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