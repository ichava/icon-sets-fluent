<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Ichava\IconSetsFluent\Providers;

use Simtabi\Laranail\Ichava\Support\IconPackServiceProvider;
use Simtabi\Laranail\Ichava\IconSetsFluent\Constants\IconsConstants;
use Simtabi\Laranail\Ichava\IconSetsFluent\View\Components\IconComponent;

/**
 * Registers the Fluent UI System Icons set with the Ichava registry on boot.
 */
class IconsServiceProvider extends IconPackServiceProvider
{
    protected function constantsClass(): string
    {
        return IconsConstants::class;
    }

    protected function componentClass(): string
    {
        return IconComponent::class;
    }
}
