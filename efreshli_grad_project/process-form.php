<?php

$name=$_POST["name"];
$message=$_POST["message"];
$priority=filter_input(INPUT_POST , "priority", FILTER_VALIDATE_INT);
$type=filter_input(INPUT_POST , "type", FILTER_VALIDATE_INT);
$terms=filter_input(INPUT_POST , "terms", FILTER_VALIDATE_BOOL);

if( ! $terms){
    die("Terms must be accepted");

}

$host = "localhost";
$dbname = "efreshli";
$username = "root";
$password= "gue55me";

$conn = mysqli_connect(hostname: $host ,
               username: $username , 
               password: $password , 
               database: $dbname);

if (mysqli_connect_errno()){
    die("Connection error:" . mysqli_connect_errno());
}
$sql = "INSERT INTO feedback ( name , body , priority , type)
VALUES(?,?,?,?)";
// the ? is to make the code not vulnerable to sql injection

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt , $sql)){
    die(mysql_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssii",
                      $name,
                      $message,
                      $priority,
                      $type);

mysqli_stmt_execute($stmt);
echo"Record Saved.";



