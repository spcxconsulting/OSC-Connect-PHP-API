<?php

use RightNow\Connect\v1_4 as RNCPHP;

/**
 * Comprehensive SPCX Incident creation example.
 *
 * All IDs are placeholders. Replace them with values that exist on the target
 * B2C Service site. The example intentionally uses fictional data.
 */

$primaryContactId = 12345;
$organizationId   = 250;
$assignedAccountId = 42;
$queueId          = 7;
$severityId       = 2;
$productId        = 100;
$categoryId       = 200;
$dispositionId    = 300;
$threadEntryTypeId = 1;

$incident = new RNCPHP\Incident();
$incident->Subject = 'SPCX example: customer cannot access the service portal';

// Primary customer relationship.
$incident->PrimaryContact = RNCPHP\Contact::fetch($primaryContactId);

// Optional organisation relationship.
$incident->Organization = RNCPHP\Organization::fetch($organizationId);

// Assign to a specific staff account. GroupAccount can also represent a group.
$incident->AssignedTo = new RNCPHP\GroupAccount();
$incident->AssignedTo->Account = RNCPHP\Account::fetch($assignedAccountId);

// Queue and severity are site values. Verify IDs before using them.
$incident->Queue = new RNCPHP\NamedIDLabel();
$incident->Queue->ID = $queueId;

$incident->Severity = new RNCPHP\NamedIDOptList();
$incident->Severity->ID = $severityId;

// Service hierarchy relationships.
$incident->Product = RNCPHP\ServiceProduct::fetch($productId);
$incident->Category = RNCPHP\ServiceCategory::fetch($categoryId);
$incident->Disposition = RNCPHP\ServiceDisposition::fetch($dispositionId);

// Append the initial discussion entry.
$incident->Threads = new RNCPHP\ThreadArray();
$thread = new RNCPHP\Thread();
$thread->EntryType = new RNCPHP\NamedIDOptList();
$thread->EntryType->ID = $threadEntryTypeId;
$thread->Text = 'Customer reports that their portal login is rejected after a password reset.';
$incident->Threads[] = $thread;

// Site-specific custom fields would be set through IncidentCustomFields, e.g.
// $incident->CustomFields->c->SomeField = ...;
// Do not assume another site's custom field packages or field names.

$incident->save();

printf(
    "Created incident %s (ID %d)\n",
    $incident->ReferenceNumber ?? $incident->LookupName,
    $incident->ID
);
