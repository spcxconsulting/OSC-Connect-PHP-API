<?php

use RightNow\Connect\v1_4 as RNCPHP;

/**
 * Original SPCX example: update selected Contact properties.
 */

$contactId = 12345; // Replace with a real Contact ID.
$contact = RNCPHP\Contact::fetch($contactId);

if (!$contact) {
    throw new RuntimeException('Contact was not found.');
}

// Update the name without replacing unrelated Contact data.
if (!$contact->Name) {
    $contact->Name = new RNCPHP\PersonName();
}
$contact->Name->First = 'Jordan';
$contact->Name->Last = 'Nguyen-Smith';

// Update title and marketing preference.
$contact->Title = 'Dr';

if (!$contact->MarketingSettings) {
    $contact->MarketingSettings = new RNCPHP\ContactMarketingSettings();
}
$contact->MarketingSettings->MarketingOptIn = false;

try {
    $contact->save();
    echo 'Updated Contact ID: ' . $contact->ID . PHP_EOL;
} catch (\Exception $error) {
    throw $error;
}
