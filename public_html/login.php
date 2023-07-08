<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $conn = new mysqli('localhost', 'root', '', 'movie' );
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } else{
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            // Valid credentials
            $stmt->close();
            $conn->close();
        
            header("Location: home.html");
            exit();
        } else {
            // Invalid credentials
            $error = "Invalid username or password.";
            header("Location: loginpage.html?error=" . urlencode($error));
            exit();
        }
    }
?>