<?php
include '../database_config.php';
include '../global/database_service.php';

/**
 * tworzy tabele w postaci elementów html poprzez funkcje "echo",
 *
 * dostosowana do danych pobieranych z bazy danych ($tableHeaders i $rows powinny być wynikiem kwerendy),
 *
 * do każdego wiersza dodaje funkcję edycji i usuwania z bazy
 */
function createTableElement(array $tableHeaders, array $rowsData = NULL)
{
    echo "<table>";
    echo "<tr>";
    foreach ($tableHeaders as $header) {
        echo "<th>" . $header["Field"] . "</th>";
    }
    echo "</tr>";

    foreach ($rowsData as $row) {
        $name = $row["name"];
        $surname = $row["surname"];
        $email = $row["email"];

        echo "<tr>";
        echo "<td>";
        echo $name;
        echo "</td>";
        echo "<td>";
        echo $surname;
        echo "</td>";
        echo "<td>";
        echo $email;
        echo "</td>";
        echo "<td>";
        echo
        "
        <button id='deleteButton' onclick='requestDelete(\"$email\")' style='background-color: mediumaquamarine; color: darkred; font-weight: bold'>
        delete</button>
        ";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
}

$columns_names = get_columns_names("recipients");
array_shift($columns_names);

$emails = get_emails();

createTableElement($columns_names, $emails);
exit(0);

