<?php

use RightNow\Connect\v1_4 as RNCPHP;

$contactId = 12345;

$incident = new RNCPHP\Incident();
$incident->Subject = 'Example portal access enquiry';
$incident->PrimaryContact = RNCPHP\Contact::fetch($contactId);

// Sites commonly have additional required fields, rules or thread requirements.
// Add those for your environment before using this pattern in production.
$incident->save();

echo 'Created incident ID: ' . $incident->ID . PHP_EOL;
