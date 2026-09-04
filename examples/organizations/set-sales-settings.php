<?php

use RightNow\Connect\v1_4 as RNCPHP;

$organizationId = 1201;
$salesAccountId = 42;

$organization = RNCPHP\Organization::fetch($organizationId);
if (!$organization) {
    throw new RuntimeException('Organization not found.');
}

$organization->SalesSettings ??= new RNCPHP\OrganizationSalesSettings();
$organization->SalesSettings->SalesAccount = RNCPHP\Account::fetch($salesAccountId);

// TotalRevenue is a MonetaryValue in Connect PHP. Its historical PHP value
// semantics differ from modern REST JSON documentation, so do not blindly copy
// a REST numeric value into RNCPHP without checking the target version.
//
// $revenue = new RNCPHP\MonetaryValue();
// $revenue->Currency = new RNCPHP\NamedIDOptList();
// $revenue->Currency->LookupName = 'AUD';
// $revenue->Value = ...; // verify Connect PHP version semantics first
// $organization->SalesSettings->TotalRevenue = $revenue;

$organization->save();

echo 'Sales settings updated.' . PHP_EOL;
