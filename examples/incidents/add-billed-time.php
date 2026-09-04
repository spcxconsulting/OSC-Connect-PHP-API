<?php

use RightNow\Connect\v1_4 as RNCPHP;

$incidentId = 67890;
$accountId = 42;
$billableTaskId = 3; // Replace with a verified site value.

$incident = RNCPHP\Incident::fetch($incidentId);

if (!$incident->BilledMinutes) {
    $incident->BilledMinutes = new RNCPHP\TimeBilledArray();
}

$time = new RNCPHP\TimeBilled();
$time->Account = RNCPHP\Account::fetch($accountId);
$time->BillableTask = new RNCPHP\NamedIDLabel();
$time->BillableTask->ID = $billableTaskId;
$time->BillTime = time();
$time->Minutes = 15;
$time->Comment = 'SPCX example: investigated portal authentication logs.';

$incident->BilledMinutes[] = $time;
$incident->save();

echo "Billed time added\n";
