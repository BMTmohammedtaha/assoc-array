<?php

namespace Bmt\AssocArray;

use ArrayAccess;
use ArrayIterator;
use InvalidArgumentException;
use IteratorAggregate;
use RuntimeException;

/**
 * Represents an associative array with string keys.
 */
class AssocArray implements ArrayAccess, IteratorAggregate
{
    /**
     * @var array The underlying associative array.
     */
    private $data;

    /**
     * Constructs a new AssocArray instance.
     *
     * @param array $data The associative array with string keys.
     * @throws InvalidArgumentException If the array structure is invalid.
     */
    public function __construct(array $data)
    {
        $this->validateArrayStructure($data);
        $this->data = $data;
    }

    /**
     * Checks if an offset exists in the associative array.
     *
     * @param mixed $offset The offset to check.
     * @return bool True if the offset exists, false otherwise.
     */
    public function offsetExists($offset): bool
    {
        return isset($this->data[$offset]);
    }

    /**
     * Retrieves the value at the specified offset in the associative array.
     *
     * @param mixed $offset The offset to retrieve the value from.
     * @return mixed The value at the specified offset.
     */
    public function offsetGet($offset)
    {
        return $this->data[$offset];
    }

    /**
     * Throws an exception when trying to set a value (read-only).
     *
     * @param mixed $offset The offset to set.
     * @param mixed $value The value to set.
     * @throws RuntimeException AssocArray is read-only.
     */
    public function offsetSet($offset, $value): void
    {
        throw new RuntimeException('AssocArray is read-only');
    }

    /**
     * Throws an exception when trying to unset a value (read-only).
     *
     * @param mixed $offset The offset to unset.
     * @throws RuntimeException AssocArray is read-only.
     */
    public function offsetUnset($offset): void
    {
        throw new RuntimeException('AssocArray is read-only');
    }

    /**
     * Returns an iterator for the associative array.
     *
     * @return ArrayIterator An iterator for the associative array.
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->data);
    }

    /**
     * Validates the array structure to ensure it is an associative array with string keys.
     *
     * @param array $data The array to validate.
     * @throws InvalidArgumentException If the array structure is invalid.
     */
    private function validateArrayStructure(array $data)
    {
        if (!empty($data) && array_keys($data) !== range(0, count($data) - 1)) {
            throw new InvalidArgumentException('Invalid array structure. Expected associative array with string keys.');
        }
    }
}
