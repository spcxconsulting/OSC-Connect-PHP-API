<?php

use RightNow\Connect\v1_4 as RNCPHP;

$email = 'alex.morgan@example.net';
$safeEmail = str_replace("'", "''", $email);

$rows = RNCPHP\ROQL::query(
    "SELECT ID, Name.First, Name.Last FROM Contact WHERE Emails.EmailList.Address = '{$safeEmail}'"
)->next();

while ($row = $rows->next()) {
    printf(
        "%d %s %s\n",
        $row['ID'],
        $row['Name.First'] ?? '',
        $row['Name.Last'] ?? ''
    );
}
