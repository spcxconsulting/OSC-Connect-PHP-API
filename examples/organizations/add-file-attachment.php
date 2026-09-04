<?php

use RightNow\Connect\v1_4 as RNCPHP;

$organizationId = 1201;
$filePath = '/tmp/example-organization-note.txt';

$organization = RNCPHP\Organization::fetch($organizationId);
if (!$organization) {
    throw new RuntimeException('Organization not found.');
}
if (!is_file($filePath)) {
    throw new RuntimeException('Example file not found: ' . $filePath);
}

$attachment = new RNCPHP\FileAttachmentCommon();
$attachment->FileName = basename($filePath);
$attachment->Name = 'Integration note';
$attachment->Description = 'Example attachment added by SPCX Connect PHP sample code.';
$attachment->ContentType = 'text/plain';
$attachment->setFile($filePath);

$organization->FileAttachments ??= new RNCPHP\FileAttachmentCommonArray();
$organization->FileAttachments[] = $attachment;
$organization->save();

echo 'Attachment added.' . PHP_EOL;
