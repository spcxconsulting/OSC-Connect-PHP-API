<?php

use RightNow\Connect\v1_4 as RNCPHP;

$answerId = 12345;
$productIds = [100, 101];
$categoryIds = [200, 201];

$answer = RNCPHP\Answer::fetch($answerId);

$answer->Products = new RNCPHP\ServiceProductArray();
foreach ($productIds as $id) {
    $answer->Products[] = RNCPHP\ServiceProduct::fetch($id);
}

$answer->Categories = new RNCPHP\ServiceCategoryArray();
foreach ($categoryIds as $id) {
    $answer->Categories[] = RNCPHP\ServiceCategory::fetch($id);
}

$answer->save();

echo 'Updated answer taxonomy for ' . $answer->ID . PHP_EOL;
