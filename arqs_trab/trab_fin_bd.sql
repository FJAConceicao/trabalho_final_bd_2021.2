/* bd_wine_logico: */ 
 
CREATE TABLE Product ( 
    Id INT PRIMARY KEY, 
    asin VARCHAR, 
    brand VARCHAR, 
    sourceUrl VARCHAR, 
    descriptions VARCHAR, 
    fk_info_info_PK INT, 
    fk_Manufacturer_Id INT 
); 
 
CREATE TABLE User ( 
    Id INT PRIMARY KEY, 
    username varchar(256), 
    city varchar(256), 
    province varchar(256) 
); 
 
CREATE TABLE Manufacturer ( 
    Id INT PRIMARY KEY, 
    name VARCHAR, 
    url VARCHAR 
); 
 
CREATE TABLE Store ( 
    Id INT PRIMARY KEY, 
    name VARCHAR, 
    url VARCHAR 
); 
 
CREATE TABLE categories ( 
    categories_PK INT NOT NULL PRIMARY KEY, 
    categories VARCHAR 
); 
 
CREATE TABLE info ( 
    info_PK INT NOT NULL PRIMARY KEY, 
    dimension VARCHAR, 
    weight VARCHAR 
); 
 
CREATE TABLE Review ( 
    fk_User_Id INT, 
    fk_Product_Id INT, 
    Id INT PRIMARY KEY, 
    date DATE, 
    didPurchase BOOLEAN, 
    rating INT, 
    title VARCHAR, 
    text VARCHAR 
); 
 
CREATE TABLE sells ( 
    fk_Product_Id INT, 
    fk_Store_Id INT 
); 
 
CREATE TABLE product_categories ( 
    product_fk INT, 
    categories_fk INT 
); 
  
ALTER TABLE Product ADD CONSTRAINT FK_Product_2 
    FOREIGN KEY (fk_categories_categories_PK) 
    REFERENCES categories (categories_PK) 
    ON DELETE NO ACTION; 
  
ALTER TABLE Product ADD CONSTRAINT FK_Product_3 
    FOREIGN KEY (fk_info_info_PK) 
    REFERENCES info (info_PK) 
    ON DELETE SET NULL; 
  
ALTER TABLE Product ADD CONSTRAINT FK_Product_4 
    FOREIGN KEY (fk_Manufacturer_Id) 
    REFERENCES Manufacturer (Id) 
    ON DELETE RESTRICT; 
  
ALTER TABLE Review ADD CONSTRAINT FK_Review_2 
    FOREIGN KEY (fk_User_Id) 
    REFERENCES User (Id) 
    ON DELETE SET NULL; 
  
ALTER TABLE Review ADD CONSTRAINT FK_Review_3 
    FOREIGN KEY (fk_Product_Id) 
    REFERENCES Product (Id) 
    ON DELETE SET NULL; 
  
ALTER TABLE sells ADD CONSTRAINT FK_sells_1 
    FOREIGN KEY (fk_Product_Id) 
    REFERENCES Product (Id) 
    ON DELETE RESTRICT; 
  
ALTER TABLE sells ADD CONSTRAINT FK_sells_2 
    FOREIGN KEY (fk_Store_Id) 
    REFERENCES Store (Id) 
    ON DELETE SET NULL; 

/*  
ALTER TABLE product_categories ADD CONSTRAINT FK_product_categories_1 
    FOREIGN KEY (product_fk???, categories_fk???) 
    REFERENCES ??? (???);
*/