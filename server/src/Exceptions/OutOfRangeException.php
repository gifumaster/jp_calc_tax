<?php

declare(strict_types=1);

namespace Kudo\Exceptions;

use JetBrains\PhpStorm\Pure;
use Throwable;

class OutOfRangeException extends \Exception
{
    #[Pure] public function __construct(string $name, Throwable $previous = null)
    {
        parent::__construct(
            message: $name.'は無効な値の範囲を要求されました。',
            previous: $previous
        );
    }
}