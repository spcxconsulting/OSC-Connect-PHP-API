# AnswerVersion

`AnswerVersion` is a first-class Oracle B2C Service REST v1.4 resource representing a versioned instance of a knowledge answer.

This page is an independent SPCX reference. API identifiers are retained for interoperability; descriptions and examples are written by SPCX rather than copied from Oracle documentation.

## Important Connect PHP distinction

The older public RNCPHP class surface used by this repository does **not** provide enough evidence to assert a first-class `RightNow\Connect\v1_4\AnswerVersion` class.

Do not invent `RNCPHP\AnswerVersion` in application code just because REST exposes `/answerVersions`.

The verified older RNCPHP model keeps version-adjacent behaviour on `RNCPHP\Answer`, including properties such as `AssignedSibling`, `SiblingAnswers`, `PublishOnDate`, `ExpiresDate`, `Question`, `Solution`, `StatusWithType` and `Links`.

This is a genuine binding/version boundary and is intentionally preserved in this repository.

## REST resource

```text
/services/rest/connect/v1.4/answerVersions
```

Current REST operations:

| Operation | Method / path |
| --- | --- |
| List versions | `GET /answerVersions` |
| Read one version | `GET /answerVersions/{id}` |
| Update a version | `PATCH /answerVersions/{id}` |
| Delete a version | `DELETE /answerVersions/{id}` |

Oracle does not expose a `POST /answerVersions` create operation in the current v1.4 endpoint catalogue.

## Properties

The current REST v1.4 resource exposes these top-level fields:

| Property | SPCX type/role |
| --- | --- |
| `accessLevels` | Named-ID list controlling visibility. |
| `adminLastAccessTime` | Read-only administrator access time. |
| `answer` | Reference back to the parent Answer resource. |
| `answerType` | Named-ID answer type. |
| `assignedTo` | Account/staff-group assignment. |
| `banner` | Banner/attention structure. |
| `categories` | Service-category references. |
| `commonAttachments` | Attachments shared by sibling answers. |
| `createdTime` | Read-only creation time. |
| `expiresDate` | Review/expiry date. |
| `fileAttachments` | Attachments belonging to the version. |
| `guidedAssistance` | Named-ID guided-assistance setting. |
| `id` | Unique AnswerVersion identifier. |
| `keywords` | Search keywords. |
| `language` | Named-ID language. |
| `lastAccessTime` | Read-only last access time. |
| `lastNotificationTime` | Read-only notification timestamp. |
| `lookupName` | Lookup/display identifier. |
| `name` | Read-only answer reference-number string. |
| `nextNotificationTime` | Next notification time. |
| `notes` | Notes/discussion entries. |
| `originalReferenceNumber` | Originating incident reference when applicable. |
| `positionInList` | Search/list-position setting. |
| `products` | Service-product references. |
| `publishOnDate` | Scheduled publishing date. |
| `question` | Question/description content. |
| `relatedAnswers` | Related-answer relationship objects. |
| `solution` | Answer/solution content. |
| `specialResponse` | Special-response content. |
| `statusWithType` | Status plus status-type structure. |
| `summary` | Short title/summary. |
| `updatedByAccount` | Read-only account reference. |
| `updatedTime` | Read-only update time. |
| `uRL` | URL target for URL-type answers. |
| `versionDetail` | Draft/publish/unpublish lifecycle details. |

## Important nested structures

### `versionDetail`

- `draftNote`
- `draftTime`
- `publishedTime`
- `publishNote`
- `state`
- `unpublishedTime`

This is one of the clearest differences from the older RNCPHP `Answer` surface: REST gives version lifecycle state its own explicit structure.

### `relatedAnswers`

- `learnedStrength`
- `manualStrength`
- `similarityStrength`
- `toAnswer`

Older RNCPHP uses `Answer->Links` / `AnswerLink` for a related concept, but the models should not be assumed to be identical.

### `assignedTo`

- `account`
- `staffGroup`

### `statusWithType`

- `status`
- `statusType`

### `notes`

Current REST notes include fields such as channel, account audit references, timestamps, ID and text.

## Answer versus AnswerVersion

A useful mental model for the current REST binding is:

```text
Answer
  └── answerVersion -> AnswerVersion
                         ├── content for this version
                         ├── versionDetail
                         ├── publishing state
                         ├── taxonomy/access settings
                         └── relationship back to Answer
```

The older verified RNCPHP surface is closer to:

```text
RNCPHP\Answer
  ├── Question / Solution / Summary
  ├── PublishOnDate / ExpiresDate
  ├── AssignedSibling
  ├── SiblingAnswers
  └── Links
```

That difference is why this repository does not flatten the two APIs into a single object model.

## Examples

See [`examples/answer-versions/`](../examples/answer-versions/) for original SPCX examples covering:

- REST get
- REST list/query
- REST update
- REST delete
- the closest verified older RNCPHP Answer version/sibling pattern

## Machine-readable references

- [`catalog/answer-version.json`](../catalog/answer-version.json)
- [`comparisons/answer-version.json`](../comparisons/answer-version.json)

## Official references

- Oracle REST Answer Versions: https://docs.oracle.com/en/cloud/saas/b2c-service/cxsvc/api-answer-versions.html
- Oracle Connect PHP API reference: https://documentation.custhelp.com/euf/assets/devdocs/unversioned/Connect_PHP/Default.htm

Oracle remains authoritative for the currently supported platform surface. If a current Connect PHP class reference later confirms a direct AnswerVersion class, this repository should update the comparison rather than infer it from REST naming.
