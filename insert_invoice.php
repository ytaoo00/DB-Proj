<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php
require_once('db_setup.php');
$sql = "USE yliu157_1;";
if ($conn->query($sql) === TRUE) {
   // echo "using Database tbiswas2_company";
} else {
   echo "Error using  database: " . $conn->error;
}

// Query:
$invoice_Id = $_POST['Invoice_ID'];
$cust_Id = $_POST['Cust_ID'];
$status = $_POST['Status'];

$sql = "INSERT INTO Invoice values ($invoice_Id , $cust_Id , '$status');";

$result = $conn->query($sql);

if ($result === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} 
//$stmt = $conn->prepare("Select * from Students Where Username like ?");
//$stmt->bind_param("s", $username);
//$result = $stmt->execute();
//$result = $conn->query($sql);
?>

<?php
$conn->close();
?>  

</body>
</html>

