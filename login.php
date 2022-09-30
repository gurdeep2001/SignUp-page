<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $con = mysqli_connect('sql307.epizy.com','epiz_32696284','szYr8K1GHZdjYlp','epiz_32696284_database1');
    if($con->connect_error){
        die("Failed to connect : ".$con->connect_error);
    }else{
        $stmt = $con->prepare("SELECT * FROM entry WHERE username=?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password']==$password){
                echo "<h2>Login Successfully</h2>";
            }
        }else{
            echo "<h2>Invalid username or password</h2>";
        }

    }
?>