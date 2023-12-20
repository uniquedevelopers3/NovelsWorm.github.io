<?php
    class QFormHandler{
        // Array to store ansewrs of Qs
        private $Qs = [];
    
        // To add data
        public function add($email, $gender, $age, $genre,$otherGenre, $improve){
            $this->Qs[] = [
                'email'=> $email,
                'gender' => $gender,
                'age' => $age,
                'genre' => $genre,
                'genre_other' => $otherGenre,
                'improve' => $improve,
            ];
        }

        public function displayTable(){
            if (empty($this->Qs)) {
                echo '<p>There is no available data.</p>';
            } else {
                echo '<table border="1">';
                echo '<tr><th>Email</th><th>Gender</th><th>Age</th><th>Genre</th><th>Improve suggestion</th></tr>';
                foreach ($this->Qs as $index => $item) {
                    echo '<tr>';
                    echo '<td>' . $item['email'] . '</td>';
                    echo '<td>' . $item['gender'] . '</td>';
                    echo '<td>' . $item['age'] . '</td>';
                    echo '<td>' . implode(', ', $item['genre']) .':' .$item['genre_other'] .'</td>';
                    echo '<td>' . $item['improve'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            }
        }
    }

    
    // instance of QFormHandler
    $QsForm = new QFormHandler();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['Email'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        // Check if the 'genre' array is set in the POST data
        $genres = isset($_POST['genre']) ? $_POST['genre'] : [];

        // If 'other' is selected, get the value from the text input
        $otherGenre = isset($_POST['genre_other']) ? $_POST['genre_other'] : '';
        $improve = $_POST['more'];
        
        $QsForm->add($email, $gender, $age, $genres,$otherGenre, $improve);
    }  
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <title>Questionnarie</title>
        <link rel="icon" type="icon/x-image" href="icon.png">
        <!--styling sheet-->
        <link rel="stylesheet" href="books.css">
        <script type="text/javascript" src="calclation.js"></script>
        
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background: #FFDD88;
                background: linear-gradient(0deg, rgba(203, 131, 100,0.4) 0%, rgba(255, 235, 178,1) 100%);
            }
            .navbar-nav{gap: 30px;}

            .text {
            width: 180px;
            }
            table{
                background-color: rgba(255, 164, 139, 0.395);
                margin-bottom:5%;
            }
            th,td,tr{
                border-bottom: 1px solid rgb(253, 224, 224);
               border-top: none;
               border-left: none;
               border-right: none;
               width:20%;
               padding: 1% ;
               text-align: center; 
            }
            th{
                color: rgb(67, 20, 20);
                font-family:'Gill Sans', 'Gill Sans MT', 'Trebuchet MS', sans-serif;
                font-weight: bolder;
            }
            a{
                text-align:center;
                text-decoration:none;
                color:rgb(112, 33, 33);
                font-weight:bold;
            }
        </style>
    </head>
<!----------------------------------------------------------------------------------------------------------------->
<!--navbar-->
    <body>
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
                            <a class="nav-link " href="display.php">Display</a>
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
            
            <!--summary display-->
            <div class="row">
                <div style="padding:3%; margin-top:3%;">
                    <h3 style="padding-bottom:2%; font-weight:bold; color:rgb(67, 20, 20);">Thank You!!</h3>
                    <h5>For helping us improve our services, Here is a summary of what you have provided :</h5>
                </div>
                <div style="padding-left:5%;">
                <!--calling the php code above-->
                <?php echo $QsForm->displayTable(); ?>
                </div>
                <br><br>
                <!--link to go back to previous page-->
                <div style="margin-bottom:4%;">
                    <h5 style="padding-left:2%;">If you would like to modify any information you can
                    <a href="questionnaire.php"> &lt &lt Go back </a>
                    </h5>
                </div>
                 <!--footer-->
                <footer class="text-center text-white" style="background-color: #14171a">
                    <div class="text-center p-3" style="background-color: rgba(117, 117, 117, 0.179)">
                    © 2023 Copyright:
                    <a class="text-white" href=""> NovelsWorm.com </a>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>