# Changelog

All notable changes to `ichava/icon-sets-fluent` follow [Keep a Changelog](https://keepachangelog.com/en/1.0.0/) and [Semantic Versioning](https://semver.org/).

## [Unreleased]

### Changed

- **The upstream sync runs icon-sets-sync `06b17d7`** (icon-sets-sync#88), up from `5fa93a6`, which adds this pack's recipe, the `split-variants` and `exclude` transforms, and the `licence_sha256` pin on the upstream licence text. The `uses:` pin and `toolkit-ref` move together; the reusable workflow's inputs did not change between the two commits, so the caller's `with:` block is untouched.

## [0.1.0] - TBD

First release of `ichava/icon-sets-fluent` (pack plan rank, owner decision of 2026-11-04 to ship every planned pack in v0.1.0).

### Added

- **4,992 Fluent UI System Icons SVGs** from the `@fluentui/svg-icons` npm package `1.1.345`, built from microsoft/fluentui-system-icons commit `73ec879` (the repository has no release tags), in 2 variants: `regular` (2,478), `filled` (2,514). Every file went through icon-sets-sync's SVG sanitiser.
- **A size policy.** Size 24 only, regular and filled. The other sizes (10, 12, 16, 20, 28, 32, 48) and the `light` and `color` styles are not vendored. Upstream names are `<name>_24_<style>.svg`; the size and style move into the folder and the name is slugged to hyphens (`access_time_24_regular.svg` is `regular/access-time`). Before the subset: 21,777 SVGs, 12.8 MB of SVG bytes, 85 MB on disk (every size from 10 to 48, regular, filled, light and color). After: 4,992 SVGs, 2.8 MB of SVG bytes, 20 MB on disk (size 24, regular and filled).
- **Licensing kept apart.** `LICENSE` is the MIT licence for the package code; the icons are MIT, with the upstream text at `resources/assets/svg/licenses/fluentui-system-icons/LICENSE`, a `NOTICE` beside it, and the notice in `ATTRIBUTION.md`. `config.json` records the licence's SPDX id, SHA-256 and the date it was checked, and `AttributionTest` fails if the shipped text stops matching that hash.
- **Tests:** the provider boots and registers the pack; the variant counts, the `Variant` enum and the SVG kind are pinned; no SVG carries stray text; and the sibling, attribution, docs-shape, personal-contact, PHPStan-level, release-version, workflow-permission and sync-caller guards the other packs carry.
