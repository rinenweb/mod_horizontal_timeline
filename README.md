# Horizontal Timeline — Joomla Module

`mod_horizontal_timeline` is a lightweight Joomla **site module** that renders a clickable, horizontal timeline. Each point on the timeline shows a title and a year/date; clicking a point reveals its description below the timeline, with a smooth active-state highlight — all in plain CSS and vanilla JavaScript, no third-party libraries.
---

## Features

- **Horizontal, grid-based timeline** that auto-sizes its columns to the number of items.
- **Repeatable timeline items** via a Joomla subform — add as many points as you need, in any order.
- Each item supports:
  - **Text above the dot** (rich HTML) — the point title.
  - **Year or date** (plain text) — shown under the dot.
  - **Text below the timeline** (rich HTML) — revealed when the point is clicked.
- **Optional intro text** (rich HTML) displayed above the whole timeline.
- **Active-state highlighting** on hover and on selection, driven by a single CSS custom property.
- **Multiple instances per page** are fully isolated — styling and IDs are scoped per module, so two timelines on the same page never clash.
- **No inline event handlers** — interactions use event delegation, which keeps the module compatible with strict Content-Security-Policy setups.
- **Modern asset loading** through Joomla's Web Asset Manager (each asset is registered and loaded once).

## Requirements

- Joomla **5.x** (site).
- PHP **8.1** or newer.


## Installation

1. Download the latest `mod_horizontal_timeline_vX.Y.Z.zip` from the [Releases](../../releases) page.
2. In the Joomla administrator, go to **System → Install → Extensions**.
3. Upload the ZIP (drag & drop or *Upload Package File*).
4. Go to **Content → Site Modules**, open **Horizontal Timeline**, assign it to a position and menu items, and set it to *Published*.

## Configuration

All options live under the module's **Basic** tab.

| Field | Type | Description |
|-------|------|-------------|
| **Text Above Timeline** | Editor (HTML) | Optional content shown above the timeline. |
| **Timeline Items** | Subform (repeatable) | The list of points on the timeline. |
| ↳ **Text Above Dot** | Editor (HTML) | The point's title, shown above its dot. |
| ↳ **Year or Date** | Text | The label shown beneath the dot. |
| ↳ **Text Below Timeline** | Editor (HTML) | The description revealed when the point is clicked. |

## How it works

The module lays the items out on a CSS grid, one column per item. Each item renders as a card (title + year) sitting on a shared baseline with a dot. Clicking a card:

1. Highlights that card's title, year and dot (`.active`).
2. Hides every other item's description and shows only the selected one below the timeline.

Selection is handled by a single delegated `click` listener scoped to the module container, so behaviour stays correct no matter how many instances are on the page.


## Changelog

### 1.0.1
- Replaced legacy `J`-prefixed classes with namespaced Joomla APIs.
- Assets now load once through the Web Asset Manager (no duplicate CSS include).
- Per-instance scoping for CSS variables and element IDs — safe with multiple modules per page.
- Output escaping for the year/date field.
- Replaced inline `onclick` handlers with event delegation (CSP-friendly).
- Removed unused JavaScript and CSS, and dead PHP variables.
- Fixed the manifest `<name>` element and added a language string for the empty state.

### 1.0.0
- Initial release.

## License

Released under the **GNU General Public License v2.0 or later**. See [LICENSE](LICENSE) for details.
