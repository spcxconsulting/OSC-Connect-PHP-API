<?php

use RightNow\Connect\v1_4 as RNCPHP;

$answerId = 12345;
$answer = RNCPHP\Answer::fetch($answerId);

$answer->Summary = 'Customer portal sign-in and password reset';
$answer->Question = 'How can a customer recover access to the customer portal?';
$answer->Solution = 'Confirm the account email, use the password-reset flow, check junk mail, then contact support if the reset does not resolve access.';
$answer->Keywords = 'portal login password reset account access';

$answer->save();

echo 'Updated answer ' . $answer->ID . PHP_EOL;
