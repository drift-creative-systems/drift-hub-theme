# DESIGN.md — Drift: Surface Hub theme

The theme has **one screen**: the offline page shown when the Drift: Surface Hub plugin is inactive. The hub's own UI and login styling are designed in the plugin (`drift-hub/assets/hub.css`), not here.

Source of truth for the brand: the **Drift Brand System** (see the `drift-create` theme's DESIGN.md). Tokens are on `:root` in `style.css`.

---

## 1. Principles

1. **Calm, not broken.** Visitors should read "back soon", not "error". Black screen, the mark, one line of copy.
2. **Black does the work.** White text on black. Pink is used only for the one admin link.
3. **Nothing to load.** No web fonts, images or scripts. The mark is inline SVG.

## 2. Colour

| Token | Value | Use |
|---|---|---|
| `--ink` | `#000000` | Page background |
| (inline) `#fff` | `#FFFFFF` | Mark, wordmark |
| (inline) `#c9ccd1` | `#C9CCD1` | Message text (about 12.9:1 on black) |
| (inline) `#7a7f87` | `#7A7F87` | "SURFACE HUB" sub-label (about 5.2:1 on black, passes AA) |
| `--pink` | `#ee4367` | Admin link to Plugins (about 5.6:1 on black, passes AA) |
| `--mist` | `#e2ecf3` | Defined, currently unused |

## 3. Typography

No fonts are loaded. The stacks fall back to system fonts unless Inter or Poppins is installed locally.

| Element | Class | Style |
|---|---|---|
| Wordmark "DRIFT" | `.dht-name` | Poppins → system-ui, 600, 28px, `0.16em` tracking |
| Sub-label "SURFACE HUB" | `.dht-name small` | Inter, 500, 11px, `0.32em` tracking, grey |
| Message | `.dht-msg` | Inter, 16px / 1.6, max 32em |

Copy is UK English.

## 4. Layout

- `body` is a full-height grid with everything centred (`place-items: center`) and 24px padding, so it works at any width.
- Mark `.dht-mark`: 72px wide, `currentColor`, `aria-hidden`.

## 5. Accessibility

- One `<main>` landmark. The wordmark is a `<p>` because the page has no heading hierarchy to speak of.
- Every text colour passes WCAG AA on black.
- The page's `<title>` comes from WordPress (`title-tag`).
