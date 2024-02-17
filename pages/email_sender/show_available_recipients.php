<?php
include '../../database_config.php';
include '../../global/database_service.php';
function createSelectElement(array $selectOptions, string $selectName)
{
    echo "<select name=\"" . $selectName . "[]\" id=\"" . $selectName . "\" multiple>";
    foreach ($selectOptions as $selectOption) {
        echo "<option>" . $selectOption["email"] . "</option>";
    }
    echo "</select>";
}

$emails = get_emails();

createSelectElement($emails, "emails");
