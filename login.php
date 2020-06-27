<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// Include config file
require_once "php/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
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
    <link rel="stylesheet" href="/NEW-GETYOURCAR/css/main.css">
</head>

<body>
<header>
    <div class="header">
        <a href="/NEW-GETYOURCAR/index.php" class="logo">GetYourCar</a>

        <div class="header-right">
            <a href="/NEW-GETYOURCAR/index.php">Home</a>
            <a href="/NEW-GETYOURCAR/cars.php">Cars</a>
            <a href="/NEW-GETYOURCAR/contact.php">Contact</a>
            <a class="active" href="/NEW-GETYOURCAR/login.php">Log In</a>
            <a href="/NEW-GETYOURCAR/signup.php">Sign Up</a>  
            <a href="/NEW-GETYOURCAR/about.php">About Us</a>   
            <a href="/NEW-GETYOURCAR/logout.php">Logout</a>                     
        </div>
    </div>

        <div id="bannerimage">
            <img src="/NEW-GETYOURCAR/img/header.jpg"> 
        </div>
        
        <br>
        <br>
</header>

<section>
    <div class="form">
        <form class="form-login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		
			<div class="form-header">
                <h2>Login First !</h2>
            </div>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="username" placeholder="Username" class="form-input" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <input type="password" name="password" placeholder="Password" class="form-input">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input class="form-button" type="submit" class="btn btn-primary" value="Login">
            </div>
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
