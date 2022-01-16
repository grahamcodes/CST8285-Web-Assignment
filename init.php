<?php
    // Collect data from input.csv.
    function getInfo($file) {
        $itemAttributes = fgetcsv($file, 1000, ",");
        return $itemAttributes;
    }
            
    $userFile = fopen("input.csv", "r") or die("<br>Error opening file."); // Open input.csv. 
    $counter = 0;

    while (!feof($userFile)) {
        $lineNumber[$counter] = getInfo($userFile); // This 2D array will populate the table in DB.
        $counter++;
    }
    fclose($userFile);

    // Create connection
    $conn = new mysqli('localhost', 'root', '');
    // Check connection
    if ($conn->connect_error) {
    die("<br>Connection failed: " . $conn->connect_error);
    }

    // Create database
    $createDB = "CREATE DATABASE IF NOT EXISTS assignment8";
    if ($conn->query($createDB) === TRUE) {
    echo "<br>Database created successfully";
    } else {
    echo "<br>Error creating database: " . $conn->error;
    }

    // Select Database
    $selectDB = mysqli_select_db($conn, "assignment8");

    // sql to create table
    $createTable = "CREATE TABLE IF NOT EXISTS ITEMS (
        ItemNumber INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Artwork VARCHAR(45) NOT NULL UNIQUE,
        Medium VARCHAR(45),
        Artist VARCHAR(45),
        Price VARCHAR(45),
        Description VARCHAR(100)
        )";
        
    if ($conn->query($createTable) === TRUE) {
    echo "<br>Table created successfully";
    } else {
    echo "<br>Error creating table: " . $conn->error;
    }

    // Insert values.
    foreach ($lineNumber as $row) {
        if ($row != NULL) {
            $insertValues = "INSERT INTO ITEMS (Artwork, Medium, Artist, Price, Description)
            VALUES ('$row[1]', '$row[2]', '$row[3]', '$row[4]', '$row[5]');";
        }        
        if ($conn->query($insertValues) === TRUE) {
            echo "<br>New record created successfully";
        }
    }
 
    $conn->close();
?> 