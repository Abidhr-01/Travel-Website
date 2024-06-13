<?php
    session_start();
    include "connection.php";

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        $sql = "select * from users where email='$email'";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $password = $row['password'];
            $decrypt = password_verify($pass, $password);

            if ($decrypt) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                header("location: home.html");
            }

        } else {    
            echo "<p>Wrong Email or Password</p><br>";
            echo "<a href='login.html'><button class='btn'>Go Back</button></a>";
        }
    }
?>