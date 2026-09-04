# Contact examples

These are original SPCX examples for `RightNow\Connect\v1_4\Contact`. They intentionally use fictional data and avoid hard-coding customer-specific custom fields or menu IDs unless the value is clearly marked as a placeholder.

## Examples

- [`create-contact.php`](create-contact.php) - small create example.
- [`create-comprehensive-contact.php`](create-comprehensive-contact.php) - name, address, multiple emails, phones, marketing settings and optional organisation relationship.
- [`find-contact-by-email.php`](find-contact-by-email.php) - ROQL lookup pattern.
- [`update-contact.php`](update-contact.php) - fetch and update selected fields.
- [`inspect-contact-metadata.php`](inspect-contact-metadata.php) - inspect the current site's Contact metadata before assuming types/availability.

## Why metadata matters

Connect PHP is strongly typed. A property that contains a nested object or list must receive the appropriate Connect PHP type. Site-specific custom fields and some menu/list values vary between implementations.

For reusable code, prefer discovering types using `Contact::getMetadata()` and validating IDs/lookups against the target site rather than treating example IDs as universal constants.
