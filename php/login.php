<?php
session_start();

if (isset($_SESSION['usr_id']) != "") {
    header("Location: account.php");
}

include_once 'dbconnect.php';

//check if form is submitted
if (isset($_POST['login'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Fetch the user record from the database by username
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Password is correct, user is authenticated
        $_SESSION['username'] = $email;
        $_SESSION['usr_id'] = $user['id'];
        $_SESSION['usr_name'] = $user['username'];
        header("Location: account.php");
    } else {
        $errormsg = "Invalid username or password. Please try again.";
    }

}
?>

<!DOCTYPE html>
<html>

<head>
    <title>PHP Login Script</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="../stylesheet/login.css" />
</head>

<body>

    <header class="header">
        <nav class="navbar">
            <a href="#" class="nav-logo">The Outsider</a>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="../index.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="../about.html" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="../events.html" class="nav-link">Events</a>
                </li>
                <li class="nav-item">
                    <a href="account.php" class="nav-link">Account</a>
                </li>
                <li class="nav-item">
                    <a href="../contact.html" class="nav-link">Contact</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 well">
                <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
                    <fieldset>
                        <legend>Login</legend>

                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="text" name="email" placeholder="Your Email" required class="form-control" />
                        </div>

                        <div class="form-group">
                            <label for="name">Password</label>
                            <input type="password" name="password" placeholder="Your Password" required
                                class="form-control" />
                        </div>

                        <div class="form-group">
                            <input type="submit" name="login" value="Login" class="btn btn-primary" />
                        </div>
                    </fieldset>
                </form>
                <span class="text-danger">
                    <?php if (isset($errormsg)) {
                        echo $errormsg;
                    } ?>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                New User? <a href="php/register.php">Sign Up Here</a>
            </div>
        </div>
    </div>

    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>