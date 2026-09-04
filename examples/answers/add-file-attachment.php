<?php

use RightNow\Connect\v1_4 as RNCPHP;

$answerId = 12345;
$filePath = '/tmp/customer-portal-login-guide.pdf';

$answer = RNCPHP\Answer::fetch($answerId);

if (!$answer->FileAttachments) {
    $answer->FileAttachments = new RNCPHP\FileAttachmentAnswerArray();
}

$attachment = new RNCPHP\FileAttachmentAnswer();
$attachment->FileName = basename($filePath);
$attachment->Name = 'Customer portal login guide';
$attachment->Description = 'Supplementary login and password-reset guide.';
$attachment->Private = false;
$attachment->Disabled = false;
$attachment->Indexed = true;
$attachment->setFile($filePath);

$answer->FileAttachments[] = $attachment;
$answer->save();

echo 'Attached file to answer ' . $answer->ID . PHP_EOL;
