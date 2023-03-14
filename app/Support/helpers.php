<?php

declare(strict_types = 1);

if (! function_exists('stringify')) {
    function stringify(mixed $value): string
    {
        if (! is_string($value)) {
            throw new InvalidArgumentException('Value must be a string.');
        }

        return $value;
    }
}

if (! function_exists('intify')) {
    function intify(mixed $value): int
    {
        if (! is_int($value)) {
            throw new InvalidArgumentException('Value must be an integer.');
        }

        return $value;
    }
}

if (! function_exists('floatify')) {
    function floatify(mixed $value): float
    {
        if (! is_float($value)) {
            throw new InvalidArgumentException('Value must be a float.');
        }

        return $value;
    }
}

if (! function_exists('boolify')) {
    function boolify(mixed $value): bool
    {
        if (! is_bool($value)) {
            throw new InvalidArgumentException('Value must be a boolean.');
        }

        return $value;
    }
}
