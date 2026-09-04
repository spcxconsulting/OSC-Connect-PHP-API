# Connect PHP vs REST comparison methodology

Oracle B2C Service exposes related data through multiple bindings. Connect PHP and Connect REST both draw from the Connect Common Object Model (CCOM), but the bindings are not assumed to be identical.

This repository therefore treats the two APIs as separate surfaces that can share concepts while differing in naming, transport, operations, available fields, write behaviour, special actions, query behaviour and version-specific support.

## What we compare

For each object/resource we record:

- Connect PHP class name and namespace
- REST collection/resource name
- properties exposed by each binding
- equivalent properties with different casing or representation
- properties present only in Connect PHP
- properties present only in REST
- nested-object differences
- read-only / write-only / read-write differences
- create/read/update/delete support
- special methods/actions
- query patterns
- version notes
- site/configuration-specific behaviour

## Status values

Comparison entries use these values:

- `equivalent` — same underlying concept with materially equivalent use
- `binding-different` — same concept but represented or operated on differently
- `connect-php-only` — documented in Connect PHP but not found on the compared REST surface
- `rest-only` — documented in REST but not found on the compared Connect PHP surface
- `behaviour-different` — available in both, but semantics/access differ
- `site-specific` — depends on customer configuration
- `needs-verification` — not yet verified against both official references

## Examples of binding-level differences

Connect PHP works with in-process PHP objects such as `RNCPHP\Contact`, object methods and `save()` calls. REST uses HTTPS resources, JSON payloads and HTTP methods such as GET, POST, PATCH and DELETE.

REST resource collections are plural/camelCase names such as `contacts`, while Connect PHP uses class names such as `Contact`.

REST may expose binding-specific operations as resource actions, while Connect PHP may expose an object method or platform method for the same underlying capability.

## Source discipline

Oracle documentation is used to identify API structure and supported behaviour. SPCX descriptions, examples and comparison notes are independently written. The comparison layer should not be treated as authoritative until the entry is marked verified against both public Oracle references.

## Machine-readable comparisons

Per-object comparison files live in `comparisons/` and are designed for later ingestion into Ask.SPCX. This lets the bot answer questions such as:

- "Is this field available in RNCPHP and REST?"
- "What is the REST equivalent of this Connect PHP property?"
- "Why does this code work in Connect PHP but not REST?"
- "Which API is better suited to this operation?"
