<?php

use RightNow\Connect\v1_4 as RNCPHP;

$query = "SELECT ID, Name FROM Organization WHERE ID > 0 ORDER BY ID DESC LIMIT 10";
$result = RNCPHP\ROQL::query($query)->next();

while ($row = $result->next()) {
    echo $row['ID'] . ' - ' . ($row['Name'] ?? '') . PHP_EOL;
}
