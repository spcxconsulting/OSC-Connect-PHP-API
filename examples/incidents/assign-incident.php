<?php

use RightNow\Connect\v1_4 as RNCPHP;

$incidentId = 67890;
$accountId = 42;

$incident = RNCPHP\Incident::fetch($incidentId);

$incident->AssignedTo = new RNCPHP\GroupAccount();
$incident->AssignedTo->Account = RNCPHP\Account::fetch($accountId);

$incident->save();

echo "Incident assigned to account {$accountId}\n";

// GroupAccount can also represent a staff group. Avoid setting an account and
// a contradictory staff group at the same time.
