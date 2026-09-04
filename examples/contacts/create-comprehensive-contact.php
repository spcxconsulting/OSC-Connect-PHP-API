<?php

use RightNow\Connect\v1_4 as RNCPHP;

/**
 * Original SPCX example.
 *
 * Creates a fictional contact with several commonly used Contact elements.
 * Review menu/list identifiers against your own Oracle B2C Service site.
 */

$contact = new RNCPHP\Contact();

// Name
$contact->Name = new RNCPHP\PersonName();
$contact->Name->First = 'Jordan';
$contact->Name->Last = 'Nguyen';
$contact->Title = 'Dr';

// Primary address
$contact->Address = new RNCPHP\Address();
$contact->Address->Street = "18 Example Lane\nAdelaide SA";
$contact->Address->City = 'Adelaide';
$contact->Address->PostalCode = '5000';

// Prefer a verified country object/list value from your own site.
// Example only: replace 1 with the appropriate Country ID for your implementation.
$contact->Address->Country = new RNCPHP\NamedIDOptList();
$contact->Address->Country->ID = 1;

// Email addresses
$contact->Emails = new RNCPHP\EmailArray();

$primaryEmail = new RNCPHP\Email();
$primaryEmail->Address = 'jordan.nguyen@example.net';
$primaryEmail->AddressType = new RNCPHP\NamedIDOptList();
$primaryEmail->AddressType->LookupName = 'Email - Primary';
$contact->Emails[] = $primaryEmail;

$alternateEmail = new RNCPHP\Email();
$alternateEmail->Address = 'j.nguyen+project@example.net';
$alternateEmail->AddressType = new RNCPHP\NamedIDOptList();
$alternateEmail->AddressType->LookupName = 'Email - Alt1';
$contact->Emails[] = $alternateEmail;

// Phone numbers
$contact->Phones = new RNCPHP\PhoneArray();

$mobile = new RNCPHP\Phone();
$mobile->Number = '+61 412 345 678';
$mobile->PhoneType = new RNCPHP\NamedIDOptList();
$mobile->PhoneType->LookupName = 'Mobile Phone';
$contact->Phones[] = $mobile;

$office = new RNCPHP\Phone();
$office->Number = '+61 8 7000 0000';
$office->PhoneType = new RNCPHP\NamedIDOptList();
$office->PhoneType->LookupName = 'Office Phone';
$contact->Phones[] = $office;

// Marketing preferences
$contact->MarketingSettings = new RNCPHP\ContactMarketingSettings();
$contact->MarketingSettings->MarketingOptIn = true;
$contact->MarketingSettings->SurveyOptIn = false;
$contact->MarketingSettings->MarketingOrganizationName = 'Example Organisation';

// Optional customer portal login. Only set this when your implementation needs it.
$contact->Login = 'jordan.nguyen@example.net';

// Optional organisation relationship. Replace with a valid organisation ID.
// $contact->Organization = RNCPHP\Organization::fetch(12345);

// Custom fields are deliberately not hard-coded here because the package/field
// hierarchy is specific to each B2C Service site. Inspect Contact metadata first.
// $contact->CustomFields->c->example_field = 'Example value';

try {
    $contact->save();
    echo 'Created Contact ID: ' . $contact->ID . PHP_EOL;
} catch (\Exception $error) {
    // In production code: log safely, decide whether to roll back, and avoid
    // exposing internal platform details directly to end users.
    throw $error;
}
