<?php

use RightNow\Connect\v1_4 as RNCPHP;

$parentOrganizationId = 1200;
$salesAccountId = 42;

$organization = new RNCPHP\Organization();
$organization->Name = 'Harbourlight Engineering Pty Ltd';
$organization->NumberOfEmployees = 85;

$organization->CRMModules = new RNCPHP\CRMModules();
$organization->CRMModules->Marketing = true;
$organization->CRMModules->Sales = true;
$organization->CRMModules->Service = true;

$address = new RNCPHP\TypedAddress();
$address->AddressType = new RNCPHP\NamedIDLabel();
$address->AddressType->LookupName = 'Business'; // verify this value on your site
$address->Street = "14 Example Parade";
$address->City = 'Adelaide';
$address->PostalCode = '5000';
$address->Country = new RNCPHP\NamedIDOptList();
$address->Country->LookupName = 'Australia';

$organization->Addresses = new RNCPHP\TypedAddressArray();
$organization->Addresses[] = $address;

$organization->Industry = new RNCPHP\NamedIDOptList();
$organization->Industry->LookupName = 'Engineering'; // site-specific menu value

$organization->Parent = RNCPHP\Organization::fetch($parentOrganizationId);

$note = new RNCPHP\Note();
$note->Text = 'Created from an SPCX Connect PHP integration example.';
$organization->Notes = new RNCPHP\NoteArray();
$organization->Notes[] = $note;

$organization->SalesSettings = new RNCPHP\OrganizationSalesSettings();
$organization->SalesSettings->SalesAccount = RNCPHP\Account::fetch($salesAccountId);

$organization->save();

echo 'Created organization ID: ' . $organization->ID . PHP_EOL;
