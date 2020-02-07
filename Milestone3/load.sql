LOAD DATA LOCAL INFILE 'Customer.csv' INTO TABLE Customer
  FIELDS TERMINATED BY ','
  LINES TERMINATED BY '\n'
;

LOAD DATA LOCAL INFILE 'Product.csv' INTO TABLE Product
  FIELDS TERMINATED BY ','
  LINES TERMINATED BY '\n'
;

LOAD DATA LOCAL INFILE 'Invoice.csv' INTO TABLE Invoice
  FIELDS TERMINATED BY ','
  LINES TERMINATED BY '\n'
;

LOAD DATA LOCAL INFILE 'Contact_Info.csv' INTO TABLE Contact_Info
  FIELDS TERMINATED BY ','
  LINES TERMINATED BY '\n'
;

LOAD DATA LOCAL INFILE 'Include_Product.csv' INTO TABLE Include_Product
  FIELDS TERMINATED BY ','
  LINES TERMINATED BY '\n'
;

