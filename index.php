<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            margin: 0;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        input[type="email"],
        input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <h1>Login Form</h1>
        <?php 
        $emailvalue = "";
        $passwordvalue = "";
        if (isset($_COOKIE['userinfo'])) {
            $userinfo = unserialize($_COOKIE['userinfo']);
            if (isset($userinfo['email'])) {
                $emailvalue = htmlspecialchars($userinfo['email']);    
            }
            if (isset($userinfo['password'])) {
                $passwordvalue = htmlspecialchars($userinfo['password']);    
            }
        }
        ?>
        <input type="email" name="email" value="<?php echo $emailvalue; ?>" placeholder="Enter Email" required><br>
        <input type="password" name="password" value="<?php echo $passwordvalue; ?>" placeholder="Enter Password" required><br>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>

<?php
include 'connection.php';

if (isset($_POST['login'])) {
    try {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $select = "SELECT * FROM administrator WHERE Email='$email' and Password='$password'";
        $query = mysqli_query($conn, $select);
        
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $id = $row['Id'];
                $username = $row['UserName'];
                session_start();
                $_SESSION['Id'] = $id;
                $_SESSION['UserName'] = $username;

                // Set a cookie to remember user preferences (valid for 30 days)
                $userinfo = [
                    "email" => $row['Email'],
                    "password" => $row['Password']
                ];
                
                setcookie("userinfo", serialize($userinfo), time() + (86400 * 30), "/", "", true, true);
            }
            header("Location: home.php");
            exit();
        } else {
            echo "<script>alert('Invalid Email or Password');</script>";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
