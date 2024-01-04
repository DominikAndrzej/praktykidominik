<?php

include('navigation_functions.php');

if (array_key_exists('btnGoToIndex', $_POST)) {
    go_to_index();
}

if (array_key_exists('btnGoToSendEmail', $_POST)) {
    go_to_send_email();
}

if (array_key_exists('btnGoToManageEmails', $_POST)) {
    go_to_manage_emails();
}
