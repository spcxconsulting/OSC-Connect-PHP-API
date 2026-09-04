<?php

use RightNow\Connect\v1_4 as RNCPHP;

$answerId = 12345;
$answer = RNCPHP\Answer::fetch($answerId);

$answer->PublishOnDate = strtotime('2026-10-01 09:00:00 Australia/Adelaide');
$answer->ExpiresDate = strtotime('2027-10-01 09:00:00 Australia/Adelaide');

$answer->save();

echo 'Scheduled publication lifecycle for answer ' . $answer->ID . PHP_EOL;
