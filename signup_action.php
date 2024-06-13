<?php
session_start();
include ("connection.php");
    if (isset($_POST['register'])) {
        $name = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $cpass = $_POST['cpass'];

        $check = "select * from users where email='{$email}'";
        $res = mysqli_query($conn, $check);
        $passwd = password_hash($pass, PASSWORD_DEFAULT);
        $key = bin2hex(random_bytes(12));
        if (mysqli_num_rows($res) > 0) {
            echo "<div class='message'>
            <p>This email is used, Try another One Please!</p>
            </div><br>";

            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
        } else {
            if ($pass === $cpass) {
                $sql = "insert into users(username,email,password) values('$name','$email','$passwd')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo "<div class='message'>
                    <p>You are register successfully!</p>
                    </div><br>";

                    echo "<a href='login.html'><button class='btn'>Login Now</button></a>";

                } else {
                    echo "<div class='message'>
                    <p>This email is used, Try another One Please!</p>
                    </div><br>";

                    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
                }

            } else {
                echo "<div class='message'>
                <p>Password does not match.</p>
                </div><br>";

                echo "<a href='signup.html'><button class='btn'>Go Back</button></a>";
            }
        }
    }

?>