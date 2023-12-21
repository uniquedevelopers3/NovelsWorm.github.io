<html>
    <head>
        <!--Title, icon and bootstrap link-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <title>Questionnaire</title>
        <link rel="icon" href="icon.png">

        <style>
            /*Document level style sheet*/
            body {
                font-family: 'Nunito', sans-serif;
                background: #FFDD88;
                background: linear-gradient(0deg, rgba(203, 131, 100,0.4) 0%, rgba(255, 235, 178,1) 100%);
            }

            .navbar-nav  {
                gap: 30px;
                font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            }

            h1{
             text-align: center; 
            background-size: cover;
            color: white;
            padding: 10%;
            font-weight:bold;
            font-size:60px;
           }

           .check{
            height: 20px;
            width: 20px;
           }

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
        <div style= " background-image: url('feed.jpg')" >         
            <h1 background-color:rgba(255, 249, 234, 1);>Questionnaire</h1>
        </div>
        <br><br><br>

        <!--Feedback form-->
        <div class="container rounded" style="font-size: 22px; border-style: dashed; border-color: rgba(0,0,0,0.65); border-width: 5px; background-color: rgba(128, 73, 45, 0.4); color: rgb(255, 255, 255);">
            <div style="margin-left: 5%; ">    
                
                <h2 class="display-5 fw-bold" style="margin-top: 5%;">Feedback form</h2><br>
                <p style="font-size: 23px;">Help us improve our services</p><br>

                <form action="SecondFormHandling.php" method="post" name="feedback" onsubmit="return FormValidation()"><!--Checking input validation when submit button is clicked using the functtion FormValidation()-->

                    <!--Asking for customer's email (input type: text)-->
                    <label for="E-mail">Email address</label>
                        <input type="text" placeholder="Enter email" name="Email" id="Email" ><br><br>

                    <!--Asking for customer's gender (input type: radio button)-->
                    <label>Gender:</label>
                        <input type="radio" name="gender" value="male" class="check"> Male
                        <input type="radio" name="gender" value="female" class="check"> Female
                    <br><br>

                    <!--Asking for customer's age (input type: menu)-->
                    <label>Age</label>
                        <select style="height: 25px; color: rgb(107, 106, 106);" name="age">
                            <option>&lt;10</option>
                            <option>11-15</option>
                            <option>16-18</option>
                            <option>19-24</option>
                            <option>25-30</option>
                            <option>&gt;30</option>
                        </select><br><br>

                    <!--Asking for customer's favorite genre (input type: checkbox)-->
                    <label>
                        <p>Choose your favorite genres:</p>
                    </label>
                        <input type="checkbox" name="genre[]" value="science fiction" class="check"> Science Fiction 
                        <input type="checkbox" name="genre[]" value="horror" class="check" style="margin-left: 10px;"> Horror 
                        <input type="checkbox" name="genre[]" value="fantasy" class="check" style="margin-left: 10px;"> Fantasy 
                        <input type="checkbox" name="genre[]" value="mystery" class="check" style="margin-left: 10px;"> Mystery 
                        <input type="checkbox" name="genre[]" value="young adult" class="check" style="margin-left: 10px;"> Young adult <br>
                        <input type="checkbox" name="genre[]" value="historical" class="check" style="margin-left: 10px;"> Historical
                        <input type="checkbox" name="genre[]" value="other" class="check" id="genreOther" style="margin-left: 10px;"> other: 
                        <input type="text" name="genre_other" id="otherText">
                    <br><br>

                    <!--Asking for customer's other comments (input type: text area)-->
                    <label>
                        <p>
                            How can we improve our website? What would you like us to add?
                        </p>
                        <textarea cols="30" rows="6" name="more" id="more">
                            
                        </textarea>
                    </label><br><br>

                    <!--Submit button-->
                    <input type="submit" value="Send" name="Submit">
                </form>
            </div>
        </div><br><br><br>
            
        
        <!--Footer-->
        <footer class="text-center text-white" style="background-color:#14171a">
            <div class="text-center p-3" style="background-color: rgba(117, 117, 117, 0.179)">
              © 2023 Copyright:
                <a class="text-white" href=""> NovelsWorm.com </a>
            </div>
        </footer>

        <!--javascript-->
        <script>
            //Function that check user's inputs and show alert if any input is wrong
            function FormValidation() {
                let email = document.forms["feedback"]["Email"];
                let male = document.forms["feedback"]["gender"].value == "male";
                let female = document.forms["feedback"]["gender"].value == "female";
                let select = document.forms["feedback"]["age"];
                let check = document.querySelectorAll("input[name = 'genre[]']:checked");
                let otherCheck = document.forms["feedback"]["genreOther"];
                let otherText = document.forms["feedback"]["otherText"];
                let textArea = document.forms["feedback"]["more"];
                

                //Email should not be empty
                if(email.value == ""){
                    alert("Please enter a valid e-mail address.");
                    email.focus();
                    return false;
                }

                //Email should include '@'
                if(email.value.indexOf('@', 0) < 0){
                    alert("Please enter a valid e-mail address.");
                    email.focus();
                    return false;
                }

                //Email should include '.'
                if(email.value.indexOf('.', 0) < 0){
                    alert("Please enter a valid e-mail address.");
                    email.focus();
                    return false;
                }
                
                //User must enter his gender either male or female 
                if(!(male || female)){
                    alert("Please enter your gender.");
                    return false;
                }

                //User should choose his age
                if(select.selectedIndex < 1){
                    alert("Please enter your age.");
                    select.focus();
                    return false;
                }
                
                //User should select at least one genre
                if(check.length == 0){
                    alert("Please select at least one genre.");
                    select.focus();
                    return false;
                }

                //If the user checked 'other' checkbox he must enter the genre in the text input
                if(otherCheck.checked && otherText.value.trim() === ""){
                    alert("Please provide input in the 'other' text field.");
                    otherText.focus();
                    return false;
                }

                //User should not leave text area empty
                if (textArea.value.trim() === ""){
                    alert("Please provide feedback in the text area.");
                    textArea.focus();
                    return false;
                }

                return true;
            }
        </script>
    </body>
</html>
