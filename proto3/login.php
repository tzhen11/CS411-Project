<?php

$uname = filter_input(INPUT_POST,'username');
$passw = filter_input(INPUT_POST,'password');
if(!empty($uname)){
    if(!empty($passw)){
        $host="localhost";
        $user="root";
        $pass="hello";
        $db="test";
        $conn=mysqli_connect($host,$user,$pass,$db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $uname=$_POST['username'];
        $passw=$_POST['password'];
        $sql="SELECT username, password FROM testing_db WHERE username='$uname' AND password='$passw'";
        $result = $conn->query($sql);
        // if ($result->num_rows > 0) {
        //     // output data of each row
        //     while($row = $result->fetch_assoc()) {
        //         echo "Username: " . $row["username"]. " - Pass: " . $row["password"]. "<br>" ;
        //     }
        // } else {
        //     echo "0 results\n";
        // }
        if($result->num_rows == 1){
            session_start();
            $_SESSION['test']='true';
            header('location:index2.html');
        }
        else{
            echo 'Wrong username or password';
            die();
        }
    }
    else{
        echo "Enter password!";
        die();
    }
}
else{
    echo "Enter username!";
    die();
}

    

?>
