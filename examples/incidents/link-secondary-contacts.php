<?php

use RightNow\Connect\v1_4 as RNCPHP;

$incidentId = 67890;
$secondaryContactIds = [12346, 12347];

$incident = RNCPHP\Incident::fetch($incidentId);
$incident->OtherContacts = new RNCPHP\ContactArray();

foreach ($secondaryContactIds as $contactId) {
    $incident->OtherContacts[] = RNCPHP\Contact::fetch($contactId);
}

$incident->save();

echo "Secondary contacts updated\n";
