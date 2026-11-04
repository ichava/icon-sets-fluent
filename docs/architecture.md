# Architecture

*Explanation.* What this pack is, what it delegates, and why it is shaped that way.

## What it ships

4,992 SVGs, addressed by variants -- see [Variants](variants.md). Counted from the tracked
files rather than quoted from prose:

```bash
git ls-tree -r --name-only origin/main -- resources/assets/svg/files | grep -c '\.svg$'
```

Besides the assets it ships a provider, a constants class, an enum for its addressing axis, and a
Blade component extending core's. That is the whole surface.

## Why a subset

Size 24 only, regular and filled. The other sizes (10, 12, 16, 20, 28, 32, 48) and the `light` and `color` styles are not vendored. Upstream names are `<name>_24_<style>.svg`; the size and style move into the folder and the name is slugged to hyphens (`access_time_24_regular.svg` is `regular/access-time`).

Measured on 2026-11-04: before the subset, 21,777 SVGs, 12.8 MB of SVG bytes, 85 MB on disk (every size from 10 to 48, regular, filled, light and color); after it, 4,992 SVGs, 2.8 MB of SVG bytes, 20 MB on disk (size 24, regular and filled). The pack plan
caps a pack at 150 MB on disk and 30,000 SVGs, because every install downloads the whole archive and
most applications use one style.

## It depends on core, and core does not depend on it

The pack registers its icon directory with core's `IconRegistry` during `bootingPackage()`, after
core's singletons are bound. Core discovers installed packs at runtime. It has no list of them, so a
pack is added by installing it and removed by removing it.

## It requires `laranail/package-tools` directly

The provider writes `Package` into its own `configurePackage()` signature, so it depends on that
class whatever the dependency graph delivers transitively through core. **Require what you import**
is the rule; a transitive dependency is not a contract.

## Upstream

Its upstream is the `@fluentui/svg-icons` npm package `1.1.345`, built from microsoft/fluentui-system-icons commit `73ec879` (the repository has no release tags). The version these SVGs came from is recorded in
`resources/assets/svg/config.json` under `upstream.current_version`, and the licence text's SHA-256
under `license.sha256`, rather than written out here, so the two cannot drift.

## See also

- [Core architecture](https://github.com/ichava/core/blob/main/docs/architecture.md) -- topology, boot order, the registry
- [Attribution](attribution.md) -- the upstream project and its licence
- [Release](release.md)

---

[← Docs index](../README.md#documentation)
