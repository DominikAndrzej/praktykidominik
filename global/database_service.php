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

function add_email_user($emailUserName, $emailUserSurname, $emailToAdd)
{
    include '../database_config.php';
    class ReturnStatement
    {
        public string $message;
        public bool $ifSucceded;

        public function __construct(bool $ifSucceded, $message)
        {
            $this->message = $message;
            $this->ifSucceded = $ifSucceded;
        }
    }

    try {
        if (isset($servername, $username, $password, $databasename)) {
            //establishing connection
            $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);


            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $addEmail = $conn->prepare("INSERT IGNORE INTO recipients (`name`, `surname`, `email`) VALUES ('$emailUserName','$emailUserSurname','$emailToAdd')");
            $addEmail->execute();

            $conn = null;

            return new ReturnStatement(true, "new email user added succesfully");

        } else {
            return new ReturnStatement(false, "there are some problems with database connection, check code for details");
        }

    } catch (PDOException $e) {
        return new ReturnStatement(false, "Connection to database failed: " . $e->getMessage());

    }
}
