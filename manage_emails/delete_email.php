<?php
include '../global/database_service.php';
include '../database_config.php';

$deleteResult = delete_email_by_email($_POST["email"]);

//message
if($deleteResult)
{
    echo "deleted successfully";
}
else
{
    echo "delete failure";
}


