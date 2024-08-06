<?php
include'connection.php';
if(isset($_GET['Id'])){
    $id=$_GET['Id'];
    $delete="DELETE FROM students WHERE Id=$id";
    $q=mysqli_query($conn,$delete);
    if($q){
    header("location:viewstudent.php");
}}

?>