<?php

use RightNow\Connect\v1_4 as RNCPHP;

$answerId = 12345;
$staffGroupId = 10; // Verify on the target site.

$answer = RNCPHP\Answer::fetch($answerId);
$answer->AssignedTo = new RNCPHP\GroupAccount();
$answer->AssignedTo->StaffGroup = new RNCPHP\NamedIDOptList();
$answer->AssignedTo->StaffGroup->ID = $staffGroupId;
$answer->save();

echo 'Assigned answer ' . $answer->ID . PHP_EOL;
