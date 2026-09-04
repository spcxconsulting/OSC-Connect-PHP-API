# OSC Connect PHP API

An independent, SPCX-authored developer reference and example library for **Oracle B2C Service / Oracle Service Cloud Connect PHP**.

> This repository is not an Oracle documentation mirror and is not affiliated with or endorsed by Oracle.

## Goals

- provide practical, original PHP examples for common Connect PHP tasks;
- maintain a searchable catalogue of the Connect Common Object Model (CCOM);
- document implementation patterns, pitfalls and integration approaches in plain language;
- provide clean source material that SPCX can reuse for its own search/RAG tooling.

Oracle states that Connect PHP uses the **Connect Common Object Model**, the same common object model used by Connect Web Services. The object catalogue in this repository therefore starts from the public CCOM resource inventory and is expanded with Connect PHP-specific examples as each class is verified.

## Important copyright / attribution note

The explanations and examples in this repository are independently written for SPCX. Oracle product names, API names, class names, object names and property identifiers are referenced only as needed to describe interoperability with Oracle B2C Service.

This repository intentionally does **not** reproduce Oracle's documentation pages or copy Oracle's sample code wholesale.

For authoritative behaviour, supported fields, version availability and API contracts, use Oracle's documentation:

- Connect PHP API Reference: https://documentation.custhelp.com/euf/assets/devdocs/unversioned/Connect_PHP/Default.htm
- Oracle B2C Service APIs & Schema: https://docs.oracle.com/en/cloud/saas/b2c-service/api.html
- Oracle B2C Service REST/CCOM reference: https://docs.oracle.com/en/cloud/saas/b2c-service/cxsvc/toc.htm

## Repository layout

```text
catalog/
  standard-ccom-objects.json   Machine-readable object inventory

objects/
  *.md                         One SPCX-authored page per standard CCOM resource

examples/
  contacts/
  incidents/
  organizations/
  roql/

guides/
  getting-started.md
  object-model.md
  copyright-and-sources.md
```

## Namespace used in examples

Most examples use:

```php
use RightNow\Connect\v1_4 as RNCPHP;
```

Your Oracle B2C Service site or Custom Process Model may require a different supported Connect version. Keep the version declaration consistent with the environment in which the script runs.

## Status

This is an initial reference seed. The CCOM inventory is intentionally broader than the set of classes for which this repository currently provides verified Connect PHP code examples. Each object page carries a verification status so we can expand it without guessing.

## Licence

SPCX-authored code and text in this repository are provided under the MIT licence. That licence applies only to material authored in this repository; it does not grant rights to Oracle documentation, software or trademarks.
