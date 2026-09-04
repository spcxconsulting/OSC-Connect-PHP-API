<?php

use RightNow\Connect\v1_4 as RNCPHP;

// SPCX-authored example data.
$contact = new RNCPHP\Contact();
$contact->Name = new RNCPHP\PersonName();
$contact->Name->First = 'Alex';
$contact->Name->Last = 'Morgan';

$contact->Emails = new RNCPHP\EmailArray();

$primaryEmail = new RNCPHP\Email();
$primaryEmail->Address = 'alex.morgan@example.net';
$primaryEmail->AddressType = new RNCPHP\NamedIDOptList();
$primaryEmail->AddressType->LookupName = 'Email - Primary';

$contact->Emails[] = $primaryEmail;

$contact->save();

echo 'Created contact ID: ' . $contact->ID . PHP_EOL;
