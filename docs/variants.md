# Variants

*Reference.* The 2 variants of `ichava/icon-sets-fluent`, and how to address them.

`ichava/icon-sets-fluent` ships **4,992 icons across 2 variants**. Each variant is a folder under `resources/assets/svg/files/`, and core files every icon under its folder, so the variant is the first segment of the icon path.

| Variant | Path | Icons | Style |
|---|---|---:|---|
| `regular` | `regular/<name>` | 2,478 | Outlined style at 24 px |
| `filled` | `filled/<name>` | 2,514 | Solid style at 24 px |

The default variant is `regular`. Always include the variant in the icon path: `ichava/icon-sets-fluent::regular/home`.

Each SVG is 24x24 with `viewBox="0 0 24 24"` and paints with the default fill (black). Set `fill: currentColor` on the `svg` to make it follow the text colour.

## Examples

```blade
<x-ichava::icon name="ichava/icon-sets-fluent::regular/home" class="w-6 h-6" />
<x-ichava::icon name="ichava/icon-sets-fluent::filled/heart" class="w-6 h-6" />
```

## Variant enum (PHP)

```php
use Simtabi\Laranail\Ichava\IconSetsFluent\Enums\Variant;

Variant::REGULAR->value;               // 'regular'
Variant::FILLED->value;                // 'filled'
Variant::default();             // Variant::REGULAR
```

The enum implements `IconSetVariantInterface` from core, so it works wherever core's registry expects a variant.

## What is not here

Size 24 only, regular and filled. The other sizes (10, 12, 16, 20, 28, 32, 48) and the `light` and `color` styles are not vendored. Upstream names are `<name>_24_<style>.svg`; the size and style move into the folder and the name is slugged to hyphens (`access_time_24_regular.svg` is `regular/access-time`).

## See also

- [Customisation](customization.md), colour and size
- [Icon path format](https://github.com/ichava/core/blob/main/docs/tools/icon-path-format.md)

---

[← Docs index](../README.md#documentation)
