<?php
include('conect.php');
session_start(); // start session

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
    font-family: 'Cairo';

}
</style>
    <title>C-Branche!</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg" id="nav">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"style="font-size: 23px;">
            <img id="logo" src="img/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
            C-Branche
          </a>
          <a class="navbar-brand" href="login.php" style="font-size: 15px;" > تسجيل الخروج
          </a>
        </div>
      </nav>
      <!----------------------------------------------------------------------->
      <!-- Nav tabs -->
  <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="bi bi-house"></i></button>
      <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false"><i class="bi bi-person-circle"></i></button>
    </div>
  </nav>
  <!---------------------------------------------------------------------------->
      <div class="container">
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"> 
            <form action="code.php" method="POST" id="form-student" >
              <div class="card">
                    <h5>يرجى ملئ الاستمارة  بالشكل الصحيح </h5>
   
                  <div class="row" id="f1">
                    <div class="col"><input class="form-control"  type="text" name="name" VALUE="<?php echo  $_SESSION['name']  ?>"   placeholder="اكتب اسمك"></div>
                  </div>
                  <div class="row" id="f1">
                    <div class="col"><input class="form-control"  type="text" name="email" VALUE="<?php echo  $_SESSION['email']  ?>"   placeholder="البريد الالكتروني"></div>
                  </div>
                  <div class="row" id="f1">   
                    <div class="col"><input class="form-control"  type="text" name="phone"  placeholder="رقم الهاتف"></div>
                </div>
             </div>
          <div class="card">
              <p>يرجى  اختيار القسم الذي ترغب به </p>
                  <select class="form-select" name="dep1" id="f1">
                      <option selected="">اختر القسم الاول الذي ترغب به</option>
                      <option value="IT">IT</option>
                      <option value="CS">CS</option>
                      <option value="CY">CY</option>
                  </select>
                  <select class="form-select" name="dep2" id="f1">
                      <option selected="">اختر القسم الثاني الذي ترغب به</option>
                      <option value="IT">IT</option>
                      <option value="CS">CS</option>
                      <option value="CY">CY</option>
                  </select>
                  <select class="form-select" name="dep3"id="f1">
                      <option selected="">اختر القسم الثالث الذي ترغب به</option>
                      <option value="IT">IT</option>
                      <option value="CS">CS</option>
                      <option value="CY">CY</option>
                  </select>
                  <input type="submit" class="btn btn-success" name="send"  value="ارسال"id="f1" style="background-color:  #130a33;" onclick="myFunction()">
                  </form> 
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

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
  </body>
</html>

<!--- php ------------------ -->
<script>
function myFunction() {
  alert("تمت الاضافة بنجاح ");
}
</script>