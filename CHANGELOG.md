# Changelog

All notable changes to this theme are documented here.
Format: [Keep a Changelog](https://keepachangelog.com/en/1.1.0/). Versioning: [SemVer](https://semver.org/).

## [1.1.2] - 2026-10-08

### Changed
- README: the repos table now links the website theme as [`surface-theme`](https://github.com/drift-creative-systems/surface-theme) (renamed from `encore-theme`) and lists its `surface_*` post types, matching Drift: Surface 3.0.0 and Drift: Surface Theme 2.0.0.

## [1.1.1] - 2026-10-08

### Changed
- README: new "How the four Drift: Surface repos fit together" section (hub plugin, this theme, the Drift: Surface website plugin and the Surface theme), with what to change where when the hub gets a new field, and the release order.

## [1.1.0] - 2026-10-08

### Added
- Automatic theme updates from GitHub releases (`inc/updates.php`, Plugin Update Checker 5.7 via Composer, `vendor/` committed). New versions appear under Dashboard → Updates.

### Changed
- Sites on 1.0.0 need this version uploaded by hand once. Updates come through the Dashboard after that.

## [1.0.0] - 2026-10-08

First public release.

### Added
- Blank classic theme for the Drift: Surface Hub site.
- `index.php` redirects every front-end page to the hub (`Drift_Hub_App::url()`). With the plugin off, it shows a branded offline page with HTTP 503 and no-cache headers. Admins get a link back to Plugins.
- `functions.php`: `title-tag` support. Removes the generator tag, emoji script and styles, feed links and oEmbed discovery links. Adds `noindex, nofollow` through `wp_robots`.
- `drift_hub_theme_target()`: the hub URL, or an empty string when the plugin is inactive.
- `Update URI` header, so WordPress never matches the theme to wordpress.org.
- Project docs: README, CHANGELOG, DESIGN.md, MEMORY.md, CLAUDE.md, llm-instructions.txt.
