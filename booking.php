<?php
// Include config file
require_once "php/config.php";
 
// Define variables and initialize with empty values
$firstname = $lastname = $email = $sourcelocation = $destinationlocation = $phonenumber = "";
$firstname_err = $lastname_err = $email_err = $sourcelocation_err = $destinationlocation_err = $phonenumber_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	// Check if data is empty
    if(empty(trim($_POST["firstname"]))){
        $firstname_err = "Please enter firstname.";
    } else{
        $firstname = trim($_POST["firstname"]);
    }
	if(empty(trim($_POST["lastname"]))){
        $lastname_err = "Please enter lastname.";
    } else{
        $lastname = trim($_POST["lastname"]);
    }
	if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
	if(empty(trim($_POST["sourcelocation"]))){
        $sourcelocation_err = "Please enter sourcelocation.";
    } else{
        $sourcelocation = trim($_POST["sourcelocation"]);
    }
	if(empty(trim($_POST["destinationlocation"]))){
        $destinationlocation_err = "Please enter destinationlocation.";
    } else{
        $destinationlocation = trim($_POST["destinationlocation"]);
    }
	if(empty(trim($_POST["phonenumber"]))){
        $phonenumber_err = "Please enter phonenumber.";
    } else{
        $phonenumber = trim($_POST["phonenumber"]);
    }
    
    // Check input errors before inserting in database
    if(empty($firstname_err) && empty($lastname_err) && empty($sourcelocation_err) && empty($destinationlocation_err) && empty($email_err) && empty($phonenumber_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO booking (firstname, lastname, sourcelocation, destinationlocation, email, phonenumber) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_firstname, $param_lastname, $param_sourcelocation, $param_destinationlocation, $param_email, $param_phonenumber);
            
            // Set parameters
            $param_firstname = $firstname;
            $param_lastname = $lastname;
            $param_sourcelocation = $sourcelocation;
            $param_destinationlocation = $destinationlocation;
            $param_email = $email;
            $param_phonenumber = $phonenumber;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
<header>
    <div class="header">
        <a href="index.php" class="logo">GetYourCar</a>

        <div class="header-right">
            <a href="index.php">Home</a>
            <a href="cars.php">Cars</a>
            <a class="active" href="#booking.php">Book Car</a>
            <a href="contact.php">Contact</a>
            <a href="login.php">Log In</a>
            <a href="signup.php">Sign Up</a>
            <a href="about.php">About Us</a>   
            <a href="logout.php">Logout</a>                       
        </div>

    </div>

        <div id="bannerimage">
            <img src="img/header.jpg"> 
        </div>

        <br>
        <br>
        
</header>


<section>
    <div class="form">
	<form class="form-login">
           <div class="form-header">
                <h2>Book Your Car</h2>
            </div>
	
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		
            <div class="form-group" <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>>
                <input type="text" name="firstname" placeholder="First Name" class="form-input" value="<?php echo $firstname; ?>">
                <span class="help-block"><?php echo $firstname_err; ?></span>
            </div>  
			
            <div class="form-group " <?php echo (!empty($last_nameerr)) ? 'has-error' : ''; ?>>
                <input type="text" name="lastname" placeholder="Last Name" class="form-input" value="<?php echo $lastname; ?>">
                <span class="help-block"><?php echo $lastname_err; ?></span>
            </div>
			
            <div class="form-group " <?php echo (!empty($sourcelocation_err)) ? 'has-error' : ''; ?>>
                <input type="text" name="sourcelocation" placeholder="Source Location" class="form-input" value="<?php echo $sourcelocation; ?>">
                <span class="help-block"><?php echo $sourcelocation_err; ?></span>
            </div>
			
			<div class="form-group " <?php echo (!empty($destinationlocation_err)) ? 'has-error' : ''; ?>>
                <input type="text" name="destinationlocation" placeholder="Destination Location" class="form-input" value="<?php echo $destinationlocation; ?>">
                <span class="help-block"><?php echo $destinationlocation_err; ?></span>
            </div>  
			
            <div class="form-group " <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>>
                <input type="text" name="email" placeholder="email@example.com" class="form-input" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
			
            <div class="form-group " <?php echo (!empty($phonenumber_err)) ? 'has-error' : ''; ?>>
                <input type="digit" name="phonenumber" placeholder="Phone number" class="form-input" value="<?php echo $phonenumber; ?>">
                <span class="help-block"><?php echo $phonenumber_err; ?></span>
            </div>
			
			<div class="form-group">
                <button class="form-button" type="submit">Book</button>
            </div>
        </form>
	</form>
    </div>
</section>


<section>
    <footer>
        <br>
        <div class="footer">
            &copy; Copyright 2019 GetYourcar
        </div>
    </footer>
</section>

</body>
</html>