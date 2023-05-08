<?php
session_start(); // start session
include('conect.php');

?>

<!-- upload  file xls---------------------- -->

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
        font-family: 'Cairo';
    
    }
    </style>
    <title>C-Branche</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg" id="nav">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"style="font-size: 23px;">
          <img id="logo" src="img/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
          C-Branche
        </a>
        <a class="navbar-brand" href="#" style="font-size: 15px;" >  واجهة الادمن</a>

        
      </div>
    </nav>
    <div class="container">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> 
        <div class="container" style="margin-top: 7em;">
        <div class="row"  > 
            <div class="col"><button class="btn btn-primary" id="home-btn" data-bs-toggle="modal" data-bs-target="#upload"> رفع ملف جديد<i class="bi bi-cloud-plus"></i></button></div>
          <div class="col"><button class="btn btn-primary" id="home-btn" onclick="location.href='table.php'" >    قوائم الفروع  <i class="bi bi-plus-circle"></i></button></div>
        </div>
      
        <div class="row">
            <div class="col"><button class="btn btn-primary" id="home-btn"data-bs-toggle="modal" data-bs-target="#sta"> الاحصائية <i class="bi bi-graph-up-arrow"></i></button></div>
          </div>
          <div class="row">
          <form action="logout.php" method="post">

            <div class="col"><button class="btn btn-primary" id="home-btn" > تسجيل الخروج <i class="bi bi-box-arrow-left"></i></button></div>
  </form>
          </div>
      </div>
    </div>

      <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
          
            <div class="row">
            <ul style="text-align: center;margin-top: 7em;">
                  <li><img  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOH2aZnIHWjMQj2lQUOWIL2f4Hljgab0ecZQ&usqp=CAU" alt=""></li>
  
                  <li> <?php echo  $_SESSION['name']  ?> </li>
                    <li><?php echo  $_SESSION['email']  ?></li>
                    <form action="logout.php" method="post">
                    <li><button class="btn btn-danger"  >تسجيل الخروج</button></li>
                  </ul>
                  </form>
            </div>
          </div>
      </div>
    </div>
  </div>

     
  <!-- Nav tabs -->
  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="bi bi-house"></i></button>
      <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="bi bi-person-circle"></i></button>
    </div>
  </nav>
    
<!---------------------------->
<div class="modal fade" id="add-new" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اضافة جديد</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action=""post>
          <input class="form-control" type="text" name="" id="" placeholder="اسم الطالب" ><br>
          <input class="form-control" type="text" name="" id="" placeholder=" النسبة الكلية" ><br>
     

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
        <button type="button" class="btn btn-primary">اضافة</button>
      </div>
    </div>
  </div>
</div>
  
<!------------ upload ---------------->
<div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">رفع ملف</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <p> يرجى رفع ملف  بصيغة .xls </p>          
  <form action="code.php" method="post" enctype="multipart/form-data">
  <input class="form-control" type="file" name="file" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
        <button  class="btn btn-primary"type="submit" name="upload" onclick="myFunction()">اضافة</button>

        
  </form>

      </div>
    </div>
  </div>
</div>
<!------------ msg ---------------->
<div class="modal fade" id="msg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> ارسال رسالة  للكل</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action=""post>
          <textarea class="form-control" name="" id="" cols="30" rows="10" placeholder="اكتب الرسالة "></textarea>
          <br>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
        <button type="button" class="btn btn-primary">ارسال</button>
      </div>
    </div>
  </div>
</div>

<!------------ logout ---------------->
<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">رسالة تنبيه</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action=""post>
         <p>هل تريد تسجيل الخروج ؟</p>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
        <button type="button" class="btn btn-danger"onclick="location.href='logout.php'">تسجيل الخروج</button>
      </div>
    </div>
  </div>
</div>
<!------------ الاحصائية ---------------->
<div class="modal fade" id="sta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> الاحصائية</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <div class="modal-body">
      <?php // Construct the SQL query
         // Construct the SQL queries
// Construct the SQL queries
$sql = "SELECT COUNT(*) as dep FROM tbxls WHERE dep_result='IT'";
$sql2 = "SELECT COUNT(*) as dep FROM tbxls WHERE dep_result='CS'";
$sql3 = "SELECT COUNT(*) as dep FROM tbxls WHERE dep_result='CY'";

// Execute the queries and get the result sets
$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);

// Get the counts from the result sets
$count_IT = mysqli_fetch_assoc($result)['dep'];
$count_CS = mysqli_fetch_assoc($result2)['dep'];
$count_CY = mysqli_fetch_assoc($result3)['dep'];


echo '<div class="row">';
echo '<div class="col">IT</div>';
echo '<div class="col">' . $count_IT . '<span>%</span></div>';
echo '<div class="col"><i class="bi bi-graph-up-arrow"></i></div>';
echo '</div>';
echo '<hr>';
echo '<div class="row">';
echo '<div class="col">CS</div>';
echo '<div class="col">' . $count_CS . '<span>%</span></div>';
echo '<div class="col"><i class="bi bi-graph-up-arrow"></i></div>';
echo '</div>';
echo '<hr>';
echo '<div class="row">';
echo '<div class="col">CY</div>';
echo '<div class="col">' . $count_CY . '<span>%</span></div>';
echo '<div class="col"><i class="bi bi-graph-up-arrow"></i></div>';
echo '</div>';

// Free up the result sets and close the connection
mysqli_free_result($result);
mysqli_free_result($result2);
mysqli_free_result($result3);
mysqli_close($conn);

   
   
    ?>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">حسنا</button>
      </div>
    </div>
  </div>
</div>

  

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>

<script>
function myFunction() {
  alert("تمت الاضافة بنجاح ");
}
</script>

 