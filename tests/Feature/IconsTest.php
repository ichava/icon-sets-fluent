<?php

declare(strict_types=1);

use Simtabi\Laranail\Ichava\Services\IconRegistry;
use Simtabi\Laranail\Ichava\IconSetsFluent\Enums\Variant;
use Simtabi\Laranail\Ichava\IconSetsFluent\Constants\IconsConstants;
use Simtabi\Laranail\Ichava\IconSetsFluent\Providers\IconsServiceProvider;

it(description: 'boots the provider without error', closure: function () {
    $providers = array_keys($this->app->getLoadedProviders());

    expect($providers)->toContain(IconsServiceProvider::class);
});

it(description: 'resolves constants from config json', closure: function () {
    expect(IconsConstants::getVendorPackage())->toBe('ichava/icon-sets-fluent')
        ->and(IconsConstants::getTitle())->toBe('Fluent UI System Icons')
        ->and(IconsConstants::getPrefix())->toBe('fluent')
        ->and(IconsConstants::getDefaultVariant())->toBe('regular');
});

it(description: 'uses the config prefix in enum class helpers', closure: function () {
    expect(Variant::REGULAR->getClass())->toBe('fluent-regular')
        ->and(Variant::FILLED->getClass())->toBe('fluent-filled');
});

it(description: 'matches the default variant to config json', closure: function () {
    expect(Variant::default())->toBe(Variant::REGULAR)
        ->and(Variant::REGULAR->isDefault())->toBeTrue()
        ->and(Variant::FILLED->isDefault())->toBeFalse();
});

it(description: 'picks up the package in the icon registry', closure: function () {
    $registry = $this->app->make(IconRegistry::class);

    expect($registry->isRegistered('ichava/icon-sets-fluent'))->toBeTrue(
        'IconRegistry should have ichava/icon-sets-fluent registered after boot.',
    );
});

it(description: 'ships one directory per variant, holding the measured number of icons', closure: function () {
    // Counted 2026-11-04 from the vendored tree. The subset is deliberate (see
    // docs/architecture.md); a refresh that changes a count changes this table
    // in the same pull request, so a silently shrunk or grown variant fails.
    $expected = [
        'regular' => 2478,
        'filled'  => 2514,
    ];

    $files = dirname(__DIR__, 2) . '/resources/assets/svg/files';
    $actual = [];

    foreach (glob($files . '/*', GLOB_ONLYDIR) ?: [] as $dir) {
        $actual[basename($dir)] = count(glob($dir . '/*.svg') ?: []);
    }

    ksort($expected);
    ksort($actual);

    expect($actual)->toBe($expected)
        ->and(array_keys($actual))->toEqualCanonicalizing(Variant::values());
});
