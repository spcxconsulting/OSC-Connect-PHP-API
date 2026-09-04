# AnswerVersion examples

`AnswerVersion` is treated differently from the main RNCPHP examples in this repository.

Oracle REST v1.4 exposes `/answerVersions` as a first-class resource. The older public RNCPHP class surface used by this project does not give enough evidence to assert a first-class `RNCPHP\AnswerVersion` class, so these examples deliberately separate REST-native operations from the older `RNCPHP\Answer` pattern.

## REST examples

- `get-answer-version-rest.php` — fetch one version.
- `list-answer-versions-rest.php` — list/query versions.
- `update-answer-version-rest.php` — patch writable version content.
- `delete-answer-version-rest.php` — delete a version, with an explicit warning.

The REST examples expect:

```text
OSC_SITE=https://example.custhelp.com
OSC_USERNAME=api-user
OSC_PASSWORD=secret
```

Use a dedicated least-privilege integration account in real deployments.

## Connect PHP comparison

- `inspect-answer-version-through-rncphp.php` — shows the older verified `RNCPHP\Answer` fields that are adjacent to versioning, without inventing an `RNCPHP\AnswerVersion` class.

## Important

Answer types, access levels, language/status IDs, product/category IDs and other configuration values vary by site. Do not copy identifiers from examples into production code without verifying the target Oracle B2C Service site.
