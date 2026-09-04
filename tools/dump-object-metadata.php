<?php

use RightNow\Connect\v1_4 as RNCPHP;

/**
 * SPCX Connect PHP metadata dumper.
 *
 * Run inside an Oracle B2C Service PHP environment after Connect PHP has been
 * initialised. Pass an RNCPHP class name such as Contact, Incident or Organization.
 *
 * Example:
 *   php dump-object-metadata.php Contact
 */

$class = $argv[1] ?? 'Contact';

if (!preg_match('/^[A-Za-z][A-Za-z0-9_]*$/', $class)) {
    throw new InvalidArgumentException('Invalid Connect PHP class name.');
}

$fqcn = 'RightNow\\Connect\\v1_4\\' . $class;

if (!class_exists($fqcn)) {
    throw new RuntimeException('Connect PHP class not available: ' . $fqcn);
}

if (!method_exists($fqcn, 'getMetadata')) {
    throw new RuntimeException($fqcn . ' does not expose getMetadata().');
}

$metadata = $fqcn::getMetadata();
$relations = method_exists($fqcn, 'getRelations') ? $fqcn::getRelations() : null;

function normaliseMetadataValue($value, int $depth = 0) {
    if ($depth > 8) {
        return '[depth-limit]';
    }

    if (is_null($value) || is_scalar($value)) {
        return $value;
    }

    if (is_array($value) || $value instanceof Traversable) {
        $result = [];
        foreach ($value as $key => $item) {
            $result[(string)$key] = normaliseMetadataValue($item, $depth + 1);
        }
        return $result;
    }

    if (is_object($value)) {
        $result = ['__class' => get_class($value)];
        foreach (get_object_vars($value) as $key => $item) {
            $result[$key] = normaliseMetadataValue($item, $depth + 1);
        }
        return $result;
    }

    return (string)$value;
}

$output = [
    'class' => $fqcn,
    'generatedAt' => gmdate('c'),
    'metadata' => normaliseMetadataValue($metadata),
    'relations' => normaliseMetadataValue($relations),
];

echo json_encode($output, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL;
