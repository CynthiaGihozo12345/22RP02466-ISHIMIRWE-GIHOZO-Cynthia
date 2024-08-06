<?php
include('connection.php');
session_start();
if(isset($_SESSION['UserName'])){
    $username=$_SESSION['UserName'];
}

else{
    header("location:index.php");
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
        <?php
        $id=$_GET['Id'];
        $select="SELECT * FROM students WHERE Id=$id";
        $q=mysqli_query($conn,$select);
        while($row=mysqli_fetch_assoc($q)){
        ?>
        <center>
            <form action="#" method="POST">
            <h3>Update Student Information</h3>
            
                    <label>Firstname:</label>
                    <input type="text" name="firstname" required value="<?php echo $row['FirstName']; ?>"><br><br>
                    <label>Lastname:</label>
                    <input type="text" name="lastname" required value="<?php echo $row['LastName']; ?>"><br><br>
                    <label>DOB:</label>
                    <input type="date" name="dob" required value="<?php echo $row['DOB'] ?>"><br><br>
                    <label>Gender:</label>
                    <input type="radio" name="gender" value="Male"<?php if(isset($row['Gender']) && $row['Gender']=='Male')echo 'checked' ;  ?>>Male &nbsp;&nbsp;
                    <input type="radio" name="gender" value="Female"<?php if(isset($row['Gender'])&& $row['Gender']=='Female')echo 'checked'; ?>>Female<br><br><br>
                    <label>Address</label>
                     <input type="text" name="address" required value="<?php echo $row['Address']; ?>"><br><br>
                    <th>Department</th>
                    <input type="text" name="department"  required value="<?php echo $row['Department']; ?>"><br><br>
                
                <input type="submit" name="update" value="Update Student">
            
            
                </form>
           
        </center>
        <?php } ?>
    </div>
    </div>
    <div id="footer">

    <center>
        <h2>&copy; ISHIMIRWE GIHOZO cynthia</h2>
    </center>
    </div>
</body>
</html>
<?php 
include'connection.php';
if(isset($_POST['update'])){
    try{
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $department=$_POST['department'];
    $id=$_GET['Id'];
    $update="UPDATE students SET FirstName='$fname',LastName='$lname',DOB='$dob',Gender='$gender',
    Address='$address',Department='$department' WHERE Id='$id'";
    $q=mysqli_query($conn,$update);
    if($q){
        echo"<script>alert('Student updated successfully');</script>";
        header("location:viewStudent.php");
    }
    else{
        echo"<script>alert('Failed to update student');</script>";
        header("Location:update.php");
    }
}
catch(Exception $e){
    echo"Error: ".$e->getMessage();
}


}
?>