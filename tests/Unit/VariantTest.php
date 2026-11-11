<?php

declare(strict_types=1);

use Simtabi\Laranail\Ichava\IconSetsFluent\Enums\Variant;

/**
 * Pure-enum behaviour tests. Anything that touches config.json (default(),
 * isDefault(), getClass(), getPath()) lives in the Feature suite where the
 * Laravel container is bootstrapped.
 */
it(description: 'exposes the regular case value', closure: function () {
    expect(Variant::REGULAR->getValue())->toBe('regular');
});

it(description: 'exposes the filled case value', closure: function () {
    expect(Variant::FILLED->getValue())->toBe('filled');
});

it(description: 'returns every case from values', closure: function () {
    expect(Variant::values())->toBe(['regular', 'filled']);
});

it(description: 'resolves known values and rejects unknown ones', closure: function () {
    expect(Variant::tryFromValue('regular'))->toBe(Variant::REGULAR)
        ->and(Variant::tryFromValue('filled'))->toBe(Variant::FILLED)
        ->and(Variant::tryFromValue('not-a-real-variant'))->toBeNull();
});
