<?php

use RightNow\Connect\v1_4 as RNCPHP;

$incidentId = 67890;
$entryTypeId = 1; // Replace with the correct thread entry type for the target site.

$incident = RNCPHP\Incident::fetch($incidentId);

if (!$incident->Threads) {
    $incident->Threads = new RNCPHP\ThreadArray();
}

$thread = new RNCPHP\Thread();
$thread->EntryType = new RNCPHP\NamedIDOptList();
$thread->EntryType->ID = $entryTypeId;
$thread->Text = 'SPCX example note: identity checks completed and access can now be restored.';

$incident->Threads[] = $thread;
$incident->save();

echo "Thread appended\n";

// Legacy Connect PHP documents Incident thread history as append-only.
// Add a new entry instead of attempting to remove a historical thread.
