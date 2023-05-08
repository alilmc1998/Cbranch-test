
<?php
session_start(); // start session
include('conect.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="xd.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>

<style>
       @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css");

  body{
    background-color:  #ffffff;
    font-family: 'Cairo';

  }
</style>
    <title>C-Branche</title>
  </head>
  <body>

  <?php
// Get username and password from login form
if (isset($_POST['submit'])) {

$email = $_POST['email'];
$pass = $_POST['pass'];
// Check if username and password are correct
$sql = "SELECT * FROM sheet1 WHERE email='$email' AND pass='$pass'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) { // if login successful
    $row = mysqli_fetch_assoc($result);
    $_SESSION['name'] = $row['name']; // store name in session variable
    $_SESSION['email'] = $row['email']; // store name in session variable
    header("Location: student.php"); // redirect to welcome page
} 
else { // if login unsuccessful
    echo "Invalid username or password";
    header("Location: login.php"); // redirect to welcome page

}
}
// Close connection
mysqli_close($conn);
?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
<!---------------- php login student -------------------------- -->
