<?php

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
if(!empty($username)){
    if(!empty($password)){
        $host  = "localhost";//Replace with own host
        $dbusername = "root";//Replace with own db username
        $dbpassword = "hello";//Replace 'hello' with own db pass
        $dbname = "test"; //Replace 'test' with own created database

        //Create connection
        $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

        if(mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
        }
        else{
            $sql = "INSERT INTO testing_db (username,password) 
            values('$username','$password')";//replace 'testing_db' with own created subtable
            if($conn->query($sql)){
                echo "New record is inserted successfully";
            }
            else{
                echo "Error: ".sql."<br>".$conn->error;
            }
            $conn->close();
        }
    }
    else{
        echo "Please enter a password!";
        die();
    }
}
else{
    echo "Please enter a username!";
    die();
}
?>