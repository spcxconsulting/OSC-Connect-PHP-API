<?php

use RightNow\Connect\v1_4 as RNCPHP;

$organization = new RNCPHP\Organization();
$organization->Name = 'Northstar Services Pty Ltd';
$organization->save();

echo 'Created organization ID: ' . $organization->ID . PHP_EOL;
