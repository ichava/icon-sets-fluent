<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Fluent UI System Icons -- localisable strings
|--------------------------------------------------------------------------
|
| An overlay, not a second source of truth. `name` and `description` are
| deliberately absent: IconRegistry::fromDirectory() reads those from
| resources/assets/svg/config.json, which is canonical. A copy here would
| drift from it, and nothing would notice, because nothing loads this file
| for those keys. A non-English locale may add them to override; `en` must
| not.
|
| Variant keys match Simtabi\Laranail\Ichava\IconSetsFluent\Enums\Variant.
|
*/

return [
    'variants' => [
        'regular' => 'Regular',
        'filled'  => 'Filled',
    ],

    'variant_descriptions' => [
        'regular' => 'Outlined style at 24 px',
        'filled'  => 'Solid style at 24 px',
    ],
];
