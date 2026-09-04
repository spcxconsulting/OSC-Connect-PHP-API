<?php

use RightNow\Connect\v1_4 as RNCPHP;

$referenceNumber = '260904-000001';

// Escape values before embedding them into ROQL in real applications.
$escapedReference = str_replace("'", "''", $referenceNumber);

$incident = RNCPHP\Incident::first(
    "ReferenceNumber = '{$escapedReference}'"
);

if (!$incident) {
    echo "Incident not found\n";
    return;
}

printf(
    "%s | ID %d | %s\n",
    $incident->ReferenceNumber,
    $incident->ID,
    $incident->Subject ?? ''
);
