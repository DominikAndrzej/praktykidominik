<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <title>Main page</title>
</head>
<body>

    <form method="post">
        <input type="submit" name="btnGoToSendEmail" value="btnGoToSendEmail">
        <input type="submit" name="btnGoToManageEmails" value="btnGoToManageEmails">
    </form>

    <?php
        if(array_key_exists('btnGoToSendEmail', $_POST)){
            go_to_send_email();
        }
        function go_to_send_email() {
            header('Location: /email_sender/send_email_main.php');
        }
    ?>

</body>
</html>