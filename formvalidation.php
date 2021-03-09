<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<form action ="<?php $_SERVER['PHP_SELF']?>" method="Post">
<div class="container">
        <center>
        <h1> Form Validation </h1>
        </center>
</div>
<label>Name</label>
<input placeholder="Enter your Name" required type="txt" class="form-control" name="txtname">
</br>
<label>Enter your Email</label>
<input placeholder="Enter your Email" type="email" required class="form-control" name="email">
</br>
<label>Phone Number</label>
<input placeholder="Enter Namber of subject" type="number" required class="form-control" name="phonenumber">
</br>
<label>Facebook Url</label>
<input placeholder="Enter Facebook Url" required class="form-control" name="facebook">
</br>
<label>About Me</label>
<textarea name="about" id="input" type="txt" class="form-control m-3 p-3" 
rows="3" cols="40" required="required"></textarea>
</br>
<label>Gender</label>
<input type="radio"   name="rdgender" value="male"> male
<input type="radio"   name="rdgender" value="female"> female
</br>
<input type="submit" value="submit" name="btn" class="btn btn-success">
</form>
</body>
</html>

<?php
error_reporting(0);
if($_SERVER["REQUEST_METHOD"]== "POST")
{
    $name=$_POST["txtname"];
        //name
        if(empty($name)){
            echo"please enter your name </br>";
        } 
        elseif (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            echo " Incorrect Name,please enter letters and white space Only </br>";
           }
        else{
            echo"Correct Name </br>";
        }  
    $email=$_POST["email"];
      //email 
      if(empty($email)){
        echo"please enter your email </br>";
    }  
    elseif(filter_var(filter_var($email,FILTER_SANITIZE_EMAIL),FILTER_VALIDATE_EMAIL))
        echo"Valid email </br>";
    else{ 
        echo"please enter valid email </br>"; 
    }
    $number=$_POST["phonenumber"];
        // phone
        if(empty($phonenumber)){
            echo"please enter your phone number </br>";
        } 
        elseif(str_Length($phonenumber)!= 11){//   عاوزة اعرف الصح في الفانكشن دي الصح وليه مش بيدخل في ال else 
            echo"please enter 11 digit in number </br>";
        }
        else{
            echo "valid number </br>";
        }

    $facebook=$_POST["facebook"];
    // facebookUrl
    if (empty($facebook)) {
        echo"please enter your facebook url";
      }
        // check if URL address syntax is valid
        elseif (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)
        [-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$email)) {
          echo"Invalid URL </br>";
        } 
        else{
            echo "valid email </br>";   
      }
    $about=$_POST["about"];

    $gender=$_POST["rdgender"];
    
    // gender
    if (empty($gender)) {
        echo "Gender is required </br>";
      }


}

?>