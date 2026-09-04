# Getting started with Connect PHP

Connect PHP lets PHP code running within supported Oracle B2C Service contexts work with records through the Connect Common Object Model.

A typical script begins by selecting the Connect API version:

```php
<?php

use RightNow\Connect\v1_4 as RNCPHP;
```

The version is part of the namespace. In Custom Process Models, keep the Connect namespace version consistent with the version declared for the process.

## Common patterns

### Fetch a record by ID

```php
$contact = RNCPHP\Contact::fetch(12345);

echo $contact->ID;
```

### Run an ROQL tabular query

```php
$result = RNCPHP\ROQL::query(
    "SELECT ID, Subject FROM Incident WHERE ID > 0 ORDER BY ID DESC LIMIT 10"
)->next();

while ($row = $result->next()) {
    echo $row['ID'] . ': ' . $row['Subject'] . PHP_EOL;
}
```

### Save a new object

```php
$organization = new RNCPHP\Organization();
$organization->Name = 'Northstar Services';
$organization->save();

echo $organization->ID;
```

These examples are intentionally small. Required fields, permissions, business rules and custom processes differ between sites, so production code should validate the target site's requirements.
