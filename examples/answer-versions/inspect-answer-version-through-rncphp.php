<?php

use RightNow\Connect\v1_4 as RNCPHP;

$answerId = 123;
$answer = RNCPHP\Answer::fetch($answerId);

if (!$answer) {
    throw new RuntimeException('Answer not found.');
}

echo 'Answer reference: ' . ($answer->Name ?? '') . PHP_EOL;
echo 'Summary: ' . ($answer->Summary ?? '') . PHP_EOL;
echo 'PublishOnDate: ' . ($answer->PublishOnDate ?? '') . PHP_EOL;
echo 'ExpiresDate: ' . ($answer->ExpiresDate ?? '') . PHP_EOL;

if (!empty($answer->SiblingAnswers)) {
    echo "Sibling answers:\n";
    foreach ($answer->SiblingAnswers as $sibling) {
        printf("- %s | %s\n", $sibling->ID ?? '?', $sibling->Summary ?? '');
    }
}

// Important: this example intentionally does NOT instantiate RNCPHP\AnswerVersion.
// The older public RNCPHP surface used by this repository verifies version-adjacent
// behaviour on Answer, but does not provide enough evidence to assert that a
// first-class AnswerVersion class exists in the current Connect PHP binding.
