# Connect Common Object Model

Oracle B2C Service exposes a shared object model called the **Connect Common Object Model (CCOM)**.

Connect PHP and Connect Web Services both use this model, and the REST API follows the same model closely. That makes the public CCOM resource catalogue a useful starting point for organising a Connect PHP knowledge base.

This repository separates two concepts:

1. **CCOM inventory** — standard resources known to exist in the common object model.
2. **Connect PHP verification** — class names, writable properties and code patterns that have been checked for a particular Connect PHP version.

That distinction is deliberate. A resource being visible in the common model does not mean every REST operation or helper resource maps one-for-one to a writable Connect PHP class in every version.

See `catalog/standard-ccom-objects.json` for the machine-readable inventory.
