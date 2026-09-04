<?php

use RightNow\Connect\v1_4 as RNCPHP;

$metadata = RNCPHP\Organization::getMetadata();
$relations = RNCPHP\Organization::getRelations();

var_dump($metadata);
var_dump($relations);

// For a reusable JSON-oriented dumper see tools/dump-object-metadata.php.
