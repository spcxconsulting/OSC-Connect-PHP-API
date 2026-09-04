# Answer

`RightNow\Connect\v1_4\Answer` represents a knowledge-base answer in Oracle B2C Service Connect PHP.

This page is an independent SPCX reference. API identifiers are retained for interoperability; descriptions and examples are independently written rather than copied from Oracle documentation.

Official Connect PHP reference:

https://documentation.custhelp.com/euf/assets/devdocs/unversioned/Connect_PHP/Content/Connect%20for%20PHP%20API/RightNow%20Connect%20Object%20Model/Core/Answer.html

Current REST reference:

https://docs.oracle.com/en/cloud/saas/b2c-service/cxsvc/api-answers.html

## Namespace

```php
use RightNow\Connect\v1_4 as RNCPHP;
```

## Version note

The property surface documented here is reconstructed from a public generated Connect PHP v1_1 class-stub set and cross-checked against Oracle REST v1.4. The examples use the v1_4 namespace style.

Where current REST exposes concepts that are not present in the older RNCPHP surface, this repository marks them as **current Connect PHP verification required** rather than claiming they are REST-only.

## Top-level properties

| Property | Type | Access | SPCX notes |
| --- | --- | --- | --- |
| `ID` | integer | read-only after creation | Internal answer identifier. |
| `LookupName` | string | read-only | Lookup/display value supplied by the object model. |
| `CreatedTime` | integer timestamp | read-only | Record creation time in the older PHP binding. |
| `UpdatedTime` | integer timestamp | read-only | Last update time in the older PHP binding. |
| `AccessLevels` | `AccessLevelArray` | read/write list | Controls which end users can access the answer. |
| `AdminLastAccessTime` | integer timestamp | read-only | Last administrator access time. |
| `AnswerType` | `NamedIDOptList` | read/write | Controls the answer storage/content type. |
| `AssignedSibling` | `Answer` | read/write relationship | Associates the answer with a sibling answer. |
| `AssignedTo` | `GroupAccount` | read/write | Staff account or group ownership. |
| `Banner` | `Banner` | read/write | Attention/banner information. |
| `Categories` | `ServiceCategoryArray` | read/write list | Knowledge taxonomy categories. |
| `Comments` | string | read/write | Legacy RNCPHP comments field; not present in the current REST Answer schema inspected here. |
| `CommonAttachments` | `FileAttachmentSharedArray` | read/write list | Attachments shared by sibling answers. |
| `CommonComments` | string | read/write | Legacy sibling-common comments field; not present in the current REST Answer schema inspected here. |
| `CustomFields` | `AnswerCustomFields` | read/write | Site-specific custom fields. |
| `ExpiresDate` | integer timestamp | read/write | Scheduled expiry/review date. |
| `FileAttachments` | `FileAttachmentAnswerArray` | read/write list | Attachments specific to the answer. |
| `Keywords` | string | read/write | Space-separated search/indexing keywords. |
| `Language` | `NamedIDOptList` | read/write | Language of the answer content. |
| `LastAccessTime` | integer timestamp | read-only | Last general access time. |
| `LastNotificationTime` | integer timestamp | read-only | Last notification generation time. |
| `Links` | `AnswerLinkArray` | read/write list | Legacy RNCPHP related-answer links. Current REST calls the analogous surface `relatedAnswers`. |
| `Name` | string | read-only | Human-facing string form/reference of the answer ID. |
| `NextNotificationTime` | integer timestamp | read/write | Earliest upcoming notification time. |
| `Notes` | `NoteArray` | read/write list | Internal discussion/note entries. |
| `OriginalReferenceNumber` | string | read-only | Incident reference that originally proposed/generated the answer where applicable. |
| `PositionInList` | `NamedIDOptList` | read/write | Search ranking/position control. |
| `Products` | `ServiceProductArray` | read/write list | Knowledge taxonomy products. |
| `PublishOnDate` | integer timestamp | read/write | Scheduled publication date. |
| `Question` | string | read/write | Question/description content. |
| `SiblingAnswers` | `AnswerArray` | read-only | Related sibling answer set. |
| `Solution` | string | read/write | Main solution/content field. |
| `StatusWithType` | `StatusWithType` | read/write | Answer status and its status type. |
| `Summary` | string | read/write | Short title/summary. |
| `UpdatedByAccount` | `Account` | read-only | Staff account that last changed the answer. |
| `URL` | string | read/write for URL answer types | Target URL when the answer type stores/returns a URL. |

## Current REST fields not proven in the older RNCPHP surface

Current REST v1.4 also exposes:

- `answerVersion`
- `guidedAssistance`
- `specialResponse`
- `versionDetail`

These are tracked in [`catalog/answer.json`](../catalog/answer.json) and [`comparisons/answer.json`](../comparisons/answer.json) as current REST concepts that still need independent current Connect PHP verification.

## Important nested structures

### `AccessLevel`

- `ID`
- `LookupName`

Access levels are configuration-sensitive. Do not assume the same IDs across sites.

### `GroupAccount`

- `Account`
- `StaffGroup`

Use one assignment intent at a time. Assigning an account and a staff group simultaneously can produce ambiguous code.

### `AnswerLink`

- `LearnedLinkStrength`
- `ManualLinkStrength`
- `ToAnswer`

Current REST exposes `relatedAnswers` rather than the legacy `Links` property name and includes additional relationship metadata such as similarity strength.

### `FileAttachmentAnswer`

Important fields include:

- `ContentType`
- `FileName`
- `Description`
- `Name`
- `Disabled`
- `Indexed`
- `Private`
- `ID`, `Size`, `CreatedTime`, `UpdatedTime`, `URL` as persistence/readback metadata

The PHP attachment object exposes file helper methods such as `setFile()` and `makeFile()`.

### `FileAttachmentShared`

Shared sibling attachments include:

- standard file metadata
- `Disabled`
- language-specific `Names`
- `Private`

### `StatusWithType`

- `Status`
- `StatusType`

### `Banner`

- `ImportanceFlag`
- `Text`
- later/current bindings may also expose update metadata

## Knowledge-specific behaviour

### Required fields

Current REST v1.4 explicitly requires `answerType`, `language`, and `summary` when creating an answer. Treat those as a useful minimum checklist when writing portable examples, while remembering Connect PHP business rules may differ by site/version.

### Content fields

`Question`, `Solution`, and current REST's `specialResponse` are different knowledge-content concepts. Do not assume every answer type uses all of them.

### Products and categories

Products and categories are important for knowledge organisation, search refinement and customer-portal visibility. They are relationships to configured hierarchies, so examples should use verified target-site records rather than invented universal IDs.

### Siblings and versions

Sibling answers and answer versions should be treated as distinct concepts. Current REST exposes a separate `answerVersions` resource; the older RNCPHP Answer surface used sibling-related properties but did not expose the same REST version model directly.

### Search ranking

`PositionInList` is a ranking/position control. It is a configured named-ID value, not a generic integer rank that should be hard-coded without checking the target environment.

## Standard primary-object methods

| Method | Typical use |
| --- | --- |
| `Answer::fetch(...)` | Fetch one answer. |
| `Answer::find(...)` | Find matching answers. |
| `Answer::first(...)` | Return the first matching answer. |
| `$answer->save(...)` | Create or update an answer. |
| `$answer->destroy(...)` | Delete an answer where appropriate. |
| `Answer::getMetadata()` | Inspect the object model available to the running site/version. |
| `Answer::getRelations()` | Inspect object relationships. |

## Processing constants

The RNObject surface includes processing options corresponding to normal processing, suppressing external events, suppressing rules, and suppressing both. These flags can bypass expected business behaviour and should only be used intentionally.

## Practical examples

See [`examples/answers/README.md`](../examples/answers/README.md) for original SPCX examples covering:

- minimal creation
- comprehensive creation pattern
- ROQL lookup
- updating answer content
- staff/group assignment
- products and categories
- publish and expiry scheduling
- related answers
- notes
- file attachments
- metadata inspection

## Custom fields

`AnswerCustomFields` is generated from the target site's configuration. There is no portable universal field list.

## Connect PHP vs REST

See [`comparisons/answer.json`](../comparisons/answer.json). Important differences currently tracked include:

- PHP object persistence vs REST HTTP verbs
- integer timestamp vs REST date/time-string representation
- `Links` vs `relatedAnswers`
- legacy `Comments` / `CommonComments`
- the REST `answerVersion` and separate `answerVersions` resource
- REST-only/current-version-unverified concepts such as guided assistance and version detail
- attachment representation differences

Oracle remains the authoritative source for supported behaviour on a particular product version.
