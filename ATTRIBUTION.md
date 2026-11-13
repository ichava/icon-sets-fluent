# Attribution

This package has two owners, and each part keeps its own licence.

| Part | Owner | Licence |
|---|---|---|
| The SVG icons in `resources/assets/svg/files/` | Microsoft Corporation | MIT, text below |
| Everything else: the PHP, configuration, translations, tests and documentation | Simtabi LLC | MIT, see [`LICENSE`](LICENSE) |

Simtabi LLC packages and redistributes the icons. It did not draw them and claims no authorship of them.

## Fluent UI System Icons

- **Project**: [Fluent UI System Icons](https://github.com/microsoft/fluentui-system-icons), source [github.com/microsoft/fluentui-system-icons](https://github.com/microsoft/fluentui-system-icons)
- **Author**: Microsoft Corporation
- **Vendored version**: 1.1.345 of `@fluentui/svg-icons` (`upstream.current_version` in `resources/assets/svg/config.json`), upstream ref `73ec879377b1f412f33aca4a128aa967e6c238f0`
- **Licence**: MIT, SHA-256 `69bc45dc42b9acb96a69823adbc6ae538374e3c0bde169b855b32c48eaaef52f`, recorded as `license.sha256` in `config.json`

The MIT licence lets you use, modify and redistribute the icons, on one condition: the copyright notice and permission notice below go with every copy or substantial portion. This file and the licence text at [`resources/assets/svg/licenses/fluentui-system-icons/LICENSE`](resources/assets/svg/licenses/fluentui-system-icons/LICENSE) ship in the package so those conditions hold wherever the package goes. If you copy the SVGs out of the package, copy this notice with them.

Upstream also ships a `NOTICE` file at this ref, about third-party code in its own build tooling. It is reproduced verbatim at [`resources/assets/svg/licenses/fluentui-system-icons/NOTICE`](resources/assets/svg/licenses/fluentui-system-icons/NOTICE).

### What is included

Size 24 only, regular and filled. The other sizes (10, 12, 16, 20, 28, 32, 48) and the `light` and `color` styles are not vendored. Upstream names are `<name>_24_<style>.svg`; the size and style move into the folder and the name is slugged to hyphens (`access_time_24_regular.svg` is `regular/access-time`).

| Variant | Icons | Style |
|---|---:|---|
| `regular` | 2,478 | Outlined style at 24 px |
| `filled` | 2,514 | Solid style at 24 px |

The upstream licence, verbatim from `LICENSE` at `73ec879377b1f412f33aca4a128aa967e6c238f0`:

```text
MIT License

Copyright (c) 2020 Microsoft Corporation

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
```

## Crediting

The licence asks only for the notice above to travel with the icons. A visible credit is not required, but is welcome:

> Icons from [Fluent UI System Icons](https://github.com/microsoft/fluentui-system-icons) by Microsoft (MIT).
