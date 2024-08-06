<?php
include'connection.php';
session_start();
if(isset($_SESSION['UserName'])){
    $username=$_SESSION['UserName'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: #f4f4f4; /* Light Gray Background */
    }
    #header {
        width: 100%;
        height: 70px;
        background-color: #333; /* Dark Gray */
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }
    #nav {
        width: 19%;
        height: calc(100vh - 140px);
        background-color: #444; /* Medium Dark Gray */
        color: white;
        float: left;
        padding: 20px;
        box-sizing: border-box;
    }
    #nav ul {
        list-style-type: none;
        padding: 0;
    }
    #nav ul li {
        margin-bottom: 15px;
    }
    #nav ul li a {
        text-decoration: none;
        color: white;
        display: block;
        padding: 0px;
        border-radius: 5px;
        
    }
    #nav ul li a:hover {
        background-color:grey;
    }
    #right {
        width: 80%;
        height: calc(100vh - 140px);
        float: left;
        padding: 20px;
        box-sizing: border-box;
        background-color: #e0e0e0; /* Light Gray */
        color: #333; /* Dark Gray Text */
    }
    #body {
        width: 100%;
        height: 400px;
        border: none;
        color: black;
        /* margin-top: 20px; */
    }
    #footer {
        width: 100%;
        height: 70px;
        background-color: #333; /* Dark Gray */
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        clear: both;
    }
</style>
</head>
<body>
    <div id="header">
    <h3>Welcome to Student Management System 
    <?php echo $username; ?>
    </h3>
    </div>
    
    <div id="body">
    <div id="nav">
        <h3>Navigation Menu</h3>
        <ul>
        <li><a href="home.php">Home</a></li><br><br><br>
        <li><a href="addstudent.php">Add Student</a></li><br><br><br>
        <li><a href="viewstudent.php">View Students</a></li><br><br><br>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    </div>
    <div id="right">
        <center>
        <h3>Welcome to Student Management System</h3>
            <p>This is the home page of the Student Management System</p>
            <p>You can add, view, and update students information here</p>
            <p>Please note that this system requires a valid login</p>
            <p>Thank you for using our system</p>
        </center>
    </div>
    </div>
    <div id="footer">

    <center>
        <h2>&copy; ISHIMIRWE GIHOZO cynthia</h2>
    </center>
    </div>
</body>
</html>