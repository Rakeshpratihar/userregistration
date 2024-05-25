<?php
$server="localhost";
$username="root";
$password="";
$dbname="registrationform";
$a=mysqli_connect($server,$username,$password,$dbname);
if($a){
    //echo "connection ok";
}
else{
    echo "connection failed";
}
?>