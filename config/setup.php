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
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $statement = "CREATE TABLE users(
            id INT NOT NULL AUTO_INCREMENT,
            username VARCHAR(150) NOT NULL,
            email VARCHAR(255) NOT NULL,
            `password` VARCHAR(255)NOT NULL,
            first_name VARCHAR(150) NOT NULL,
            last_name VARCHAR(100) NOT NULL,
            acl TEXT,
            token VARCHAR(100) DEFAULT NULL,
            verified TINYINT NOT NULL DEFAULT 0,
            creation_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY(id)
            );";
        $connection->exec($statement);
        $statement = 'INSERT INTO users(username, email, `password`, first_name, last_name)
        VALUES("admin", "nolin.reddy@gmail.com", 1234, "admin", "admin")';
        $connection->exec($statement);
        $statement = "CREATE TABLE user_sessions(
            id INT NOT NULL AUTO_INCREMENT,
            user_id INT NOT NULL,
            `session` VARCHAR(255)NOT NULL,
            user_agent VARCHAR(255) NOT NULL,
            PRIMARY KEY(id)
            );";
        $connection->exec($statement);
        $statement = "CREATE TABLE `Posts` (
            `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            `name` varchar(200) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
        $connection->exec($statement);
    }
    catch(PDOException $e){
        echo $statement."<br>".$e->getMessage();
    } 
    $connection=NULL;

    //`fullpath` longtext NOT NULL
?>