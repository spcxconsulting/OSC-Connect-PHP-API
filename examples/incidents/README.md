# Incident examples

Original SPCX examples for working with `RightNow\Connect\v1_4\Incident`.

These examples use fictional data and deliberately avoid copying Oracle sample programs. IDs for contacts, accounts, queues, statuses, products, categories, dispositions and thread types are placeholders because those values can differ by site/configuration.

## Examples

- [`create-incident.php`](create-incident.php) - minimal create pattern.
- [`create-comprehensive-incident.php`](create-comprehensive-incident.php) - larger create example covering relationships, assignment, classification and an initial thread.
- [`find-incident-by-reference.php`](find-incident-by-reference.php) - locate an Incident by its generated reference number.
- [`update-incident.php`](update-incident.php) - update ordinary fields plus queue/status patterns.
- [`append-thread.php`](append-thread.php) - append a new discussion/note entry without rewriting history.
- [`link-secondary-contacts.php`](link-secondary-contacts.php) - populate `OtherContacts`.
- [`assign-incident.php`](assign-incident.php) - staff assignment using `GroupAccount`.
- [`add-billed-time.php`](add-billed-time.php) - add a `TimeBilled` entry.
- [`add-file-attachment.php`](add-file-attachment.php) - attach a generated text file using `FileAttachmentIncident`.
- [`inspect-incident-metadata.php`](inspect-incident-metadata.php) - inspect metadata/relations when run in a real B2C Service environment.
- [`list-recent-incidents.php`](list-recent-incidents.php) - ROQL result-set example.

## Important

Do not copy placeholder IDs directly into production code. Prefer configuration/metadata/lookup logic appropriate to the target B2C Service site.

Connect PHP examples use the v1.4 namespace style. The repository records version/source qualifications in `catalog/incident.json` where the public current Connect PHP reference could not be independently verified.
