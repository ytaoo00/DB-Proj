CREATE TABLE Customer(
                   Customer_ID INTEGER NOT NULL,
                   Customer_First_Name VARCHAR(25) NOT NULL,
                   Customer_Last_Name VARCHAR(25) NOT NULL,
                   PRIMARY KEY (Customer_ID)
);


CREATE TABLE Product(
                     Product_ID INTEGER NOT NULL,
                     Product_Price DECIMAL(10,2) NOT NULl,
                     Product_Name VARCHAR(25) NOT NULl,
                     PRIMARY KEY (Product_ID)
);

CREATE TABLE Invoice(
                     Invoice_ID INTEGER NOT NULL,
                     Cust_ID INTEGER NOT NULL,
                     Status VARCHAR(10) DEFAULT 'Normal',
                     PRIMARY KEY (Invoice_ID),
                     FOREIGN KEY (Cust_ID) references Customer(Customer_ID)
);

CREATE TABLE Contact_Info(
                    CustomerID INTEGER NOT NULL,
                    Customer_StreetAddress VARCHAR(50) NOT NULL,
                    Customer_State VARCHAR(5) NOT NULL,
                    Customer_Zip VARCHAR(20) NOT NULL,
                    Customer_Phone VARCHAR(20) NOT NULL,
                    PRIMARY KEY (CustomerID,Customer_StreetAddress),
                    FOREIGN KEY (CustomerID) references Customer(Customer_ID)
);

CREATE TABLE Include_Product(
                    Prod_ID INTEGER NOT NULL,
                    Inv_ID INTEGER NOT NULL,
		    Prod_Quantity INTEGER NOT NULL,
                    PRIMARY KEY (Prod_ID, Inv_ID),
                    FOREIGN KEY (Prod_ID) references Product(Product_ID),
                    FOREIGN KEY (Inv_ID) references Invoice(Invoice_ID)

);
