<?php
function go_to_index(): void
{
    header('Location: ../index.php');
    exit();
}
function go_to_send_email(): void
{
    header('Location: /email_sender/send_email_main.php');
    exit();
}
function go_to_manage_emails(): void
{
    header('Location: /manage_emails/manage_emails_main.php');
    exit();
}

// TODO zrobić tak, zeby dzialanie funkcji nie bylo zalezne od lokalizacji pliku w ktorym jest ona wywolywana