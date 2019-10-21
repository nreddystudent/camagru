<?php
    include_once 'database.php';
    try{
        $connection = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = "DROP DATABASE IF EXISTS $DB_NAME";
        $connection->exec($statement);
        $statement = "CREATE DATABASE $DB_NAME";
        $connection->exec($statement);
        echo "done";
    }
    catch(PDOException $e){
        echo $statement . "<br>" . $e->getMessage();
    }

    try{
        $connection = new PDO($DB_DSNF, $DB_USER, $DB_PASSWORD);
        $statement = "CREATE TABLE USERS(
            id INT NOT NULL AUTO_INCREMENT,
            first_name VARCHAR(100) NOT NULL,
            last_name VARCHAR(100) NOT NULL,
            email VARCHAR(255) NOT NULL,
            `password` VARCHAR(255)NOT NULL,
            creation_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            is_admin TINYINT NOT NULL,
            PRIMARY KEY(id)
            );";
        $connection->exec($statement);
        // $statement = 'INSERT INTO USERS(first_name, last_name, email, `password`, is_admin)
        // VALUES("admin", "admin", "nolin.reddy@gmail.com", 1234, 1)';
        // $connection->exec($statement);
    }
    catch(PDOException $e){
        echo $statement."<br>".$e->getMessage();
    } 
    $connection=NULL;
?>