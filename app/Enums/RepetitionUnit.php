<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Workouts()
 * @method static static Kilograms()
 * @method static static Seconds()
 * @method static static Minutes()
 */
final class RepetitionUnit extends Enum
{
    const Workouts = 'reps';
    const Kilograms = 'kg';
    const Seconds = 's';
    const Minutes = 'm';
}
