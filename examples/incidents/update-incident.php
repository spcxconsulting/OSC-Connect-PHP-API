<?php

use RightNow\Connect\v1_4 as RNCPHP;

$incidentId = 67890;
$queueId = 7;      // Replace with a verified queue ID.
$statusId = 2;     // Replace with a verified incident status ID.

$incident = RNCPHP\Incident::fetch($incidentId);

$incident->Subject = 'SPCX example: portal access issue requires identity review';

$incident->Queue = new RNCPHP\NamedIDLabel();
$incident->Queue->ID = $queueId;

$incident->StatusWithType = new RNCPHP\StatusWithType();
$incident->StatusWithType->Status = new RNCPHP\NamedIDOptList();
$incident->StatusWithType->Status->ID = $statusId;

// Normal save executes the platform processing associated with this operation.
$incident->save();

printf("Updated incident %s\n", $incident->ReferenceNumber ?? $incident->LookupName);
