<?php

use RightNow\Connect\v1_4 as RNCPHP;

$result = RNCPHP\ROQL::query(
    "SELECT ID, ReferenceNumber, Subject FROM Incident ORDER BY ID DESC LIMIT 20"
)->next();

while ($row = $result->next()) {
    printf(
        "%s | %s\n",
        $row['ReferenceNumber'] ?? $row['ID'],
        $row['Subject'] ?? ''
    );
}
