<?php
function get_columns_names($tableName): ?array {
    include '../database_config.php';

    try {
        if (isset($servername, $username, $password)) {
            //establishing connection
            $conn = new PDO("mysql:host=$servername;dbname=$username", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Executing query
            $getColumnsNamesQuery = $conn->prepare("SHOW columns from `$tableName`");
            $getColumnsNamesQuery->execute();

            $result = $getColumnsNamesQuery->fetchAll();

            //closing connection
            $conn = null;

            if ($result) {
                return $result;
            } else {

                echo "there is no data";
                return null;
            }

        } else {
            echo "there are some problems with database connection, check code for details";
        }

    } catch (PDOException $e) {
        echo "Connection to database failed: " . $e->getMessage();
    }
    return null;
}
function get_emails(): ?array{
    include '../database_config.php';

    try {
        if (isset($servername, $username, $password, $databasename)) {
            //establishing connection
            $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Executing query
            $getAllRecipientsQuery = $conn->prepare("SELECT `email`,`name`,`surname` FROM `recipients`");
            $getAllRecipientsQuery->execute();

            $result = $getAllRecipientsQuery->fetchAll();

            //closing connection
            $conn = null;

            if ($result) {
                return $result;
            } else {

                echo "there aren't any recipients";
                return null;
            }

        } else {
            echo "there are some problems with database connection, check code for details";
        }

    } catch (PDOException $e) {
        echo "Connection to database failed: " . $e->getMessage();
    }
    return null;
}

function delete_email_by_email($email){
    include '../database_config.php';

    try {
        if (isset($servername, $username, $password, $databasename)) {
            //establishing connection
            $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "DELETE FROM `recipients` WHERE `email` = :email";
            $queryRun = $conn->prepare($query);

            $data = [
                ':email' => $email,
            ];

            $queryExecute = $queryRun->execute($data);

            $conn = null;

            return $queryExecute;
        }
    } catch (PDOException $e) {
//        header('Location: manage_emails_main.php?Message=' . "Database failure: " . $e->getMessage());
        return null;
    }
}
function add_email_user($emailUserName, $emailUserSurname, $email)
{
    include '../database_config.php';

    try {
        if (isset($servername, $username, $password, $databasename)) {
            //establishing connection
            $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "INSERT INTO recipients (`name`, `surname`, `email`) VALUES (:email_user_name, :email_user_surname, :email)";
            $queryRun = $conn->prepare($query);

            $data = [
                ':email_user_name' => $emailUserName,
                ':email_user_surname' => $emailUserSurname,
                ':email' => $email,
            ];

            $queryExecute = $queryRun->execute($data);

            $conn = null;

            return $queryExecute;
        }
    } catch (PDOException $e) {
//        print "Error: " . $e->getMessage();
        return null;
    }
}
