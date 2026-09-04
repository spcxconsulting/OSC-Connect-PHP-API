# Organization

`RightNow\Connect\v1_4\Organization` represents a business, company, agency or customer organisation in Oracle B2C Service Connect PHP.

This is an independent SPCX reference. API identifiers are used for interoperability; descriptions and examples are independently written.

Official Oracle references:

- Connect PHP Organization: https://documentation.custhelp.com/euf/assets/devdocs/unversioned/Connect_PHP/Content/Connect%20for%20PHP%20API/RightNow%20Connect%20Object%20Model/Core/Organization.html
- REST Organizations: https://docs.oracle.com/en/cloud/saas/b2c-service/cxsvc/api-organizations.html

## Namespace

```php
use RightNow\Connect\v1_4 as RNCPHP;
```

## Top-level properties

| Property | Type | Access | SPCX notes |
| --- | --- | --- | --- |
| `ID` | integer | read-only after create | Database identifier. |
| `LookupName` | string | read-only | Lookup/display value. |
| `CreatedTime` | integer timestamp | read-only | Creation timestamp in the legacy PHP surface. |
| `UpdatedTime` | integer timestamp | read-only | Last-update timestamp in the legacy PHP surface. |
| `Addresses` | `TypedAddressArray` | read/write | Typed organisation addresses. |
| `Banner` | `Banner` | read/write | Banner/attention information. |
| `CRMModules` | `CRMModules` | read/write | Marketing, Sales and Service applicability flags. |
| `CustomFields` | `OrganizationCustomFields` | read/write | Site-generated custom-field tree. |
| `FileAttachments` | `FileAttachmentCommonArray` | read/write | Files attached to the organisation. |
| `Industry` | `NamedIDOptList` | read/write | Industry/menu relationship. |
| `Login` | string | read/write | Customer-portal authentication login where used. |
| `Name` | string | read/write | Organisation/business name; required by current REST create. |
| `NameFurigana` | string | conditional | Available where Japanese interface support is enabled. |
| `NewPassword` | string | write-only | Sets the organisation authentication password. |
| `Notes` | `NoteArray` | read/write | Notes associated with the organisation. |
| `NumberOfEmployees` | integer | read/write | Employee count. |
| `OrganizationHierarchy` | `OrganizationArray` | read-only | Derived parent hierarchy. |
| `Parent` | `Organization` | read/write | Direct parent organisation. |
| `SalesSettings` | `OrganizationSalesSettings` | mixed | Sales ownership/revenue information. |
| `ServiceSettings` | `OrganizationServiceSettings` | mixed | SLA information. |
| `Source` | `NamedIDHierarchyOptList` | read-only | Platform creation-source hierarchy. |

Current REST v1.4 also exposes `externalReference` and `supersededBy`. They are tracked in [`comparisons/organization.json`](../comparisons/organization.json) as REST-present but current Connect PHP availability unverified because they were absent from the older public RNCPHP stub set used for cross-checking.

## Important nested structures

### `TypedAddress`

- `AddressType`
- `Street`
- `City`
- `StateOrProvince`
- `PostalCode`
- `Country`

The `AddressType` is the list key. Do not assume a numeric address-type ID is portable between customer sites.

### `CRMModules`

- `Marketing`
- `Sales`
- `Service`

### `OrganizationSalesSettings`

- `AcquiredDate` — read-only in the legacy PHP surface.
- `SalesAccount` — assigned sales representative.
- `TotalRevenue` — `MonetaryValue`.

### `MonetaryValue`

- `Currency`
- `ExchangeRate`
- `Value`

The old PHP stub and modern REST binding describe monetary representation differently. Treat direct cross-binding numeric conversion as version-sensitive and verify before porting financial calculations.

### `OrganizationServiceSettings`

- `SLAInstances`

### `SLAInstance`

Important fields include:

- `ActiveDate`
- `ExpireDate`
- `NameOfSLA`
- `RemainingFromChat`
- `RemainingFromCSR`
- `RemainingFromEmail`
- `RemainingFromWeb`
- `RemainingTotal`
- `StateOfSLA`

SLA instances are read-only in the older Connect PHP surface.

### `Banner`

- `ImportanceFlag`
- `Text`
- `UpdatedByAccount`
- `UpdatedTime`

### `Note`

- `Channel`
- `CreatedTime`
- `ID`
- `Text`
- `UpdatedTime`

Modern REST note payloads additionally expose creator/updater account references; see the REST comparison for binding differences.

### `FileAttachmentCommon`

Common fields include:

- `ContentType`
- `CreatedTime`
- `FileName`
- `ID`
- `Size`
- `UpdatedTime`
- `URL`
- `Description`
- `Name`

The Connect PHP attachment class also exposes file helper methods such as `setFile()` and `makeFile()`.

## Standard RNObject methods

| Method | Typical use |
| --- | --- |
| `Organization::fetch(...)` | Fetch one organisation. |
| `Organization::find(...)` | Find matching organisations. |
| `Organization::first(...)` | Return the first matching organisation. |
| `$organization->save(...)` | Create or update. |
| `$organization->destroy(...)` | Delete where appropriate. |
| `Organization::getMetadata()` | Inspect current site/version metadata. |
| `Organization::getRelations()` | Inspect relationships. |

## Processing constants

Primary RNObjects expose processing options for normal processing and suppression of rules and/or external events. Suppression changes business behaviour and should only be used deliberately.

## Hierarchy pattern

Set the direct parent:

```php
$organization->Parent = RNCPHP\Organization::fetch($parentId);
```

Do not try to construct `OrganizationHierarchy` manually; the hierarchy is derived from the parent relationship in the legacy surface.

## Examples

See [`examples/organizations/README.md`](../examples/organizations/README.md) for SPCX-written examples covering:

- minimal and comprehensive creation
- typed addresses
- hierarchy/parent relationships
- notes
- sales settings
- file attachments
- updates and lookup
- metadata inspection

## Custom fields

`OrganizationCustomFields` is generated from the target site's configuration. Generic code should show the pattern but must not pretend custom packages/field names are universal.

## Connect PHP vs REST

See [`comparisons/organization.json`](../comparisons/organization.json). The comparison keeps the two bindings separate and records field, relationship, hierarchy, timestamp and attachment differences.

## Version qualification

The core RNCPHP surface here is reconstructed from a public v1_1 generated stub and written using the `v1_4` namespace style used elsewhere in this repository. Current REST v1.4 is used as a second CCOM reference. Anything that cannot be confidently reconciled is marked as needing current Connect PHP verification rather than guessed.
