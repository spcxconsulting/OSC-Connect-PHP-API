<?php

use RightNow\Connect\v1_4 as RNCPHP;

$organizationId = 1201;

$organization = RNCPHP\Organization::fetch($organizationId);
if (!$organization) {
    throw new RuntimeException('Organization not found.');
}

$address = new RNCPHP\TypedAddress();
$address->AddressType = new RNCPHP\NamedIDLabel();
$address->AddressType->LookupName = 'Business'; // verify on target site
$address->Street = '27 Sample Street';
$address->City = 'Adelaide';
$address->PostalCode = '5000';
$address->Country = new RNCPHP\NamedIDOptList();
$address->Country->LookupName = 'Australia';

$organization->Addresses ??= new RNCPHP\TypedAddressArray();
$organization->Addresses[] = $address;
$organization->save();

echo 'Address added.' . PHP_EOL;
