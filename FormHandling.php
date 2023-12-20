<?php
    class RRFormHandler{
        // Array to store rates and reviews
        private $RRs = [];

        // File name to store serialized data
        private $file;

        public function __construct($file) {
            $this->file = $file;
            // Load existing data from file when object is created
            $this->loadData();
        }
    
        private function loadData() {
            if (file_exists($this->file)) {
                $existingData = file_get_contents($this->file);
                // Unserialize stored data into the $RRs array
                $this->RRs = unserialize($existingData);
            }
        }
    
        private function saveData() {
            // Serialize and save the $RRs array to the file
            file_put_contents($this->file, serialize($this->RRs));
        }
        
        // To add data
        public function add($rate, $review){
            $this->RRs[] = [
                'rate' => $rate,
                'review' => $review,
            ];
            // Save updated data after adding a new rate and review
            $this->saveData();
        }

        // Delete the specified index from the array and Save updated data after deletion
        public function delete($index){
            if(isset($this->RRs[$index])){
                unset($this->RRs[$index]);
                $this->saveData();
            }
        }

        public function displayTable(){
            if (empty($this->RRs)) {
                echo '<p>No rates and reviews available.</p>';
            } else {
                echo '<table border="1">';
                echo '<tr><th>Rates</th><th>Reviews</th><th>Action</th></tr>';
                foreach ($this->RRs as $index => $item) {
                    echo '<tr>';
                    echo '<td>' . $item['rate'] . '</td>';
                    echo '<td>' . $item['review'] . '</td>';
                    echo '<td><a href="?action=delete&index=' . $index . '">Delete</a></td>';
                    echo '</tr>';
                }
                echo '</table>';
            }
        }
    }

    $file ='RatesData.txt';
    // instance of RRFormHandler
    $RRsForm = new RRFormHandler($file);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $rate = $_POST['rate'];
        $review = $_POST['comment'];
    
        // Add new rate and review when form is submitted
        $RRsForm->add($rate, $review);
    }

    if (isset($_GET['action']) && $_GET['action'] === 'delete') {
        $index = isset($_GET['index']) ? $_GET['index'] : null;
        // Delete the specified index when the 'Delete' action is requested
        $RRsForm->delete($index);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <title>Rates & Reviews</title>
        <link rel="icon" type="icon/x-image" href="icon.png">
        <!--styling sheet-->
        <link rel="stylesheet" href="books.css">
        <script type="text/javascript" src="calclation.js"></script>
        
        <style>
            .navbar-nav{gap: 30px;}

            .text {
            width: 180px;
            }
            table{
                background-color: rgba(255, 219, 219, 0.285);
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
                color:rgb(253, 224, 224);
                font-weight:bold;
            }
        </style>
    </head>
<!----------------------------------------------------------------------------------------------------------------->
<!--navbar-->
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
            <!--header-->
            <div >         
                <h1 style=" 
                background-image: url('disply_bg.png'); 
                color: white;
                padding: 10%;
                font-family: 'Courier New';
                font-weight: bold;
                float:center;
                text-align: center; "> Rates&Reviews</h1>
                </div>
            
            <!--rate and review-->
            <div class="row">
                <div><h5 style="color: rgb(67, 20, 20);
                        font-family:'Gill Sans', 'Gill Sans MT', 'Trebuchet MS', sans-serif;
                        font-weight: bolder; margin-left:33%;">would you like to add another rate and comment??</h5></div>
                <br><br>
                <form id="myfont" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="col">
                        <!-- comments box -->
                        <label style="padding-left:10%;"> Comments on the novel: <p> <textarea name="comment" rows="4" cols="50" placeholder=" you can write your opinions and thoughts"></textarea></p></label>

                        <!-- star rating -->
                        <label style="padding: 5%; float:left;" > Rate the novel: 
                            <select size="1" name="rate">
                                <option>5 stars</option>
                                <option>4 stars</option>
                                <option>3 stars</option>
                                <option>2 stars</option>
                                <option>1 stars</option>
                            </select>
                        </label>
                        <label style="padding-bottom: 2%; padding-left: 5%;">
                            <input type="submit" name="submit" value="Submit review" style="float: right;"/>
                        </label>
                    </div>
                </form>
                <div><h2>Ratings and Reviews</h2></div>

                <!--calling the php code above-->
                <?php echo $RRsForm->displayTable(); ?>

                <!--link to go back to previous page-->
                <a href="bookDisplay.php" style="margin-bottom:2%;"> &lt &lt Go back </a>
            </div>
        </div>
    </body>
</html>