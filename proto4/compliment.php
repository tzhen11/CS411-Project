<?php

$fname = filter_input(INPUT_POST, 'firstname');
$lname = filter_input(INPUT_POST, 'lastname');
$email = filter_input(INPUT_POST, 'email');
$compliment = filter_input(INPUT_POST, 'compliment');
if(!empty($fname)){
    if(!empty($lname)){
        if(!empty($email)){
            if(!empty($compliment)){
                $host  = "localhost";//Replace with own host/or mysql host
                $dbusername = "root";//Replace with own db username
                $dbpassword = "hello";//Replace 'hello' with own db pass
                $dbname = "test"; //Replace 'test' with own created database

                //Create connection
                $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

                if(mysqli_connect_error()){
                    die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
                }
                else{
                    $sql = "INSERT INTO Feedback (FirstName,LastName,Email,Compliment) 
                    values('$fname','$lname','$email', '$compliment')";//replace 'testing_db' with own created subtable
                    if($conn->query($sql)){
                        echo "Thank you for your feedback!";
                    }
                    else{
                        echo "Error: ".sql."<br>".$conn->error;
                    }
                $conn->close();
                }
            }
            else{
                echo "Please enter what you liked about our site!";
                die();
            }
        }
        else{
            echo "Please enter email!";
            die();
        }
    }
    else{
        echo "Please enter last name!";
        die();
    }
}
else{
    echo "Please enter first name!";
    die();
}
?>
