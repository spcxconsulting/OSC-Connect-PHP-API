<?php

use RightNow\Connect\v1_4 as RNCPHP;

const ANSWER_TYPE_ID = 1; // Replace with a verified target-site value.
const LANGUAGE_ID = 1;    // Replace with a verified target-site value.

$answer = new RNCPHP\Answer();

$answer->AnswerType = new RNCPHP\NamedIDOptList();
$answer->AnswerType->ID = ANSWER_TYPE_ID;

$answer->Language = new RNCPHP\NamedIDOptList();
$answer->Language->ID = LANGUAGE_ID;

$answer->Summary = 'How do I reset access to the customer portal?';
$answer->Question = 'What should I do if I can no longer sign in to the customer portal?';
$answer->Solution = 'Use the password-reset option first. If access still fails, contact the service team so the account can be checked.';

$answer->save();

echo 'Created answer ID: ' . $answer->ID . PHP_EOL;
