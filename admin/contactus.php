

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
        <link rel="stylesheet" href="./../css1/st.css"/>
</head>
<body>
<div class="header">
        <h1>ADMIN PANEL -<?php echo $_SESSION['AdminLoginId']?></h1>
        <form method="POST">
        <input type="button" onclick="location.href='donate.php';" value="Donate" class="button">
        <button name="logout">LOG OUT</button>
        </form>
        </div>
<table>
<tr>
<th>Id</th>
<th>firstname</th>
<th>lastname</th>
<th>phone</th>
<th>email</th>
<th>message</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "payment");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id,firstname, lastname, phone , email , message FROM contactdata";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["id"] . "</td><td>" . $row["firstname"] . "</td><td>"
. $row["lastname"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["email"] . "</td><td>". $row["message"] . "</td></tr>" ;
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