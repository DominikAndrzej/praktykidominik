<?php
include '../database_config.php';

try {

    if (isset($servername, $username, $password)) {
        $conn = new PDO("mysql:host=$servername;dbname=praktykidominik_base", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $getAllRecipientsQuery = $conn->prepare("SELECT email FROM recipients");
        $getAllRecipientsQuery->execute();

        $result = $getAllRecipientsQuery->fetchAll();

        if ($result) {

            echo "<select name='emails[]' id='emails' multiple>";
            foreach ($result as $selectOption) {
                echo "<option>".$selectOption["email"]."</option>option>";
            }
            echo "</select>";

        } else {
            echo "there aren't any recipients";
        }

    } else {
        echo "there are some problems with database connection, check code for details";
    }


    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection to database failed: " . $e->getMessage();
}



