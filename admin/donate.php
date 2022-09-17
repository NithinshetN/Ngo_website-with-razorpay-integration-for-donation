<?php
 session_start();
 if(!isset($_SESSION['AdminLoginId']))
 {
     header("location:adminlogin.php");
 }

?>

<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<title>Login page</title>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="st.css"/>
</head>
<body>
<div class="header">
        <h1>ADMIN PANEL -<?php echo $_SESSION['AdminLoginId']?></h1>
        <form method="POST">
        <button name="logout">LOG OUT</button>
        </form>
        </div>
<table>
<tr>
<th>Id</th>
<th>Username</th>
<th>amount</th>
<th>Payment Status</th>
<th>Added on</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "payment");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id, name, amount , payment_status , added_on FROM pays";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>"
. $row["amount"] . "</td></tr>" . $row["payment_status"] . "</td></tr>" . $row["added_on"] . "</td></tr>" ;
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
if(isset($_POST['logout']))
        {
            session_destroy();
            header("location:adminlogin.php");
        }
?>
</table>
</body>
</html>