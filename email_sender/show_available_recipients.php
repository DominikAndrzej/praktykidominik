<?php
include '../database_config.php';
include '../global/database_service.php';
function createSelectElement(array $selectOptions)
{
    echo "<select name= 'emails[]' id='emails' multiple>";
    foreach ($selectOptions as $selectOption) {
        echo "<option>".$selectOption["email"]."</option>option>";
    }
    echo "</select>";
}

$emails = get_emails();

createSelectElement($emails);
