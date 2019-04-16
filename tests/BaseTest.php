<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class BaseTest extends TestCase
{
    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
    }

    /**
     * This method is called after each test.
     */
    protected function tearDown(): void
    {
    }

    /**
     * @param string $className
     * @param string $propertyName
     */
    protected function getProperty(string $className, string $propertyName)
    {
        $class = new $className;
        $reflection = new \ReflectionClass($class);
        $property = $reflection->getProperty($propertyName);
        $property->setAccessible(true);
        return $property->getValue($class);
    }
}
