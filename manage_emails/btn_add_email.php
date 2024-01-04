<?php
include '../database_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailToAdd = htmlspecialchars($_POST["emailToAdd"]);
    $emailUserName = htmlspecialchars($_POST['emailUserName']);
    $emailUserSurname = htmlspecialchars($_POST['emailUserSurname']);

    if(filter_var($emailToAdd, FILTER_VALIDATE_EMAIL)){

        try {
            if (isset($servername, $username, $password)) {
                $conn = new PDO("mysql:host=$servername;dbname=praktykidominik_base", $username, $password);

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $addEmail = $conn->prepare("INSERT IGNORE INTO recipients (`name`, `surname`, `email`) VALUES ('$emailUserName','$emailUserSurname','$emailToAdd')");
                $addEmail->execute();

                $result = $addEmail->fetchAll();

                $succesMessage = "new email user added succesfully";

                header("Location: manage_emails_main.php?Message=" . $succesMessage);
                exit();

            } else {
                $failureMessage = "there are some problems with database connection, check code for details";
                header("Location: manage_emails_main.php?Message=" . $failureMessage);
                exit();
            }

            $conn = null;
        } catch (PDOException $e) {
            echo "Connection to database failed: " . $e->getMessage();
        }

    }else{
        $failureMessage = urlencode("Email is not valid.");
        header("Location: manage_emails_main.php?Message=" . $failureMessage);
        exit();
    }
}


