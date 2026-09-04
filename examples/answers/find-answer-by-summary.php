<?php

use RightNow\Connect\v1_4 as RNCPHP;

$search = 'Customer portal sign-in troubleshooting';
$escaped = str_replace("'", "''", $search);

$result = RNCPHP\ROQL::query(
    "SELECT ID, Name, Summary, StatusWithType.Status.LookupName " .
    "FROM Answer WHERE Summary = '{$escaped}' LIMIT 20"
)->next();

while ($row = $result->next()) {
    printf("%s | %s | %s\n", $row['Name'] ?? $row['ID'], $row['Summary'] ?? '', $row['StatusWithType.Status.LookupName'] ?? '');
}
