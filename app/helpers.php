<?php
/**
 * Laravel Helper Functions Stubs for IDE Support
 * This file helps IDE's (like Intelephense) recognize Laravel helper functions
 */

if (!function_exists('env')) {
    /**
     * Gets the value of an environment variable.
     */
    function env(string $key, mixed $default = null): mixed
    {
        return $_ENV[$key] ?? $default;
    }
}
