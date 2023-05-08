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
    <title>C-Branche</title>
  </head>
  <body>
    

  <div class="container" style="margin-top: 1em;">
    
    <div class="card" style="border: none;" >
      <img src="img/logo.png" alt="">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">admin <i id="i-table" class="bi bi-person"></i></button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">student <i id="i-table" class="bi bi-people"></i></button>
        </li>
      </ul>
      
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">  
             <form action="login-admin.php" method="POST">
              <h5>تسجيل دخول الادمن </h5>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">البريد الالكتروني </label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">كلمة السر</label>
            <input type="password"name="pass" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" name="submit" class="btn btn-primary"style="background-color:  #130a33;">تسجيل الدخول</button>

        </form> 

      </div>
        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">    
        <form action="login-student.php" method="POST">
           <h5>تسجيل دخول الطلبة  </h5>


           <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">البريد الالكتروني </label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">كلمة السر</label>
            <input type="password"name="pass" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" name="submit" class="btn btn-primary"style="background-color:  #130a33;">تسجيل الدخول</button>

        </form>  

      </div>
      </div>
</div>

  </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>