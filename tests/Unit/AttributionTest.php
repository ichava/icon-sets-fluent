<?php

declare(strict_types=1);

/**
 * The icons are not Simtabi LLC's, and the package has to say so wherever it goes.
 *
 * `LICENSE` covers the package code only and stays the plain MIT text, so GitHub
 * and Packagist keep detecting it as MIT: a third-party notice appended to it made
 * the detector answer NOASSERTION in the sibling packs. The upstream notice lives in
 * `ATTRIBUTION.md` at the root, because `docs/` is export-ignored and never reaches
 * a consumer's vendor directory.
 */
function attribution_root(): string
{
    return dirname(__DIR__, 2);
}

/** Strings ATTRIBUTION.md must carry verbatim: the upstream notice and its licence. */
function attribution_required(): array
{
    return [
        'Copyright (c) 2020 Microsoft Corporation',
        'The above copyright notice and this permission notice shall be included in',
        'https://github.com/microsoft/fluentui-system-icons',
    ];
}

it(description: 'ships ATTRIBUTION.md at the package root', closure: function () {
    expect(is_file(attribution_root() . '/ATTRIBUTION.md'))->toBeTrue();
});

it(description: 'never export-ignores ATTRIBUTION.md, so the notice reaches every install', closure: function () {
    $lines = file(attribution_root() . '/.gitattributes', FILE_IGNORE_NEW_LINES) ?: [];
    expect(count($lines))->toBeGreaterThan(0);
    foreach ($lines as $line) {
        if (str_contains($line, 'export-ignore')) {
            $pattern = ltrim(trim(strtok($line, " \t")), '/');
            $this->assertFalse(fnmatch($pattern, 'ATTRIBUTION.md'), "'{$line}' would drop ATTRIBUTION.md from the dist archive");
        }
    }
});

it(description: 'carries the upstream notice and licence verbatim', closure: function () {
    $text = (string) file_get_contents(attribution_root() . '/ATTRIBUTION.md');
    $required = attribution_required();
    expect($required)->not->toBeEmpty();
    foreach ($required as $needle) {
        $this->assertStringContainsString($needle, $text, "ATTRIBUTION.md does not carry: {$needle}");
    }
    $this->assertStringContainsString('claims no authorship', $text, 'ATTRIBUTION.md must say Simtabi LLC did not author the icons');
});

it(description: 'keeps LICENSE to the package code, held by Simtabi LLC', closure: function () {
    $license = (string) file_get_contents(attribution_root() . '/LICENSE');
    expect(preg_match_all('/^Copyright /m', $license))->toBe(1);
    $this->assertStringContainsString('Copyright (c) Simtabi LLC', $license);
    $this->assertStringNotContainsString('NOTICE', $license, 'third-party notices belong in ATTRIBUTION.md; appended to LICENSE they break licence detection');
});

it(description: 'points the README licence section at ATTRIBUTION.md', closure: function () {
    $readme = (string) file_get_contents(attribution_root() . '/README.md');
    expect(preg_match('/^## License\n(.*?)(?=^## |\z)/ms', $readme, $m))->toBe(1);
    $this->assertStringContainsString('(ATTRIBUTION.md)', $m[1]);
    $this->assertStringContainsString('claims no authorship', $m[1]);
});

it(description: 'ships the upstream licence text, unchanged since it was verified', closure: function () {
    // The licence-change guard, held locally: config.json records the SHA-256 of
    // the upstream LICENSE as it read at the pinned version. A refresh that
    // brings a different licence text fails here until a person re-reads it.
    $config = json_decode((string) file_get_contents(attribution_root() . '/resources/assets/svg/config.json'), true, flags: JSON_THROW_ON_ERROR);
    $path = attribution_root() . '/resources/assets/svg/licenses/fluentui-system-icons/LICENSE';

    expect(is_file($path))->toBeTrue()
        ->and($config['license']['spdx'])->toBe('MIT')
        ->and(hash_file('sha256', $path))->toBe($config['license']['sha256']);

    $this->assertStringContainsString('resources/assets/svg/licenses/fluentui-system-icons/LICENSE', (string) file_get_contents(attribution_root() . '/ATTRIBUTION.md'));
});

it(description: 'ships the NOTICE file beside the licence', closure: function () {
    expect(is_file(attribution_root() . '/resources/assets/svg/licenses/fluentui-system-icons/NOTICE'))->toBeTrue();
    $this->assertStringContainsString('resources/assets/svg/licenses/fluentui-system-icons/NOTICE', (string) file_get_contents(attribution_root() . '/ATTRIBUTION.md'));
});

it(description: 'marks the hand-supplied licence directory with a source.md that records both texts', closure: function () {
    // The npm package ships no licence file, so a real sync would delete this
    // directory unless it holds the marker. Exact names from the listing:
    // is_file() would accept any casing on a case-insensitive filesystem, and
    // icon-sets-sync's sink does not.
    $dir = attribution_root() . '/resources/assets/svg/licenses/fluentui-system-icons';
    $names = array_values(array_diff(scandir($dir) ?: [], ['.', '..']));
    sort($names);

    expect($names)->toBe(['LICENSE', 'NOTICE', 'source.md'], 'licenses/fluentui-system-icons/ must hold exactly LICENSE, NOTICE and source.md');

    $marker = (string) file_get_contents("{$dir}/source.md");
    foreach (['LICENSE', 'NOTICE'] as $file) {
        expect($marker)->toContain("`{$file}`")
            ->and($marker)->toContain((string) hash_file('sha256', "{$dir}/{$file}"));
    }
});
