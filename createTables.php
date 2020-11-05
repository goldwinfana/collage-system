<?php /* Attempt MySQL server connection. Assuming you are running MySQL server with default setting (user 'root' with no password) */
 $link = mysqli_connect("localhost", "root", "", "collage_system");
 // Check connection 
 if($link === false){ 
     die("ERROR: Could not connect. " . mysqli_connect_error()); 
    }
  // Attempt create table query execution
   $sqllearner = "CREATE TABLE learner(
             id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
             first_name VARCHAR(30) NOT NULL,
             last_name VARCHAR(30) NOT NULL,
            email VARCHAR(70) NOT NULL UNIQUE,
            course_name VARCHAR(30) NOT NULL,
            passwords varchar(30) NOT NULL)";

      if(mysqli_query($link, $sqllearner))
            { echo "Table learner created successfully."; } 
            else
            { echo "ERROR: table learner not executed $sqllearner. " . mysqli_error($link); }
            

     $sqlcourse = "CREATE TABLE course(
     course_id   INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
     course_name VARCHAR(30) NOT NULL,
     courseFee int NOT NULL
                    )";
        
        if(mysqli_query($link, $sqlcourse))
        { echo "Table course created successfully."; } 
        else
        { echo "ERROR: table course not executed $sqlcourse. " . mysqli_error($link); }
        


                $sqladmin ="CREATE TABLE admins(
                    admin_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    first_name VARCHAR(30) NOT NULL,
                         last_name VARCHAR(30) NOT NULL,
                        email VARCHAR(70) NOT NULL UNIQUE,
                        passwords varchar(30) NOT NULL)";

        if(mysqli_query($link, $sqladmin))
        { echo "Table admins created successfully."; } 
        else
        { echo "ERROR:  table admin not executed $sqladmin. " . mysqli_error($link); }
        
        $sql2 = "CREATE TABLE results (
            resultid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            studid VARCHAR(50) NOT NULL UNIQUE,
            mark int )";
        
        if(mysqli_query($link, $sql2)){
            echo "Table created successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

        $sql2 = "CREATE TABLE users (
            id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )";
        
        if(mysqli_query($link, $sql2)){
            echo "Table created successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        
            // Close connection 
            mysqli_close($link); 
?>