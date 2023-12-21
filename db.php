<!DOCTYPE html>
<html>
<head>
    <title>Tables</title>
	<!--Title, icon and bootstrap link-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="icon.png">
    <style>

        * {
            
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 30px;
            
        }
        h3 {
            margin: 30px;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        body {
            
    	font-family: 'Nunito', sans-serif;
    	background: #FFDD88;
    	background: linear-gradient(0deg, rgba(203, 131, 100,0.4) 0%, rgba(255, 235, 178,1) 100%);
    }

    /* Styling for navigation bar */
	.navbar-nav  {
        gap: 30px;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

	/* Styling for the header */
	h1{
        text-align: center; 
        background-size: cover;
        color: white;
        padding: 10%;
        font-weight:bold;
        font-size:60px;
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
<!--************************************************************************************************************-->
	<!--Page header-->
	<div style= " background-image: url('feed.jpg')" >         
		<h1 background-color:rgba(255, 249, 234, 1);>Payment</h1>
	</div>
	<br><br><br>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "novelsworms";

// 1- Create DB connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// 2- Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    print "You are connected to $dbname <br />";
}

// 3- Specify SQL statement for the book table
$sql_book = "SELECT DISTINCT * FROM `book`";
$result_book = mysqli_query($conn, $sql_book);

// 4- Specify SQL statement for the rating table
$sql_rating = "SELECT DISTINCT * FROM `rating`";
$result_rating = mysqli_query($conn, $sql_rating);

// 5- Specify SQL statement for the register table
$sql_register = "SELECT DISTINCT * FROM `register`";
$result_register = mysqli_query($conn, $sql_register);
?>
<br>
<br>
<h3>Book table</h3> 
<!-- HTML table for the book records -->
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Displaying the records in the book table
        while ($row_book = mysqli_fetch_assoc($result_book)) {
            echo "<tr>";
            echo "<td>{$row_book['title']}</td>";
            echo "<td>{$row_book['author']}</td>";
            echo "<td>{$row_book['genre']}</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<br><br>
<h3>Rating table</h3>

<!-- HTML table for the rating records -->
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Rate</th>
            <th>Percentage of Book</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Displaying the records in the rating table
        while ($row_rating = mysqli_fetch_assoc($result_rating)) {
            echo "<tr>";
            echo "<td>{$row_rating['title']}</td>";
            echo "<td>{$row_rating['rate']}</td>";
            echo "<td>{$row_rating['percentageofbook']}</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<br><br>
<h3>Register table</h3>

<!-- HTML table for the register records -->
<table>
    <thead>
        <tr>
            <th>User</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Displaying the records in the register table
        while ($row_register = mysqli_fetch_assoc($result_register)) {
            echo "<tr>";
            echo "<td>{$row_register['user']}</td>";
            echo "<td>{$row_register['email']}</td>";
            echo "<td>{$row_register['password']}</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<?php
// 6- Close DB connection
mysqli_close($conn);
?>

</body>
</html>
