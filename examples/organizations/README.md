# Organization examples

These examples are original SPCX Consulting examples for `RightNow\Connect\v1_4\Organization`.

They use fictional data and avoid assuming customer-specific numeric IDs. Replace placeholders with values verified on the target Oracle B2C Service site.

## Examples

- `create-organization.php` — minimal create.
- `create-comprehensive-organization.php` — name, CRM modules, addresses, industry, parent, notes, employee count and sales assignment.
- `find-organization-by-name.php` — ROQL lookup pattern.
- `update-organization.php` — fetch and update common writable fields.
- `set-parent-organization.php` — direct parent/hierarchy pattern.
- `add-address.php` — append a typed address.
- `add-note.php` — append an organisation note.
- `set-sales-settings.php` — assign the sales owner and demonstrate revenue structure carefully.
- `add-file-attachment.php` — attach a local file using Connect PHP's attachment helper.
- `inspect-organization-metadata.php` — metadata/relations inspection.

## Important cautions

- `OrganizationCustomFields` is site-specific.
- `AddressType`, `Industry`, currencies and similar NamedID values must be checked on the target site.
- `OrganizationHierarchy` is derived; set `Parent` instead.
- `AcquiredDate` and older-surface `SLAInstances` are read-only.
- Do not assume REST monetary JSON values can be ported directly to legacy RNCPHP `MonetaryValue` calculations without checking version semantics.
