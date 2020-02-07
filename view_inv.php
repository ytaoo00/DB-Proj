<!DOCTYPE html>
<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<?php
require_once('db_setup.php');
$sql = "USE yliu157_1";
if ($conn->query($sql) === TRUE) {
   // echo "using Database ";
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:
$sql = "SELECT * FROM Invoice";
$result = $conn->query($sql);
if($result->num_rows > 0){

?>
   <table class="table table-striped">
      <tr>
         <th>invoice id</th>
         <th>customer id</th>
         <th>status</th>
      </tr>
<?php
while($row = $result->fetch_assoc()){

?>
     <tr>
         <td><?php echo $row['Invoice_ID']; ?></td>
         <td><?php echo $row['Cust_ID']; ?></td>
         <td><?php echo $row['Status']; ?></td>
     </tr>

<?php
}
}
else {
echo "Nothing to display";
}
?>

    </table>

<?php
$conn->close();
?>  

</body>
</html>


