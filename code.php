<?php
include('conect.php');

require_once 'PHPExcel/Classes/PHPExcel.php'; // Include PHPExcel library



// Check if file was uploaded
if (isset($_FILES['file'])) {
    $inputFileName = $_FILES['file']['tmp_name'];

    try {
        $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
    } catch(Exception $e) {
        die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
    }

    $worksheet = $objPHPExcel->getActiveSheet();

    // Loop through rows of the worksheet
    foreach ($worksheet->getRowIterator() as $row) {
        // Skip the header row
        if ($row->getRowIndex() == 1) {
            continue;
        }

        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false); // Loop through all cells, even if they don't exist

        // Get the cell values from the row
        $rowData = [];
        foreach ($cellIterator as $cell) {
            $rowData[] = $cell->getValue();
        }

        // Insert the row data into the MySQL database
         // Insert the row data into the MySQL database
         $sql = "INSERT INTO tbxls (name, email, nspa) VALUES (?, ?, ?)";
         $stmt = $conn->prepare($sql);
         $stmt->bind_param("sss", $rowData[0], $rowData[1], $rowData[2]);
         $stmt->execute()
    }

    echo "Data inserted successfully";

} else {
    echo "No file uploaded";
}

$conn->close();
?>

  <!--php insert data to database -->
  <?php 
          if (isset($_POST['send'])) {
            
          $name = $_POST['name'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $dep1 = $_POST['dep1'];
          $dep2 = $_POST['dep2'];
          $dep3 = $_POST['dep3'];
          $state = 'OK';

          $sql="INSERT INTO tbsend (name,email,phone,dep1,dep2,dep3,state) VALUES ('$name','$email','$phone','$dep1','$dep2','$dep3','$state')";
            $query=mysqli_query($conn,$sql);

          if ($query) {
              echo "New record created successfully";
              $sql = "UPDATE tbxls SET dep_select = '$dep1' WHERE email = '$email'";
              $result = $conn->query($sql);
            header("Location: result.php"); // redirect to welcome page
              

          } 
          else {
            echo "Error: ";

          }

          // Close connection
          mysqli_close($conn);

        }
          ?>
    