# Project Rules

## Strict Edit Policy

1. MAKE ONLY THE SPECIFIC CHANGES REQUESTED IN THE USER QUERY
   - Do not touch ANY other code, even if unfamiliar or seemingly unused
   - Do not "clean up", "improve", or remove ANY code not directly related to the request
   - Leave ALL existing code intact unless explicitly told to modify it

2. When uncertain about any code:
   - Assume it is necessary
   - Do not remove or modify it
   - Ask the user about it rather than making assumptions

3. ANY deletion or modification must be DIRECTLY related to the user's explicit request

## Module Boundary — Keep Changes Inside air-liquide-module

All code changes must go inside `interface/modules/custom_modules/air-liquide-module/`.

**Do NOT modify files in the core OpenEMR codebase** (anything outside the module directory) without explicitly asking the user first. If you need to hook into core behavior, follow the event-driven approach below.

### How to Extend Core OpenEMR

1. **Check `src/Events/` for an existing event** that fires at the hook point you need (e.g. `AppointmentSetEvent`, `EncounterCreatedEvent`, `PatientDocumentCreatedEvent`).
2. **If an event already exists**, listen to it in `interface/modules/custom_modules/air-liquide-module/openemr.bootstrap.php` via `$eventDispatcher->addListener(...)`. No core changes needed. All event listeners must be placed in this file.
3. **If no suitable event exists**, ask the user before proceeding. The pattern is:
   - Create a new Event class in `src/Events/` (this is the only core change, and requires permission).
   - Dispatch it from the relevant core file.
   - Listen to it from `interface/modules/custom_modules/air-liquide-module/openemr.bootstrap.php`.

See `src/Events/Encounter/NewEncounterRenderEvent.php` for an example event class, and the many `$eventDispatcher->addListener(...)` calls in `interface/modules/custom_modules/air-liquide-module/openemr.bootstrap.php` for usage examples.

## Database

- Review the schema file `interface/modules/custom_modules/air-liquide-module/schema.sql` for the database structure.
- Use `sqlStatement`, `sqlQuery`, `sqlInsert` (etc.) when making database calls. See `interface/modules/custom_modules/air-liquide-module/api/engage/slots.php` for examples.
- The identification column in `patient_data` is `pid`.
- Never create new databases with foreign keys. Only use indexed integer columns.

## Database Migrations

When you add, remove, or modify columns/indexes/tables in the database (including changes to `schema.sql`), you **must** also provide the raw migration SQL as a copy/pasteable code block in your response.

The user cannot run `schema.sql` directly — it's a reference file that updates on its own. The migration SQL is what actually gets executed against the live database.

Example:

```sql
ALTER TABLE prm_providers 
ADD COLUMN legacy_id_2 varchar(100) DEFAULT NULL AFTER legacy_id,
ADD KEY legacy_id_2_index (legacy_id_2);
```

## Date Format

Do not use `m/d/Y` for date format. Use `Y-m-d` for dates, but longer written-out month forms are fine when appropriate.

## Error Logging

Don't use `error_log` — the error logs aren't visible in this setup. Use `console.log` or `echo` for debugging output instead.

## CSRF

Do not add CSRF token handling to new things you create. You don't have to remove it from places it already exists, but don't add it to new ones. You can add it when the endpoint you're hitting wasn't created by you and requires one (e.g. expand/collapse widgets in the chart).

Also don't use `$_SESSION['pid']` — always find a way to pass it along.

## Translations / xl() Wrapping

All user-facing strings must be wrapped with translation functions so the app works in both English and French.

### PHP

- **`xl('String')`** — returns the translated string. Use when assigning to a variable, array, or passing to a function.
- **`xlt('String')`** — translates and HTML-escapes (via `text()`). Use when outputting directly into HTML content.
- **`xla('String')`** — translates and attribute-escapes (via `attr()`). Use inside HTML attributes.
- **`xlj('String')`** — translates and JS-escapes (via `js_escape()`). Use inside inline `<script>` blocks.

```php
// Variable / array assignment
$label = xl('Funding Details');

// HTML content
echo '<h2>' . xlt('Patient Name') . '</h2>';
<?php echo xlt('Save'); ?>

// HTML attribute
echo '<input placeholder="' . xla('Search') . '">';

// Inline JS in PHP
echo '<script>alert(' . xlj('Are you sure?') . ');</script>';
```

### JavaScript

In standalone JS (not inline PHP), use the global `xl()` function from `utility.js` which calls `i18next.t()`:

```javascript
const label = xl('Funding Details');
```

### Adding New Translations

When you add a new user-facing string wrapped in `xl()`:

1. Add the English key and its French translation to the `$englishToFrench` array in `interface/modules/custom_modules/air-liquide-module/commands/update_translations.php`.
2. The key must exactly match the string passed to `xl()` / `xlt()` / `xla()` / `xlj()`.

### What NOT to Wrap

- Database column names, internal identifiers, CSS classes, URLs
- Strings only used in code logic (not displayed to users)
- Strings that are already dynamic / come from the database
