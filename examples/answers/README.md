# Answer examples

Original SPCX examples for `RightNow\Connect\v1_4\Answer`.

These examples are deliberately configuration-aware. Replace placeholder IDs with values verified on the target Oracle B2C Service site.

## Included patterns

- `create-answer.php` — minimum practical creation pattern.
- `create-comprehensive-answer.php` — content, visibility, taxonomy, assignment and scheduling in one example.
- `find-answer-by-summary.php` — ROQL lookup.
- `update-answer-content.php` — update summary/question/solution.
- `assign-answer.php` — assign an answer to a staff group.
- `set-products-and-categories.php` — attach knowledge taxonomy relationships.
- `schedule-publishing.php` — set publish and expiry dates.
- `add-related-answer.php` — legacy RNCPHP `AnswerLink` pattern.
- `add-note.php` — append an internal note.
- `add-file-attachment.php` — attach an answer-specific file.
- `inspect-answer-metadata.php` — inspect metadata/relations when run inside a real B2C Service environment.

## Version qualification

The examples use the `v1_4` namespace style, but several structures were reconstructed from a public v1_1 generated Connect PHP stub set. Validate metadata on the target site before production use.

Current REST v1.4 also exposes `answerVersion`, `guidedAssistance`, `specialResponse` and `versionDetail`; those are intentionally not invented as RNCPHP v1_4 properties here until independently verified.
