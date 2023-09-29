<?php
include 'user.php';
$obj = new pr9();

if (isset($_POST['reg'])) {
    header('Location: reg.php');
}

if (isset($_POST['login'])) {
    if ($_POST['email'] != NULL && $_POST['password'] != NULL) {
        $obj->varify($_POST['email'], $_POST['password']);
    }
    else {
        echo '<script>alert("All fields are required !!")</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        /* Your CSS Styles */
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
            background-color: white;
            color: black;
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
        /* End of CSS Styles */
    </style>
</head>
<body>
    
    <br>
    <br>
    <br>
    <div class="container">
    <center><u><b><h1>Login Page</h1></b></u></center>
        <form method="POST" action="login.php">
            <table>
                <tr>
                    <th><br>
                        <label for="email">Enter Your Email</label>
                    </th>
                    <td><br>
                        <input type="text" name="email" placeholder="Enter Email" />
                    </td>
                </tr>
                <tr>
                    <th><br>
                        <label for="password">Enter Your Password</label>
                    </th>
                    <td><br>
                        <input type="password" name="password" placeholder="Enter Password" />
                    </td>
                </tr>
                <tr>
                    <th>
                        <br><br>
                        <input type="submit" value="Login" name="login">
                    </th>
                    <th>
                        <br><br>
                        <button type="submit" name="reg">Registration</button>
                    </th>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>