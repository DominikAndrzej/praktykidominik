<!DOCTYPE html>
<html>
<head>

</head>
<body>

    <?php
        $servername = "localhost";
        $username = "praktykidominik_base";
        $password = "praktykidominik";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=praktykidominik_base", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    ?>

    <?php
        require 'email_sender/form.html';
    ?>

</body>
</html>