<?php
    session_start();
    if($_SESSION['user']){
    }
    else{ 
       header("location:index.php");
    }
    GLOBAL $username=mysqli_real_escape_string($_POST['username']);

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
       $dateApp = mysqli_real_escape_string($_POST['dateApp']);
       $titleApp = mysqli_real_escape_string($_POST['titleApp']);
       $data = mysqli_real_escape_string($_POST['data']);
       $startTimeApp = mysqli_real_escape_string($_POST['startTimeApp']);
       $endtimeApp = mysqli_real_escape_string($_POST['endTimeApp']);
   
       mysqli_connect("localhost","root","") or die(mysqli_error()); //Connect to server
       mysqli_select_db("deltatask2") or die("Cannot connect to database"); //Conect to database
       mysqli_query("INSERT INTO '.$username.' (dispDate,title,description,startTime,endTime) VALUES ('$dateApp','$titleApp','$data','$startTimeApp','$endTimeApp')"); //SQL query
       header("location:home.php");
    }
    else
    {
       header("location:home.php");
    }
?>