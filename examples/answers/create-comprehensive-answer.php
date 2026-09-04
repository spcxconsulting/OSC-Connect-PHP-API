<?php

use RightNow\Connect\v1_4 as RNCPHP;

const ANSWER_TYPE_ID = 1;
const LANGUAGE_ID = 1;
const ACCESS_LEVEL_ID = 1;
const STAFF_GROUP_ID = 10;
const PRODUCT_ID = 100;
const CATEGORY_ID = 200;

$answer = new RNCPHP\Answer();

$answer->AnswerType = new RNCPHP\NamedIDOptList();
$answer->AnswerType->ID = ANSWER_TYPE_ID;

$answer->Language = new RNCPHP\NamedIDOptList();
$answer->Language->ID = LANGUAGE_ID;

$answer->Summary = 'Customer portal sign-in troubleshooting';
$answer->Question = 'What steps should a customer try when they cannot sign in?';
$answer->Solution = implode("\n\n", [
    '1. Confirm the email address used for the account.',
    '2. Use the password-reset flow and allow time for the message to arrive.',
    '3. Check spam or junk folders.',
    '4. If the reset still fails, ask support to review the contact login and account status.'
]);
$answer->Keywords = 'portal login password reset access customer';

$answer->AccessLevels = new RNCPHP\AccessLevelArray();
$level = new RNCPHP\AccessLevel();
$level->ID = ACCESS_LEVEL_ID;
$answer->AccessLevels[] = $level;

$answer->AssignedTo = new RNCPHP\GroupAccount();
$answer->AssignedTo->StaffGroup = new RNCPHP\NamedIDOptList();
$answer->AssignedTo->StaffGroup->ID = STAFF_GROUP_ID;

$answer->Products = new RNCPHP\ServiceProductArray();
$answer->Products[] = RNCPHP\ServiceProduct::fetch(PRODUCT_ID);

$answer->Categories = new RNCPHP\ServiceCategoryArray();
$answer->Categories[] = RNCPHP\ServiceCategory::fetch(CATEGORY_ID);

$answer->PublishOnDate = time() + (7 * 86400);
$answer->ExpiresDate = time() + (365 * 86400);

$answer->save();

echo 'Created answer ' . $answer->ID . ' (' . $answer->Name . ')' . PHP_EOL;
