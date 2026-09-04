<?php

use RightNow\Connect\v1_4 as RNCPHP;

$organizationId = 1201;

$organization = RNCPHP\Organization::fetch($organizationId);
if (!$organization) {
    throw new RuntimeException('Organization not found.');
}

$note = new RNCPHP\Note();
$note->Text = 'Follow-up note added by an SPCX integration example.';

$organization->Notes ??= new RNCPHP\NoteArray();
$organization->Notes[] = $note;
$organization->save();

echo 'Note added.' . PHP_EOL;
