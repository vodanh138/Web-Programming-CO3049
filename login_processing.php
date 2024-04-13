<?php
require "database/connect.php";
session_start();
if (isset($_POST['username'], $_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $regex = '/^[a-zA-Z0-9]*$/'; 

    if (empty($username) || empty($password)) {
        echo "Please enter all the requested information <br>";
    }
    else if(strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match($regex, $password)){
        echo "Your input is not valid <br>";
    } 
    else {

        $md5_username = md5($username);
        $md5_password = md5($password);
        $sql = "SELECT * from user_table WHERE username = '$md5_username'AND password = '$md5_password'";
        $result = $con->query($sql);

        if ($result) {
            if (mysqli_num_rows($result) == 1) {
                $user_data = mysqli_fetch_assoc($result);
                $_SESSION['ori_username'] = $user_data['ori_username'];
                echo '  <p> Login success </p>
                        <div class="login">
                            <a href="index.php?page=home">Return to Home Page</a>
                        </div>';
            } else {
                echo
                '  <p> Mismatched username or password </p>
                   <div class="login">
                        <a href="index.php?page=login">Return to Login Page</a>
                    </div>';
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style1/login_processing.css" />
    <title>Website</title>
</head>

<body>
    
</body>

</html>