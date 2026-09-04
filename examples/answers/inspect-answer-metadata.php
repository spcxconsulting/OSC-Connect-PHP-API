<?php

use RightNow\Connect\v1_4 as RNCPHP;

$output = [
    'metadata' => RNCPHP\Answer::getMetadata(),
    'relations' => RNCPHP\Answer::getRelations(),
];

print_r($output);
