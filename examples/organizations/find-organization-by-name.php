<?php

use RightNow\Connect\v1_4 as RNCPHP;

$name = 'Harbourlight Engineering Pty Ltd';
$escaped = addslashes($name);

$result = RNCPHP\ROQL::query(
    "SELECT ID, LookupName FROM Organization WHERE Name = '{$escaped}' LIMIT 1"
)->next();

$row = $result->next();
if (!$row) {
    echo "No organization found.\n";
    exit;
}

$organization = RNCPHP\Organization::fetch((int)$row['ID']);
printf("%d | %s\n", $organization->ID, $organization->LookupName);
