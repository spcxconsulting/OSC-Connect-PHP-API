<?php

use RightNow\Connect\v1_4 as RNCPHP;

/**
 * Run inside an Oracle B2C Service PHP environment.
 *
 * This is intentionally small so the output can be compared with
 * catalog/incident.json when real site access is available in future.
 */

$metadata = RNCPHP\Incident::getMetadata();
$relations = RNCPHP\Incident::getRelations();

var_dump($metadata);
var_dump($relations);
