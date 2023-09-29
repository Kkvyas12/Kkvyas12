<?php
include 'user.php';
$obj = new pr9();
if(isset($_POST['submit'])){
    if(($_POST['name'] != NULL) and ($_POST['email'] != NULL) and ($_POST['password'] != NULL)){

        $obj->insert($_POST['name'],$_POST['email'],$_POST['password']);
    }
    else {
        echo '<script>alert("All fields are required !!")</script>';
    }
}
elseif(isset($_POST['login'])){
    header('Location:login.php');
}
?>
<html>
<head>
    <title>Registration Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"], button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover, button:hover {
            background-color: #555;
        }

        .login-link {
            text-align: center;
            margin-top: 10px;
        }

        .login-link a {
            text-decoration: none;
            color: #333;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registration Page</h1>
        <form method="POST" action="reg.php">
            <table>
                <tr>
                    <td>
                        <input type="text" name="name" placeholder="Enter Your Name" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="email" name="email" placeholder="Enter Your Email" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="password" placeholder="Enter Your Password" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Submit" name="submit">
                    </td>
                </tr>
            </table>
        </form>
        <div class="login-link">
            <a href="login.php">Already have an account? Login here</a>
        </div>
    </div>
</body>
</html>
