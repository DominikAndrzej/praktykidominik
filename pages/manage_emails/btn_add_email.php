
<?php

include '../../global/database_service.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailToAdd = htmlspecialchars($_POST["emailToAdd"]);
    $emailUserName = htmlspecialchars($_POST['emailUserName']);
    $emailUserSurname = htmlspecialchars($_POST['emailUserSurname']);

    if (filter_var($emailToAdd, FILTER_VALIDATE_EMAIL)) {

        $addEmailUserResult = add_email_user($emailUserName, $emailUserSurname, $emailToAdd);

        //message
        if($addEmailUserResult)
            {
                echo "success";
                //header('Location: manage_emails_main.php');
            }
            else
            {
                echo "failure";
//                header('Location: manage_emails_main.php?Message=' . "adding new recipient failure");
            }




    } else {
        //message
//        $failureMessage = urlencode("Email is invalid.");
//        header("Location: manage_emails_main.php?Message=" . $failureMessage);
        echo "invalid-email";
    }
    exit();
}


