<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_SESSION['usr_id'])) {
    header("Location: index.php");
}

include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//check if form is submitted
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if (strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if ($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
        if (mysqli_query($con, "INSERT INTO users(name,email,password) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')")) {
            $successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
        } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Outsider - Account</title>
    <link rel="stylesheet" href="stylesheet/register.css" />
</head>

<body>
    <header>
        <nav>
            <div class="logo">The Outsider</div>
            <div class="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <ul class="nav-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="events.html">Events</a></li>
                <li><a href="account.html">Account</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="account">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 well">
                        <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                            <fieldset>
                                <legend>Sign Up</legend>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" placeholder="Enter Full Name" required value="<?php if ($error)
                                        echo $name; ?>" class="form-control" />
                                    <span class="text-danger">
                                        <?php if (isset($name_error))
                                            echo $name_error; ?>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="text" name="email" placeholder="Email" required value="<?php if ($error)
                                        echo $email; ?>" class="form-control" />
                                    <span class="text-danger">
                                        <?php if (isset($email_error))
                                            echo $email_error; ?>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="name">Password</label>
                                    <input type="password" name="password" placeholder="Password" required
                                        class="form-control" />
                                    <span class="text-danger">
                                        <?php if (isset($password_error))
                                            echo $password_error; ?>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="name">Confirm Password</label>
                                    <input type="password" name="cpassword" placeholder="Confirm Password" required
                                        class="form-control" />
                                    <span class="text-danger">
                                        <?php if (isset($cpassword_error))
                                            echo $cpassword_error; ?>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="signup" value="Sign Up" class="btn btn-primary" />
                                </div>
                            </fieldset>
                        </form>
                        <span class="text-success">
                            <?php if (isset($successmsg)) {
                                echo $successmsg;
                            } ?>
                        </span>
                        <span class="text-danger">
                            <?php if (isset($errormsg)) {
                                echo $errormsg;
                            } ?>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 text-center">
                        Already Registered? <a href="login.php">Login Here</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <p>&copy; 2023 The Outsider - All rights reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>