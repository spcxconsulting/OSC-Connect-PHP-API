<?php

use RightNow\Connect\v1_4 as RNCPHP;

/**
 * Original SPCX example: inspect Contact metadata exposed by the target site.
 *
 * Metadata is a better source than guessed class/type information when building
 * reusable integrations across multiple Oracle B2C Service environments.
 */

$metadata = RNCPHP\Contact::getMetadata();

foreach ($metadata as $propertyName => $propertyMetadata) {
    echo $propertyName . PHP_EOL;

    foreach (['type_name', 'is_list', 'is_read_only', 'is_write_only', 'is_nullable'] as $field) {
        if (isset($propertyMetadata->{$field})) {
            $value = $propertyMetadata->{$field};
            if (is_bool($value)) {
                $value = $value ? 'true' : 'false';
            }
            echo '  ' . $field . ': ' . $value . PHP_EOL;
        }
    }
}
