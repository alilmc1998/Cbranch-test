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
    .printer{
      background-color: #130a33;
    color: #fff;
    width: 4em;
    height: 4em;
    border-radius: 100%;
    padding-top: 12px;
    position: fixed;
    bottom: 3em;
    box-shadow: black 6px 4px 9px;
    
}
#printer{

    padding: 20px;
    margin-top: -16px;
}
    </style>
  </head>
  <body>
    <nav class="navbar navbar-dark bg" id="nav">
        <div class="container-fluid">
          <a class="navbar-brand" href="home.php">
            <i class="bi bi-arrow-left-circle" ></i> 
           </a>
           
           <a class="navbar-brand" href="home.php">
ألنتائج النهائية
          </a>
           
        </div>
      </nav>

  <div class="container" style="margin-top:5em ;">
  <div class="printer"><i type="button" id="printer" class="bi bi-printer-fill"onclick="print_tb()"></i></div>
    <div class="row">
      <div class="col"><button class="btn btn-primary" id="home-btn" data-bs-target="#it"data-bs-toggle="modal"> IT <span id="count_IT"></span></button></div>
      <div class="col"><button class="btn btn-primary" id="home-btn"data-bs-target="#cs"data-bs-toggle="modal"> CS <span id="count_CS"></span></button></div>
      <div class="col"><button class="btn btn-primary" id="home-btn"data-bs-target="#cy"data-bs-toggle="modal"> CY <span id="count_CY"></span></button></div>
    </div>
  </div>
  <div class="container">
    <div id="tb">
  <table class="table">
    <tr>
      <th>id</th>
      <th>الاسماء</th>
      <th>النسبة </th>
      <th>الفرع</th>
      <th></th>
      <th></th>
    </tr>
    <form action="table.php" method="POST">
    <?php
$sql = "SELECT * FROM tbxls";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $email = $row["email"];
        $name = $row["name"];
        $nspa = $row["nspa"];
        $dep = $row["dep"];
        $dep_select = $row["dep_select"];


        if ($nspa >= 70) {
            $dep = "CY";
        } elseif ($nspa < 65 && $nspa > 60) {
            $dep = "IT";
        } else {
            $dep = "CS";
        }

               
        if($dep_select === "CS" && $dep === "CY") {
          $dep_result = "CS";
        }

        elseif($dep_select === "IT" && $dep === "CY") {
          $dep_result = "IT";
        }

        elseif($dep_select === "CS" && $dep === "IT") {
          $dep_result = "CS";
        }
        elseif($dep_select === "CY" && $dep === "IT") {
          $dep_result = "IT";
        }
        elseif($dep_select === "CY" && $dep === "CS") {
          $dep_result = "CS";
        }
        
        elseif($dep_select === "IT" && $dep === "CS") {
          $dep_result = "CS";
        }
        
        else {
          $dep_result = "CY";
        }
        

        $sql = "UPDATE tbxls SET dep='$dep', dep_result='$dep_result' WHERE id='$id'";
        $query = mysqli_query($conn, $sql);

        echo "<tr>";
        echo "<td id='id_stud'>$id</td>";
        echo "<td>$name</td>";
        echo "<td>$nspa %</td>";
        echo "<td>$dep_result</td>";

        echo "<td><a class='bi bi-pencil-square' href='edit.php?id=$id'></a></td>";
        echo "<td><a class='bi bi-trash' href='delet.php?id=$id'></a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>



        </form>
    </table>
      </div>
  </div>
<!-----------------modals-->


<!---------------edit------------->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> تعديل </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      
      </div>
      <div class="modal-body">

       <form id="edit-inf" method="POST">
          <input class="form-control" type="text" name="name" id="" placeholder="اسم الطالب" value="<?php  echo $name ?>"><br>
          <input class="form-control" type="text" name="nspa" id="" placeholder=" النسبة الكلية" value="<?php  echo $nspa ?>%"><br>
          <input class="form-control" type="text" name="dep" id="" placeholder=" القسم" value="<?php  echo $dep  ?>+ <?php  echo $dep1  ?>"><br>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
          <button type="button" data-bs-toggle="modal" data-bs-target="#delet" class="btn btn-danger">حذف</button>
          <button type="submit" class="btn btn-primary" name="apply_edit">تعديل</button>
          </form>
    </div>
      </div>
    </div>
  </div>
</div>
<!------------ it ---------------->
<div class="modal fade" id="it" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> IT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"id="print-table_it">
      <?php include('./dep/it.php'); ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="downloadTable_it()">تحميل  PDF </button>
        <button type="button" class="btn btn-primary"onclick="printTable_it()">طباعة </button>
      </div>
    </div>
  </div>
</div>
<!------------ CS ---------------->
<div class="modal fade" id="cs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> CS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"id="print-table_cs">
     
      <?php include('./dep/cs.php'); ?>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">تحميل  PDF </button>
        <button type="button" class="btn btn-primary"onclick="printTable_cs()">طباعة </button>
      </div>
    </div>
  </div>
</div>
<!------------ CY---------------->
<div class="modal fade" id="cy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> CS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body"id="print-table_cy">
      <?php include('./dep/cy.php'); ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">تحميل  PDF </button>
        <button type="button" class="btn btn-primary"onclick="printTable_cy()">طباعة </button>
      </div>
    </div>
  </div>
</div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>

<script>
  // get the table element
  var table = document.getElementsByClassName("table")[0];
  // initialize a count variable
  var count_IT = 0;
  var count_CS = 0;
  var count_CY = 0;


  // loop through each row in the table
  for (var i = 1; i < table.rows.length; i++) {
    // get the text content of the department cell in the current row
    var department = table.rows[i].cells[3].textContent;
    // check if the department is equal to "IT"
    if (department === "IT") {
      // if it is, increment the count variable
      count_IT++;
    }
    if (department === "CS") {
      // if it is, increment the count variable
      count_CS++;
    }
    if (department === "CY") {
      // if it is, increment the count variable
      count_CY++;
    }
    
  }
  // print the count to the page
  document.getElementById("count_IT").textContent = count_IT;
  document.getElementById("count_CS").textContent = count_CS;
  document.getElementById("count_CY").textContent = count_CY;


</script>

<script>
  function printTable_it() {
    // Create a new window with just the table content
    const table = document.getElementById('print-table_it').outerHTML;

    const newWindow = window.open('', '_blank');
    newWindow.document.write(table);
    // Print the table
    newWindow.print();
    // Close the new window
    newWindow.close();
  }
  function printTable_cs() {
    // Create a new window with just the table content
    const table = document.getElementById('print-table_cs').outerHTML;

    const newWindow = window.open('', '_blank');
    newWindow.document.write(table);
    // Print the table
    newWindow.print();
    // Close the new window
    newWindow.close();
  }
  function printTable_cy() {
    // Create a new window with just the table content
    const table = document.getElementById('print-table_cy').outerHTML;

    const newWindow = window.open('', '_blank');
    newWindow.document.write(table);
    // Print the table
    newWindow.print();
    // Close the new window
    newWindow.close();
  }

  function print_tb() {
    // Create a new window with just the table content
    const table = document.getElementById('tb').outerHTML;

    const newWindow = window.open('', '_blank');
    newWindow.document.write(table);
    // Print the table
    newWindow.print();
    // Close the new window
    newWindow.close();
  }

  
</script>