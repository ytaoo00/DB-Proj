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
$sql = "USE yliu157_1;";
if ($conn->query($sql) === TRUE) {
   // echo "using Database tbiswas2_company";
} else {
   echo "Error using  database: " . $conn->error;
}
// Query:

$sql = "CREATE TABLE Customer(
   Customer_ID INTEGER NOT NULL,
   Customer_First_Name VARCHAR(25) NOT NULL,
   Customer_Last_Name VARCHAR(25) NOT NULL,
   PRIMARY KEY (Customer_ID)
);"; 

if ($conn->query($sql) === TRUE) {
   echo "CREATE TABLE Customer";
} else {
   echo "Error creating  Customer: " . $conn->error;
}

$sql = "CREATE TABLE Product(
   Product_ID INTEGER NOT NULL,
   Product_Price DECIMAL(10,2) NOT NULl,
   Product_Name VARCHAR(25) NOT NULl,
   PRIMARY KEY (Product_ID)
);"; 

if ($conn->query($sql) === TRUE) {
   echo "CREATE TABLE Product";
} else {
   echo "Error creating  Product: " . $conn->error;
}

$sql = "CREATE TABLE Invoice(
   Invoice_ID INTEGER NOT NULL,
   Cust_ID INTEGER NOT NULL,
   Status VARCHAR(10) DEFAULT 'Normal',
   PRIMARY KEY (Invoice_ID),
   FOREIGN KEY (Cust_ID) references Customer(Customer_ID)
);"; 

if ($conn->query($sql) === TRUE) {
   echo "CREATE TABLE Invoice";
} else {
   echo "Error creating  Invoice: " . $conn->error;
}

$sql = "CREATE TABLE Contact_Info(
   CustomerID INTEGER NOT NULL,
   Customer_StreetAddress VARCHAR(50) NOT NULL,
   Customer_State VARCHAR(5) NOT NULL,
   Customer_Zip VARCHAR(20) NOT NULL,
   Customer_Phone VARCHAR(20) NOT NULL,
   PRIMARY KEY (CustomerID,Customer_StreetAddress),
   FOREIGN KEY (CustomerID) references Customer(Customer_ID)
);"; 

if ($conn->query($sql) === TRUE) {
   echo "CREATE TABLE Contact_Info";
} else {
   echo "Error creating  Contact_Info: " . $conn->error;
}

$sql = "CREATE TABLE Include_Product(
   Prod_ID INTEGER NOT NULL,
   Inv_ID INTEGER NOT NULL,
   Prod_Quantity INTEGER NOT NULL,
   PRIMARY KEY (Prod_ID, Inv_ID),
   FOREIGN KEY (Prod_ID) references Product(Product_ID),
   FOREIGN KEY (Inv_ID) references Invoice(Invoice_ID)
);"; 

if ($conn->query($sql) === TRUE) {
   echo "CREATE TABLE Include_Product";
} else {
   echo "Error creating  Include_Product: " . $conn->error;
}

if(($file = fopen("Customer.csv",r)) == FALSE){
	echo("error loading file");
}
else{
while (($data = fgetcsv($file, 1000, ",")) !== FALSE) 
{
 	$sql = "INSERT INTO Customer (Customer_ID,Customer_First_Name, Customer_Last_Name)
	VALUES ('" . $data[0] . "','" . $data[1] . "','" . $data[2] . "');";
	if ($conn->query($sql) === TRUE) {
            echo "Insert value Cusmtomer";
	}
 	 else {
  	 echo "Error Insert value Cusmtomer: " . $conn->error;
	}
}
fclose($file);
}

if(($file = fopen("Product.csv",r)) == FALSE){
        echo("error loading file");
}
else{
while (($data = fgetcsv($file, 1000, ",")) !== FALSE)
{
        $sql = "INSERT INTO Product (Product_ID,Product_Price, Product_Name)
        VALUES ('" . $data[0] . "','" . $data[1] . "','" . $data[2] . "');";
        if ($conn->query($sql) === TRUE) {
            echo "Insert value Product";
        }
         else {
         echo "Error Insert value Product: " . $conn->error;
        }
}
fclose($file);
}

if(($file = fopen("Invoice.csv",r)) == FALSE){
        echo("error loading file");
}
else{
while (($data = fgetcsv($file, 1000, ",")) !== FALSE)
{
        $sql = "INSERT INTO Invoice (Invoice_ID,Cust_ID, Status)
        VALUES ('" . $data[0] . "','" . $data[1] . "','" . $data[2] . "');";
        if ($conn->query($sql) === TRUE) {
            echo "Insert value Invoice";
        }
         else {
         echo "Error Insert value Invoice: " . $conn->error;
        }
}
fclose($file);
}

if (($file = fopen("Contact_Info.csv",r)) == FALSE){
        echo("error loading file");
}
else{
while (($data = fgetcsv($file, 1000, ",")) !== FALSE)
{
        $sql = "INSERT INTO Contact_Info (CustomerID,Customer_StreetAddress,Customer_State,Customer_Zip,Customer_Phone )
        VALUES ('" . $data[0] . "','" . $data[1] . "','" . $data[2] . "','" . $data[3] . "','" . $data[4] . "');";
        if ($conn->query($sql) === TRUE) {
            echo "Insert value Contact_Info";
        }
         else {
         echo "Error Insert value Contact_Info: " . $conn->error;
        }
}
fclose($file);
}

if (($file = fopen("Include_Product.csv",r)) == FALSE){
        echo("error loading file");
}
else{
while (($data = fgetcsv($file, 1000, ",")) !== FALSE)
{
        $sql = "INSERT INTO Include_Product (Prod_ID,Inv_ID, Prod_Quantity)
        VALUES ('" . $data[0] . "','" . $data[1] . "','" . $data[2] . "');";
        if ($conn->query($sql) === TRUE) {
            echo "Insert value Include_Product.csv";
        }
         else {
         echo "Error Insert value Include_Product.csv: " . $conn->error;
        }
}
fclose($file);
}



?>



<?php
$conn->close();
?>  

</body>
</html>


