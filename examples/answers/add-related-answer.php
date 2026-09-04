<?php

use RightNow\Connect\v1_4 as RNCPHP;

$answerId = 12345;
$relatedAnswerId = 12346;

$answer = RNCPHP\Answer::fetch($answerId);

if (!$answer->Links) {
    $answer->Links = new RNCPHP\AnswerLinkArray();
}

$link = new RNCPHP\AnswerLink();
$link->ToAnswer = RNCPHP\Answer::fetch($relatedAnswerId);
$link->ManualLinkStrength = 50;
$answer->Links[] = $link;

$answer->save();

echo 'Linked answer ' . $relatedAnswerId . ' to ' . $answerId . PHP_EOL;
