<?php

namespace App\Attributes;

use Attribute;

#[Attribute(
    Attribute::TARGET_CLASS |
    Attribute::IS_REPEATABLE |
    Attribute::TARGET_FUNCTION |
    Attribute::TARGET_METHOD |
    Attribute::TARGET_PROPERTY |
    Attribute::TARGET_CLASS_CONSTANT |
    Attribute::TARGET_PARAMETER)
]
class EntryPoint
{
    /**
     * Create a new attribute instance.
     *
     */
    public function __construct()
    {
        dd($this);

        $reflection = new \ReflectionClass($this);
        $className = $reflection->getParentClass() . 'EntryPoint';

        if (class_exists($className)) {
            $class = new \ReflectionClass($className);
            dd($class);
        }
    }
}
