# Drift: Surface Hub — WordPress theme

A blank classic theme for the **Drift: Surface Hub** site. Every front-end URL goes to the hub. If the Drift: Surface Hub plugin is switched off, visitors see a branded "offline for a moment" page (HTTP 503) instead of a broken site. Built by The Bonsai Digital Collective.

- **Version:** 1.1.0
- **Repo:** https://github.com/drift-creative-systems/drift-hub-theme
- **Requires:** WordPress 6.3+, PHP 8.0+, the **Drift: Surface Hub** plugin (`drift-hub`)
- **Text domain:** `drift-hub-theme`

No templates, no Customiser, no menus, no ACF. The hub screens and the login styling live in the plugin. This theme exists so the site has an active theme and the default Twenty-something themes can be deleted.

---

## Install

1. Install and activate the **Drift: Surface Hub** plugin.
2. Download `drift-hub-theme.zip` from the [latest release](https://github.com/drift-creative-systems/drift-hub-theme/releases/latest). Upload it under Appearance → Themes → Add New → Upload and activate it. The folder must be named `drift-hub-theme`, so don't use GitHub's auto-generated "Source code" zips.
3. Delete the default Twenty-something themes.

Later versions arrive under **Dashboard → Updates** (see [Updates](#updates)).

## What it does

| Situation | Result |
|---|---|
| Plugin active, hub at `/hub/` | Any front-end URL that reaches the theme redirects (302) to `/hub/` |
| Plugin active, hub at the site root | The plugin handles every URL before the theme loads, so the theme never renders |
| Plugin inactive | Branded holding page, HTTP 503, `no-cache`. Admins also get a link to Plugins |

On every page the theme also:
- adds `title-tag` support
- removes the generator tag, emoji script and styles, feed links and oEmbed discovery links
- sends `noindex, nofollow` via `wp_robots`

## Structure

```
drift-hub-theme/
├── style.css        Theme header + styles for the offline page only
├── functions.php    Head clean-up, noindex, drift_hub_theme_target(), requires inc/updates.php
├── index.php        Redirect to the hub, or the 503 offline page
├── inc/updates.php  GitHub release updates (Plugin Update Checker)
├── vendor/          Composer (plugin-update-checker), committed
├── screenshot.png
└── README.md, CHANGELOG.md, DESIGN.md, MEMORY.md, CLAUDE.md, llm-instructions.txt
```

## Development notes

- **No build step.** Plain PHP and CSS. The only Composer dependency is the update checker.
- The theme only talks to the plugin through `Drift_Hub_App::url()`, guarded by `class_exists()`. If the plugin changes that method, update `drift_hub_theme_target()`.
- Keep it blank. Hub features belong in the plugin.

## Updates

The theme updates itself from GitHub releases via [Plugin Update Checker](https://github.com/YahnisElsts/plugin-update-checker) (`inc/updates.php`). WordPress checks every 6 hours. New versions appear under **Dashboard → Updates** and install the `drift-hub-theme.zip` release asset.

`vendor/` is committed, so the theme works straight from a release zip. Only run `composer install` if you change `composer.json`. If `vendor/` is missing, the theme still works but logs an error and won't update.

**Sites on 1.0.0 have no updater.** Upload the 1.1.0 zip by hand once (Appearance → Themes → Add New → Upload, then "Replace current with uploaded"). After that, updates come through the Dashboard.

`Update URI` in `style.css` stops WordPress matching the theme to anything on wordpress.org.

## Releasing a new version

Work on `develop`, then:

1. Bump `Version:` in `style.css`.
2. Add a dated section to `CHANGELOG.md`.
3. Merge `develop` → `main` and push.
4. Tag and build the zip from the tag. `.gitattributes` keeps dev files out of it.
   ```bash
   git tag v1.0.1 && git push origin v1.0.1
   git archive --format=zip --prefix=drift-hub-theme/ -o drift-hub-theme.zip v1.0.1
   ```
5. Create the release with the zip attached. It must be named exactly `drift-hub-theme.zip`.
   ```bash
   gh release create v1.0.1 drift-hub-theme.zip --title "Drift: Surface Hub theme 1.0.1" --notes "<changelog section>"
   ```

## Licence

Proprietary. © The Bonsai Digital Collective.
