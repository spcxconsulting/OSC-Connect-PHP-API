# OSC Connect PHP API reference

Independent SPCX Consulting reference material and original code examples for Oracle B2C Service Connect PHP.

This repository is designed to be useful for developers and for retrieval into tools such as Ask.SPCX without mirroring Oracle's documentation text. API identifiers such as class names, method names and property names are catalogued so code can interoperate with the platform; descriptions and examples are independently written.

## Current structure

- `objects/` — human-readable object references.
- `catalog/` — machine-readable object/property manifests and coverage status.
- `examples/` — original PHP examples organised by object/use case.
- `comparisons/` — machine-readable Connect PHP vs REST differences.
- `guides/` — practical Connect PHP guidance.
- `tools/` — metadata/introspection helpers.

## Comprehensive object coverage

The current baseline contains 41 CCOM resources. Five are now expanded and 36 remain. Not every remaining entry is a full CRUD-style RNCPHP object; some are helper, reference, result or binding-specific resources.

The repository is moving toward a consistent per-object format containing:

- every documented top-level property/element
- scalar or Connect PHP type
- read/write behaviour where known
- nested object/list types
- relevant methods/constants
- original SPCX examples using fictional data
- site-specific caveats
- a direct Oracle reference link
- machine-readable JSON for search/RAG ingestion
- a Connect PHP vs REST comparison where a corresponding REST resource exists

### Contact

- [`objects/contact.md`](objects/contact.md)
- [`catalog/contact.json`](catalog/contact.json)
- [`examples/contacts/`](examples/contacts/)
- [`comparisons/contact.json`](comparisons/contact.json)

### Incident

Incident is expanded using a version-qualified public Connect PHP class surface and current Oracle REST v1.4 cross-check. Later-version fields that cannot yet be proven in current RNCPHP are explicitly marked rather than guessed.

- [`objects/incident.md`](objects/incident.md)
- [`catalog/incident.json`](catalog/incident.json)
- [`examples/incidents/`](examples/incidents/)
- [`comparisons/incident.json`](comparisons/incident.json)

### Organization

Organization is expanded using the same version-qualified approach, including typed addresses, parent hierarchy, CRM module flags, notes, attachments, sales settings, SLA/service settings and a REST comparison.

- [`objects/organization.md`](objects/organization.md)
- [`catalog/organization.json`](catalog/organization.json)
- [`examples/organizations/`](examples/organizations/)
- [`comparisons/organization.json`](comparisons/organization.json)

### Answer

Answer is expanded with knowledge-content fields, access levels, assignment, products/categories, sibling and related-answer behaviour, publishing/expiry scheduling, notifications, ranking, notes, answer-specific/shared attachments, and the REST answer-versioning differences.

- [`objects/answer.md`](objects/answer.md)
- [`catalog/answer.json`](catalog/answer.json)
- [`examples/answers/`](examples/answers/)
- [`comparisons/answer.json`](comparisons/answer.json)

### AnswerVersion

AnswerVersion is documented as a REST-first CCOM resource with an explicit RNCPHP binding gap. Oracle REST v1.4 exposes it as a separate resource, while the older public RNCPHP surface used by this project does not provide enough evidence to assert a first-class `RNCPHP\AnswerVersion` class. The repo therefore documents REST-native version lifecycle behaviour alongside the closest verified older `RNCPHP\Answer` patterns without inventing a direct class mapping.

- [`objects/answer-version.md`](objects/answer-version.md)
- [`catalog/answer-version.json`](catalog/answer-version.json)
- [`examples/answer-versions/`](examples/answer-versions/)
- [`comparisons/answer-version.json`](comparisons/answer-version.json)

See [`catalog/coverage-status.json`](catalog/coverage-status.json) for the completion ledger, [`guides/comprehensive-object-reference.md`](guides/comprehensive-object-reference.md) for the object-reference methodology, and [`guides/connect-php-vs-rest.md`](guides/connect-php-vs-rest.md) for the API comparison methodology.

## Connect PHP vs REST

Connect PHP and Connect REST share CCOM concepts, but this repository does not assume the bindings are identical. Per-object comparisons record field availability, naming/representation differences, access differences, special methods/actions, query patterns and binding-specific behaviour.

This is intended to highlight practical differences developers encounter when moving between RNCPHP and REST rather than presenting the two APIs as interchangeable.

## Metadata verification

Connect PHP exposes metadata that can be used to verify the object model against a real Oracle B2C Service site. This is useful because customer sites have their own custom fields and platform versions may differ.

Use:

```php
$metadata = RNCPHP\Contact::getMetadata();
$relations = RNCPHP\Contact::getRelations();
```

A generic helper is included at [`tools/dump-object-metadata.php`](tools/dump-object-metadata.php).

## Official Oracle documentation

Connect PHP API reference:

https://documentation.custhelp.com/euf/assets/devdocs/unversioned/Connect_PHP/Default.htm

REST API for Oracle B2C Service:

https://docs.oracle.com/en/cloud/saas/b2c-service/cxsvc/index.html

Oracle remains the authoritative source for supported platform behaviour.

## Copyright / independence

This is an independent SPCX Consulting project and is not an Oracle publication. Oracle product names and API identifiers are used for identification/interoperability. Oracle documentation prose and Oracle sample programs are not intended to be republished here.

See [`guides/copyright-and-sources.md`](guides/copyright-and-sources.md).
