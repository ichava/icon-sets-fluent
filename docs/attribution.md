# Attribution and licence

*Reference.*

## Upstream

[Fluent UI System Icons](https://github.com/microsoft/fluentui-system-icons) is made by Microsoft Corporation. Source: [github.com/microsoft/fluentui-system-icons](https://github.com/microsoft/fluentui-system-icons).

## Licence

The icons and this package are owned separately:

- **The icons** are © Microsoft Corporation, under [MIT](https://github.com/microsoft/fluentui-system-icons/blob/73ec879377b1f412f33aca4a128aa967e6c238f0/LICENSE). Simtabi LLC redistributes them and claims no authorship of them.
- **This package's code** (provider, enum, component, configuration) is © Simtabi LLC, [MIT](../LICENSE).

MIT allows commercial and non-commercial use, modification and redistribution, provided the copyright notice and permission notice accompany every copy. That is a condition, not a courtesy: the upstream notice is reproduced in [`ATTRIBUTION.md`](../ATTRIBUTION.md) at the package root, which ships in the dist archive (`docs/` does not). Keep them with the icons if you copy them out of the package.

## Credit

A visible credit is not required by the licence, but is welcome on a "credits" or "about" page:

> Icons from [Fluent UI System Icons](https://github.com/microsoft/fluentui-system-icons) by Microsoft (MIT).

## Updating from upstream

Asset refreshes run **maintainer-side** via
[`ichava/icon-sets-sync`](https://github.com/ichava/icon-sets-sync). End users **don't** refresh
locally -- `vendor/` is regenerated on every `composer install`, so any local change is discarded.
Run `php artisan ichava::ichava-core.check-updates --package=ichava/icon-sets-fluent` to see whether a new upstream
version is available.

## See also

- [Fluent UI System Icons](https://github.com/microsoft/fluentui-system-icons)
- [Source repository](https://github.com/microsoft/fluentui-system-icons)

---

[← Docs index](../README.md#documentation)
