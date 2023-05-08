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

<style>
       @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css");

  body{
    background-color:  #ffffff;
    font-family: 'Cairo';

  }
</style>
    <title>C-branche</title>
  </head>
  <body>
  <nav class="navbar navbar-dark bg" id="nav">
        <div class="container-fluid">
          <a class="navbar-brand" href="table.php">
            
            <i class="bi bi-arrow-left-circle" ></i> 
           </a>
           <a class="navbar-brand" href="#">
          تحديث المعلومات 
           </a>
        </div>
      </nav>

  <div class="container" style="margin-top: 5em;">
  <?php
$id=$_GET['id'];
$sql = "SELECT * FROM tbxls WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if($result) {
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      
      $id= $row['id'];
      $name= $row['name'];
      $dep=$row['dep'];
      $dep_select=$row['dep_select'];
      $dep_result=$row['dep_result'];

      $nspa=$row['nspa'];

    }
  } else {
    echo 'No records found.';
  }
} else {
  echo 'Error executing query.';
}

?>

<div class="card" style="border: none;">
<form action="edit.php" method="POST">
    <h5>تعديل المعلومات </h5> <hr>
    <div class="mb-3">
        <label for="name" class="form-label">الاسم </label><br>
        <label for="name" class="form-label">ID : <?php echo $id;?></label>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" name="name" class="form-control" id="name" value="<?php echo $name; ?>">
    </div>
    <div class="mb-3">
        <label for="nspa" class="form-label">النسبة</label>
        <input type="text" name="nspa" class="form-control" id="nspa" value="<?php echo $nspa; ?>">
    </div>
    <div class="mb-3">
        <label for="dep_chosen" class="form-label">الفرع الذي تم اختياره</label>
        <input type="text" name="dep" class="form-control" id="dep_chosen" value="<?php echo $dep; ?>">
    </div>
    <div class="mb-3">
        <label for="dep_chosen" class="form-label">الفرع الذي يرغب به الطالب </label>
        <input type="text" name="dep" class="form-control" id="dep_select" value="<?php echo $dep_select; ?>">
    </div>
    <div class="mb-3">
        <label for="dep_chosen" class="form-label">الفرع   النهائي </label>
        <input type="text" name="dep" class="form-control" id="dep_result" value="<?php echo $dep_result; ?>">
    </div>
    <button type="submit" name="update" class="btn btn-primary" style="background-color: #130a33;">تحديث المعلومات</button>
</form>

<?php
if(isset($_POST["update"])) {


    // Step 2: Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Step 3: Retrieve the form data and prepare and execute the SQL statement to update data based on the ID
    $id = $_POST['id']; 
    $name = $_POST['name']; 
    $nspa = $_POST['nspa']; 
    $dep = $_POST['dep']; 
    $dep_select = $_POST['dep_select']; 
    $dep_result = $_POST['dep_result']; 


    $sql = "UPDATE tbxls SET name='$name' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        header("Location: table.php"); // redirect to welcome page
        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    // Step 4: Close the database connection
    mysqli_close($conn);
}
?>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>