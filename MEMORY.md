# MEMORY.md — Drift: Surface Hub theme

Running record of decisions, state and open issues. Newest first.

## Current state (2026-10-08, v1.1.0)
- v1.1.0 released: https://github.com/drift-creative-systems/drift-hub-theme/releases/tag/v1.1.0
- Updates via GitHub releases (Plugin Update Checker 5.7). Releases are built by hand (README). No GitHub Actions.
- Companion to the `drift-hub` plugin (Drift: Surface Hub): https://github.com/drift-creative-systems/drift-hub (1.0.0 released 2026-10-08, own updater).
- Tested with the plugin at 0.1.3: with root mode off, `/` goes to `/hub/` through this theme (see the plugin's CLAUDE.md).
- No staging or live URLs recorded. Expected live URL: https://surface.driftcreativesystems.co.uk/ (from a plugin code comment).

## Decisions
| Date | Decision | Why |
|---|---|---|
| 2026-10-08 | Self-updates via PUC + `drift-hub-theme.zip` release asset, `vendor/` committed (1.1.0) | Same as `drift-create`: updates through wp-admin, no token needed because the repo is public. Replaces the 1.0.0 "no updater" decision. |
| 2026-10-08 | `Update URI` header added | Stops a wordpress.org theme with the same slug from offering an "update" that overwrites it. |
| 2026-10-08 | Public repo, `drift-hub-theme.zip` release asset | Same pattern as `drift-create`. |
| 0.1.3 (plugin) | Theme is a separate zip, not bundled in the plugin | WordPress installs themes and plugins separately. |
| 0.1.3 (plugin) | 503 + no-cache when the plugin is off | Search engines and caches treat it as temporary, not as the real page. |

## Open issues / to check
- [ ] Any site that installed 1.0.0 needs 1.1.0 uploaded by hand once (1.0.0 has no updater).
- [ ] Confirm the update shows under Dashboard → Updates when 1.1.1+ is released.
- [x] Create the `drift-hub` plugin repo so its Plugin URI resolves (2026-10-08).
- [ ] The redirect in `index.php` is a 302 (the `wp_safe_redirect` default). Fine while the hub's location can change. Switch to 301 only once it's settled.
- [ ] Test the offline page in a browser: plugin off, logged out, and logged in as admin.

## Gotchas
- In root mode the plugin catches every request on `template_redirect` priority 0, so `index.php` never runs. The theme's redirect only matters for `/hub/` mode.
- `drift_hub_theme_target()` depends on `Drift_Hub_App::url()`. Don't rename that method in the plugin without updating the theme.
