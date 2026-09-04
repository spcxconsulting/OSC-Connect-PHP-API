# How this repository builds comprehensive object references

The goal is comprehensive Connect PHP coverage without republishing Oracle's documentation text.

For each object we record:

1. Every documented API property/element name.
2. The Connect PHP type or scalar type.
3. Read-only, write-only, read/write or configuration-dependent behaviour where known.
4. Nested object/list types.
5. Standard object methods and relevant constants.
6. Original SPCX PHP examples using fictional data.
7. Site-specific caveats such as custom fields and menu/list IDs.
8. A direct link to Oracle's authoritative documentation.
9. A machine-readable JSON manifest for retrieval/search/AI ingestion.

## Why identifiers are separated from prose

Class names, method names and property names are needed to write interoperable code. The repository uses those identifiers as factual API structure while descriptions and examples are independently written.

## Metadata verification

Static documentation can become stale and Oracle B2C Service sites may expose site-specific custom-field structures. Connect PHP's `getMetadata()` and `getRelations()` methods provide a useful verification layer.

Use `tools/dump-object-metadata.php` in a target site to capture the actual class model exposed by that environment, then compare it with the repository catalogue.

## Version policy

Examples currently use the `RightNow\Connect\v1_4` namespace. Do not assume a namespace version purely from an example: use the version supported by the target implementation and verify object metadata before production deployment.
