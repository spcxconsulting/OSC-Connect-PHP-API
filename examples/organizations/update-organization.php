<?php

use RightNow\Connect\v1_4 as RNCPHP;

$organizationId = 1201;

$organization = RNCPHP\Organization::fetch($organizationId);
if (!$organization) {
    throw new RuntimeException('Organization not found.');
}

$organization->Name = 'Harbourlight Engineering Group Pty Ltd';
$organization->NumberOfEmployees = 92;

$organization->CRMModules ??= new RNCPHP\CRMModules();
$organization->CRMModules->Service = true;
$organization->CRMModules->Sales = true;

$organization->save();

echo 'Updated organization ID: ' . $organization->ID . PHP_EOL;
