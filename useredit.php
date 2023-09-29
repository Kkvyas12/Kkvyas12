<?php
include 'user.php';
if(!isset($_SESSION['email']))
    header('Location:login.php');


$obj = new pr9();

if(isset($_POST['update'])){
    if(($_POST['name'] != NULL) and ($_POST['email'] != NULL)and ($_POST['password'] != NULL)){
        $obj->userupdate($_POST['id'],$_POST['name'],$_POST['email'],$_POST['password']);
    }
    else{
        echo '<script>alert("Name and Email field must not be empty !!")</script>';
        header('Location:userlist.php');
    }
}

if(isset($_POST['userlist'])){
    header('Location:userlist.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Update Page</title>
    <style>
        /* Global styles */
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

        /* Container styles */
        div {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }

        /* Heading styles */
        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        /* Form styles */
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

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="Submit"], button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="Submit"]:hover, button:hover {
            background-color: #555;
        }

        /* Button styles */
        button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div>
        <center><u><b><h1>User Detail Update Page</h1></b></u></center>
        <br>
        <br>
        <br>
        <form method="POST" action="useredit.php">
            <table>
                <tr>
                    <th>
                        <label for="id">Your ID</label>
                    </th>
                    <td>
                        <input type="text" name="id" value="<?php echo $_GET['id'];?>" readonly />
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="name">Your Name</label>
                    </th>
                    <td>
                        <input type="text" name="name" value="<?php echo $_GET['name'];?>" />
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="email">Your Email</label>
                    </th>
                    <td>
                        <input type="text" name="email" value="<?php echo $_GET['email'];?>" />
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="password">Your Password</label>
                    </th>
                    <td>
                        <input type="text" name="password" value="<?php echo $_GET['password'];?>" />
                    </td>
                </tr>
                <tr>
                    <th>    
                        <input type="Submit" value="Update" name="update">
                    </th>
                    <th>
                        <button type="submit" name="userlist">User List Page</button>
                    </th>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
