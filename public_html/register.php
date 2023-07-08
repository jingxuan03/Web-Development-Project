<?php
echo "Registration Complete";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $conn = new mysqli('localhost', 'root', '', 'movie');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } else{
        $stmt = $conn->prepare("INSERT INTO users(username, password, email, phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $username, $password, $email, $phone);
        $stmt->execute();
        if ($stmt->errno) {
            echo "Error: " . $stmt->error;
        } else {
            header("Location: loginpage.html");
        }
        $stmt->close();
        $conn->close();
    }
?>
