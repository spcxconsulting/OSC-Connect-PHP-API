<?php

use RightNow\Connect\v1_4 as RNCPHP;

$answerId = 12345;
$answer = RNCPHP\Answer::fetch($answerId);

if (!$answer->Notes) {
    $answer->Notes = new RNCPHP\NoteArray();
}

$note = new RNCPHP\Note();
$note->Text = 'Reviewed by the knowledge team. Login troubleshooting steps were updated.';
$answer->Notes[] = $note;

$answer->save();

echo 'Added note to answer ' . $answer->ID . PHP_EOL;
