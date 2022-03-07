DROP DATABASE IF EXISTS cake_cms;

CREATE DATABASE IF NOT EXISTS cake_cms;

USE cake_cms;

CREATE TABLE product ( 
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(256), 
    asin VARCHAR(256), 
    brand VARCHAR(256), 
    source_url VARCHAR(2048), 
    description VARCHAR(2048), 
    fk_info_info_PK INT, 
    fk_Manufacturer_Id INT 
) AUTO_INCREMENT = 1; 
 
CREATE TABLE user ( 
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    username varchar(256), 
    city varchar(256), 
    province varchar(256) 
) AUTO_INCREMENT = 1; 
 
CREATE TABLE manufacturer ( 
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    name VARCHAR(256), 
    url VARCHAR(2048) 
) AUTO_INCREMENT = 1; 
 
CREATE TABLE store ( 
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    name VARCHAR(256), 
    url VARCHAR(2048) 
) AUTO_INCREMENT = 1; 
 
CREATE TABLE categorie ( 
    categorie VARCHAR(256) PRIMARY KEY NOT NULL,
    product_fk INT
); 
 
CREATE TABLE info ( 
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
    dimension VARCHAR(256),
    weight VARCHAR(256)
) AUTO_INCREMENT = 1; 
 
CREATE TABLE review ( 
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    fk_User_Id INT, 
    fk_Product_Id INT,  
    date DATETIME, 
    did_purchase BOOLEAN, 
    rating INT, 
    title VARCHAR(256), 
    text VARCHAR(2048) 
) AUTO_INCREMENT = 1;
 
CREATE TABLE sells (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    fk_Product_Id INT, 
    fk_Store_Id INT 
) AUTO_INCREMENT = 1;
   
ALTER TABLE product ADD CONSTRAINT FK_Product_3 
    FOREIGN KEY (fk_info_info_PK) 
    REFERENCES info (id) 
    ON DELETE SET NULL; 
  
ALTER TABLE product ADD CONSTRAINT FK_Product_4 
    FOREIGN KEY (fk_Manufacturer_Id) 
    REFERENCES manufacturer (id) 
    ON DELETE RESTRICT; 
  
ALTER TABLE review ADD CONSTRAINT FK_Review_2 
    FOREIGN KEY (fk_User_Id) 
    REFERENCES user (id) 
    ON DELETE SET NULL; 
  
ALTER TABLE review ADD CONSTRAINT FK_Review_3 
    FOREIGN KEY (fk_Product_Id) 
    REFERENCES product (id) 
    ON DELETE SET NULL; 
  
ALTER TABLE sells ADD CONSTRAINT FK_sells_1 
    FOREIGN KEY (fk_Product_Id) 
    REFERENCES product (id) 
    ON DELETE RESTRICT; 
  
ALTER TABLE sells ADD CONSTRAINT FK_sells_2 
    FOREIGN KEY (fk_Store_Id) 
    REFERENCES store (id) 
    ON DELETE SET NULL; 
    
ALTER TABLE categorie ADD CONSTRAINT FK_categorie_1 
    FOREIGN KEY (product_fk) 
    REFERENCES product (id) 
    ON DELETE SET NULL; 