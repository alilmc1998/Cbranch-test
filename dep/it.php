<?php
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

    <title>Hello, world!</title>
    <style>
       @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css");
      body{
        font-family: 'Cairo';
    
    }
    </style>
  </head>
  <body>
  <div class="container">
    
</div>

  <?php
// Escape the input value to prevent SQL injection attacks
$dep_result = mysqli_real_escape_string($conn, "IT");

// Construct the SQL query
$sql = "SELECT * FROM tbxls WHERE dep_result = '$dep_result'";
$result = mysqli_query($conn, $sql);

// Loop through the result set and print the data
if ($result->num_rows > 0) {
    // Start HTML table
    echo "<table class=".'table'.">";
    echo "<tr>
            <th>الاسم</th>
            <th>النسبة</th>
            <th>القسم</th>
        </tr>";
    
    // Loop through each row and output data
    while($row = $result->fetch_assoc()) {
  $name = $row["name"] ;
  $nspa = $row["nspa"] ;
  $dep_result = $row["dep_result"] ;

      echo "<tr>";
      echo "<td>" . $row["name"] . "</td>";
      echo "<td>" . $nspa. " %</td>";
      echo "<td>" . $dep_result. " %</td>";
      echo "</tr>";
    }
    
    // End HTML table
    echo "</table>";
  } else {
    echo "0 results";
  }
  
  // Close connection
  $conn->close();
  
          ?>

</body>
</html>
  
