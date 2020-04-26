<?php 
    session_start();
    if(!$_SESSION['test'])
    {
        header('location:index.html');
    }
?>

<h1>Access Granted!</h1>