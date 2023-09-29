<?php
include 'user.php';
if(!isset($_SESSION['email']))
    header('Location:login.php');



$obj = new pr9();   
$result = $obj->selectuser();

echo "<html>
        <head>
            <style>
                /* CSS for the table */
                table {
                    border-collapse: collapse;
                    width: 80%;
                    margin: 20px auto;
                }

                th, td {
                    padding: 10px;
                    text-align: left;
                }

                th {
                    background-color: #333;
                    color: #fff;
                }

                tr:nth-child(even) {
                    background-color: #f2f2f2;
                }

                /* CSS for buttons */
                button {
                    padding: 5px 10px;
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
            <center><h1>User Table</h1></center>
            <form method='GET' action='userlist.php'>
            <table border='5'>
            <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>ACTION</th>
            </tr>";

foreach ($result as $row) {
    echo "
            <tr>
            <td>".$row['id']."</td>
            <td>".$row['name']."</td>
            <td>".$row['email']."</td>
            <td><button type='submit' name='update' value='" . $row['id'] . "|" . $row['name'] . "|" . $row['email'] . "|" . $row['password'] . "'>UPDATE</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type='submit' name='delete' value='" . $row['id'] . "'>DELETE</button></td> </tr>";
}

echo "</table>
        <center><button type='submit' name='logout'>Log Out</button></center>
        </form>
       ";

if (isset($_GET['update'])) {
            $updateData = explode("|", $_GET['update']);
            if (!empty($updateData[0]) && !empty($updateData[1]) && !empty($updateData[2]) && !empty($updateData[3])) {
                $updateId = $updateData[0];
                $updatename = $updateData[1];
                $updateemail = $updateData[2];
                $updatepassword = $updateData[3];
                $_SESSION['email'] = $updateemail;
                header('Location: useredit.php?id='.$updateId.'&name='.$updatename.'&email='.$updateemail.'&password='.$updatepassword.'');
                exit();
            }
        }
if (isset($_GET['delete'])) {
    $deleteId = $_GET['delete'];
    if (!empty($deleteId)) {
        $obj->userdelete($deleteId);
    }
}
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location:login.php');
}
?>
</body>
</html>
