<?php

use RightNow\Connect\v1_4 as RNCPHP;

$organizationId = 1201;
$parentOrganizationId = 1200;

$organization = RNCPHP\Organization::fetch($organizationId);
$parent = RNCPHP\Organization::fetch($parentOrganizationId);

if (!$organization || !$parent) {
    throw new RuntimeException('Organization or parent organization not found.');
}

$organization->Parent = $parent;
$organization->save();

echo 'Parent relationship updated.' . PHP_EOL;

// OrganizationHierarchy is derived from Parent; do not construct it manually.
