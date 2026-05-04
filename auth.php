<?php
include('config.php');

if (isset($_POST['signup_btn'])) {
    $email = $_POST['email'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $confirm_pass = $_POST['confirm_password'];

    if ($pass === $confirm_pass) {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$pass')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Account created successfully!'); window.location='index.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Passwords do not match!'); window.location='index.php';</script>";
    }
}

if (isset($_POST['login_btn'])) {
    $email = $_POST['login_email'];
    $pass = $_POST['login_password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$pass'");
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['username'];
        header("Location: start.php"); 
    } else {
        echo "<script>alert('Invalid email or password!'); window.location='index.php';</script>";
    }
}
?>