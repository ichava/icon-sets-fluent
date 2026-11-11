<?php

declare(strict_types=1);

namespace Simtabi\Laranail\Ichava\IconSetsFluent\Enums;

use Simtabi\Laranail\Ichava\Traits\HasIconSetVariants;
use Simtabi\Laranail\Ichava\Contracts\IconSetVariantInterface;
use Simtabi\Laranail\Ichava\IconSetsFluent\Constants\IconsConstants;

/**
 * Type-safe variant selection for Fluent UI System Icons (regular / filled).
 */
enum Variant: string implements IconSetVariantInterface
{
    use HasIconSetVariants;

    case REGULAR = 'regular';
    case FILLED = 'filled';

    public function getPath(): string
    {
        return IconsConstants::getSvgPath($this->value);
    }

    private static function getDefaultValue(): string
    {
        return IconsConstants::getDefaultVariant() ?? self::REGULAR->value;
    }

    private static function getClassPrefix(): string
    {
        return IconsConstants::getPrefix();
    }
}
