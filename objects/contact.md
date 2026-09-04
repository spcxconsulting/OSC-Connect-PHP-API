# Contact

`RightNow\Connect\v1_4\Contact` represents a customer/end-user record in Oracle B2C Service Connect PHP.

This page is an independent SPCX reference. Property names, class names and method names are API identifiers. Descriptions and examples here are written by SPCX and are not copied from Oracle documentation.

Official Oracle reference: https://documentation.custhelp.com/euf/assets/devdocs/unversioned/Connect_PHP/Content/Connect%20for%20PHP%20API/RightNow%20Connect%20Object%20Model/Core/Contact.html

## Namespace

```php
use RightNow\Connect\v1_4 as RNCPHP;
```

## Top-level properties

| Property | Type | Access | SPCX notes |
| --- | --- | --- | --- |
| `ID` | integer | read-only after persistence | Database identifier for the contact. |
| `LookupName` | string | read-only | Display/lookup value supplied by the object model. |
| `CreatedTime` | integer timestamp | read-only | Time the record was created. |
| `UpdatedTime` | integer timestamp | read-only | Time the record was last changed. |
| `Address` | `Address` | read/write | Primary address structure. |
| `Banner` | `Banner` | read/write | Banner/attention information shown with the record. |
| `ChannelUsernames` | `ChannelUsernameArray` | read/write | Usernames associated with communication channels. |
| `ContactType` | `NamedIDLabel` | read/write | Contact type menu value. |
| `CRMModules` | `CRMModules` | read/write | Flags describing applicable CRM modules. |
| `CustomFields` | `ContactCustomFields` | read/write | Site-specific contact custom fields. |
| `Disabled` | boolean | read/write | Disables the contact when set. |
| `Emails` | `EmailArray` | read/write | Typed email-address list. |
| `FileAttachments` | `FileAttachmentCommonArray` | read/write | Files attached to the contact. |
| `Login` | string | read/write | Authentication login where customer login is in use. |
| `MarketingSettings` | `ContactMarketingSettings` | read/write | Marketing and survey preferences/settings. |
| `Name` | `PersonName` | read/write | First and last name. |
| `NameFurigana` | `PersonName` | conditional | Phonetic name fields on sites/interfaces that support them. |
| `NewPassword` | string | write-only | Sets/changes the customer password. Never expect to read it back. |
| `Notes` | `NoteArray` | read/write | Notes associated with the contact. |
| `Organization` | `Organization` | read/write | Organisation relationship. |
| `Phones` | `PhoneArray` | read/write | Typed phone-number list. |
| `SalesSettings` | `ContactSalesSettings` | read/write | Sales-specific contact information. |
| `ServiceSettings` | `ContactServiceSettings` | mixed | Service-specific information and notification/SLA data. |
| `Source` | `NamedIDHierarchyOptList` | read-only | Creation-source hierarchy assigned by the platform. |
| `Title` | string | read/write | Social/professional title. |

## Important nested structures

### `PersonName`

- `First` - given/first name.
- `Last` - surname/last name.

### `Address`

- `Street`
- `City`
- `StateOrProvince` - named-ID relationship.
- `PostalCode`
- `Country` - named-ID relationship.

### `Email`

Each element in `Emails` is an `Email` object. Commonly used fields include:

- `Address`
- `AddressType` - typed list key, such as Primary or an alternate slot.

Do not assume numeric AddressType IDs are identical across every implementation. Prefer metadata or a verified site value when building reusable code.

### `Phone`

- `Number`
- `PhoneType` - typed list key.
- `RawNumber` - normalised numeric representation populated by the platform and treated as read-only.

### `CRMModules`

- `Marketing`
- `Sales`
- `Service`

### `ContactMarketingSettings`

- `ContactLists` - list membership deltas.
- `EmailFormat` - preferred marketing email format.
- `MarketingOptIn` - marketing consent flag.
- `MarketingOrganizationName`
- `MarketingOrganizationNameAlt`
- `SurveyOptIn` - feedback/survey consent flag.

### `ContactSalesSettings`

- `AcquiredDate` - read-only.
- `SalesAccount` - assigned sales account/staff relationship.

### `ContactServiceSettings`

- `AnswerNotifications`
- `CategoryNotifications`
- `ProductNotifications`
- `SLAInstances` - read-only SLA-instance list.

## Standard primary-object methods

| Method | Typical use |
| --- | --- |
| `Contact::fetch(...)` | Fetch one contact by identifier or supported lookup form. |
| `Contact::find(...)` | Find matching contacts. |
| `Contact::first(...)` | Return the first matching contact. |
| `$contact->save(...)` | Create or update the record. |
| `$contact->destroy(...)` | Delete the record. Use carefully because other objects may reference a contact. |
| `Contact::getMetadata()` | Inspect the property model exposed by the current Connect PHP version/site. |
| `Contact::getRelations()` | Inspect object relationships. |
| `$contact->ResetPassword()` | Invoke the contact password-reset behaviour where supported/configured. |

## Common processing constants

Primary RNObjects expose processing options including values corresponding to normal processing, suppressing external events, suppressing rules, or suppressing both. Do not use suppression flags casually: bypassing rules/events can change expected business behaviour.

## Practical patterns

See [`examples/contacts/README.md`](../examples/contacts/README.md) for original SPCX examples covering:

- complete contact creation
- safe lookup before create
- update patterns
- organisation relationship
- multiple emails and phones
- marketing settings
- custom-field placeholders
- metadata inspection

## Custom fields

`ContactCustomFields` is generated from the site's configuration. There is no universal list that can safely be hard-coded into a generic public repository.

Use metadata on the target site to discover the actual package/field tree, then document your site-specific fields separately.

## Version verification

This repository targets modern Connect PHP usage with `v1_4` examples. The Connect object model has evolved over time and customer-site configuration also affects available data. Run [`tools/dump-object-metadata.php`](../tools/dump-object-metadata.php) inside the target B2C Service environment before treating this repository as a substitute for site metadata.
